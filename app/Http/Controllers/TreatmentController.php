<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('welcome', compact('treatments'));
    }
}
