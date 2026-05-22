<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CalculatorFeature;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalculatorFeatureController extends Controller
{
    public function index(): View
    {
        $features = CalculatorFeature::ordered()->get();
        $stats = [
            'total' => $features->count(),
            'features' => $features->where('category', 'feature')->count(),
            'services' => $features->where('category', 'service')->count(),
            'active' => $features->where('is_active', true)->count(),
        ];

        return view('dashboard.kalkulator.index', compact('features', 'stats'));
    }

    public function create(): View
    {
        return view('dashboard.kalkulator.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:calculator_features',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'category' => 'required|in:feature,service',
            'is_recommended' => 'boolean',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        CalculatorFeature::create($validated);

        return redirect()->route('dashboard.calculator-features.index')
            ->with('success', 'Fitur kalkulator berhasil ditambahkan.');
    }

    public function edit(CalculatorFeature $calculatorFeature): View
    {
        return view('dashboard.kalkulator.edit', compact('calculatorFeature'));
    }

    public function update(Request $request, CalculatorFeature $calculatorFeature): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:calculator_features,slug,' . $calculatorFeature->id,
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'category' => 'required|in:feature,service',
            'is_recommended' => 'boolean',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $calculatorFeature->update($validated);

        return redirect()->route('dashboard.calculator-features.index')
            ->with('success', 'Fitur kalkulator berhasil diperbarui.');
    }

    public function destroy(CalculatorFeature $calculatorFeature): RedirectResponse
    {
        $calculatorFeature->delete();

        return redirect()->route('dashboard.calculator-features.index')
            ->with('success', 'Fitur kalkulator berhasil dihapus.');
    }

    // API untuk landing page
    public function apiIndex()
    {
        $features = CalculatorFeature::active()->ordered()->get();

        return response()->json([
            'contentFeatures' => $features->where('category', 'feature')->values(),
            'supportServices' => $features->where('category', 'service')->values(),
        ]);
    }
}
