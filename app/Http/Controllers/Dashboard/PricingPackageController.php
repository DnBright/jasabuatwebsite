<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class PricingPackageController extends Controller
{
    public function index()
    {
        $packages = PricingPackage::all();
        return view('dashboard.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('dashboard.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'payment_terms' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'is_popular' => 'nullable|boolean',
            'features' => 'required|array',
            'features.*.text' => 'required|string',
            'features.*.is_active' => 'required|boolean',
        ]);

        $validated['is_popular'] = $request->has('is_popular');
        
        PricingPackage::create($validated);

        return redirect()->route('dashboard.packages.index')->with('success', 'Paket harga berhasil ditambahkan.');
    }

    public function edit(PricingPackage $package)
    {
        return view('dashboard.packages.edit', compact('package'));
    }

    public function update(Request $request, PricingPackage $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'payment_terms' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'is_popular' => 'nullable|boolean',
            'features' => 'required|array',
            'features.*.text' => 'required|string',
            'features.*.is_active' => 'required|boolean',
        ]);

        $validated['is_popular'] = $request->has('is_popular');

        $package->update($validated);

        return redirect()->route('dashboard.packages.index')->with('success', 'Paket harga berhasil diperbarui.');
    }

    public function destroy(PricingPackage $package)
    {
        $package->delete();
        return redirect()->route('dashboard.packages.index')->with('success', 'Paket harga berhasil dihapus.');
    }
}
