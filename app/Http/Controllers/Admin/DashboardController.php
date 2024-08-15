<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Medicine;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPharmacies = Pharmacy::count();
        $totalMedicines = Medicine::count();
        return view('admin.dashboard', compact('totalPharmacies', 'totalMedicines'));
    }
}
