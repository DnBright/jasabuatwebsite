<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hero;

class BerandaController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        return view('dashboard.beranda.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'description' => 'required',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url' => 'nullable|string|max:2048',
        ]);

        $hero = Hero::first();
        if (!$hero) {
            $hero = new Hero();
        }
        
        $data = $request->except('_token', 'image', 'image_url');

        if ($request->hasFile('image')) {
            // Delete old local image if it exists and is stored in public/images/hero
            if ($hero->image && str_starts_with($hero->image, '/images/hero/') && !str_contains($hero->image, 'section1')) {
                $oldPath = public_path($hero->image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/hero'), $filename);
            $data['image'] = '/images/hero/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->input('image_url');
        }

        $hero->fill($data);
        $hero->save();

        return redirect()->route('dashboard.beranda.index')->with('success', 'Beranda berhasil diperbarui.');
    }
}
