<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Honeypot-kontroll: Om fältet är ifyllt, avbryt tyst
        if ($request->filled('website')) {
            // Vi skickar tillbaka användaren (botten) med ett lyckat meddelande 
            // så att botten tror att inskicket fungerade.
            return redirect()->back()->with('message', 'Tack för ditt meddelande, vi hör av oss!');
        }

        // 2. Validering av de riktiga fälten
        $validated = $request->validate([
            'name'    => 'required|string|min:3|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|min:10|max:1800',
        ], [
            // Egna felmeddelanden på svenska (valfritt men trevligt)
            'name.required'    => 'Vänligen fyll i ditt namn.',
            'name.min'         => 'Namnet måste vara minst 3 tecken långt.',
            'name.max'         => 'Namnet får inte vara längre än 255 tecken.',
            'email.required'   => 'Vänligen fyll i din e-postadress.',
            'email.email'      => 'E-postadressen måste vara giltig.',
            'message.required' => 'Vänligen skriv ett meddelande.',
            'message.min'      => 'Meddelandet måste vara minst 10 tecken långt.',
            'message.max'      => 'Meddelandet får inte vara längre än 1800 tecken.',
        ]);

        // 3. Här hanterar du meddelandet (t.ex. skickar ett mail eller sparar i databasen)
        // Mail::to('info@thaiserenenity.se')->send(new ContactFormMail($validated));

        // 4. Skicka tillbaka användaren med framgångsmeddelandet
        return redirect()->back()->with('message', 'Tack för ditt meddelande, vi hör av oss!');
    }
}
