<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Pharmacy $pharmacy)
    {
        $medicines = $pharmacy->medicines;
        return view('admin.medicines.index', compact('pharmacy', 'medicines'));
    }

    public function create(Pharmacy $pharmacy)
    {
        return view('admin.medicines.create', compact('pharmacy'));
    }

    public function store(Request $request, Pharmacy $pharmacy)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'dosage' => 'required',
            'price' => 'required|numeric',
            'photo' => 'image|nullable',
        ]);

        $medicine = new Medicine($request->all());
        $medicine->pharmacy_id = $pharmacy->id;

        if ($request->hasFile('photo')) {
            $medicine->photo = $request->file('photo')->store('medicines', 'public');
        }

        $medicine->save();

        return redirect()->route('admin.medicines.index', $pharmacy->id);
    }

    public function edit(Pharmacy $pharmacy, Medicine $medicine)
    {
        return view('admin.medicines.edit', compact('pharmacy', 'medicine'));
    }

    public function update(Request $request, Pharmacy $pharmacy, Medicine $medicine)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'dosage' => 'required',
            'price' => 'required|numeric',
            'photo' => 'image|nullable',
        ]);

        $medicine->fill($request->all());

        if ($request->hasFile('photo')) {
            $medicine->photo = $request->file('photo')->store('medicines', 'public');
        }

        $medicine->save();

        return redirect()->route('admin.medicines.index', $pharmacy->id);
    }

    public function destroy(Pharmacy $pharmacy, Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('admin.medicines.index', $pharmacy->id);
    }
}
