<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Mortgage;

class MortgageController extends Controller
{
    public function index()
    {
        $mortgages = Mortgage::where('is_active', true)->get();
        return view('public.mortgages.index', compact('mortgages'));
    }

    public function show($id)
    {
        $mortgage = Mortgage::findOrFail($id);
        return view('public.mortgages.show', compact('mortgage'));
    }
}
