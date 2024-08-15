<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return view('admin.pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        return view('admin.pharmacies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
        ]);

        $pharmacy = new Pharmacy($validated);

        if ($request->hasFile('logo')) {
            $pharmacy->logo = $request->file('logo')->store('logos', 'public');
        }

        $pharmacy->save();

        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacie ajoutée avec succès.');
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('admin.pharmacies.edit', compact('pharmacy'));
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
        ]);

        $pharmacy->fill($validated);

        if ($request->hasFile('logo')) {
            $pharmacy->logo = $request->file('logo')->store('logos', 'public');
        }

        $pharmacy->save();

        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacie mise à jour avec succès.');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        if ($pharmacy->logo) {
            \Storage::disk('public')->delete($pharmacy->logo);
        }

        $pharmacy->delete();

        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacie supprimée avec succès.');
    }
}
