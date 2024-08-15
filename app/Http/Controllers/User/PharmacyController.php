<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return view('user.home', compact('pharmacies'));
    }

    public function show(Pharmacy $pharmacy)
    {
        return view('user.pharmacy', compact('pharmacy'));
    }
}

