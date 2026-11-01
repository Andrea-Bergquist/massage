<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Honeypot-kontroll
        if ($request->filled('website')) {
            return redirect()->back()->with(
                'message',
                'Tack för ditt meddelande, vi hör av oss!'
            );
        }

        // 2. Validering
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10|max:1800',

            'cf-turnstile-response' => [
                'bail',
                'required',
                function (
                    string $attribute,
                    mixed $value,
                    \Closure $fail
                ) use ($request) {

                    try {
                        $response = Http::asForm()
                            ->timeout(5)
                            ->post(
                                'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                                [
                                    'secret' => config('services.cloudflare_turnstile.secret_key'),
                                    'response' => $value,
                                    'remoteip' => $request->ip(),
                                ]
                            );

                        if (
                            ! $response->successful() ||
                            ! $response->json('success')
                        ) {
                            $fail(
                                'Spamskyddet kunde inte verifieras. ' .
                                    'Vänligen ladda om sidan och försök igen.'
                            );
                        }
                    } catch (\Illuminate\Http\Client\ConnectionException $e) {
                        $fail(
                            'Spamskyddet är tillfälligt otillgängligt. ' .
                                'Vänligen försök igen senare.'
                        );
                    }
                },
            ],
        ], [
            'name.required' =>
            'Vänligen fyll i ditt namn.',
            'name.min' =>
            'Namnet måste vara minst 3 tecken långt.',
            'name.max' =>
            'Namnet får inte vara längre än 255 tecken.',

            'email.required' =>
            'Vänligen fyll i din e-postadress.',
            'email.email' =>
            'E-postadressen måste vara giltig.',

            'message.required' =>
            'Vänligen skriv ett meddelande.',
            'message.min' =>
            'Meddelandet måste vara minst 10 tecken långt.',
            'message.max' =>
            'Meddelandet får inte vara längre än 1800 tecken.',

            'cf-turnstile-response.required' =>
            'Vänligen verifiera att du inte är en bot via spamskyddet.',
        ]);

        // 3. Skicka eller spara meddelandet
        Mail::to('andreabergquist@msn.com')
            ->send(new ContactMessageMail($validated));

        // 4. Bekräftelse
        return redirect()->back()->with(
            'message',
            'Tack för ditt meddelande, vi hör av oss!'
        );
    }
}
