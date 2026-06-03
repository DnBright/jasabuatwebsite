<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Template;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $query = Template::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $templates = $query->paginate(10)->withQueryString();
        
        // Get unique categories for the filter dropdown
        $categories = Template::select('category')->distinct()->pluck('category');

        return view('dashboard.template.index', compact('templates', 'categories'));
    }

    public function create()
    {
        return view('dashboard.template.create');
    }

    private function formatData($data)
    {
        if(isset($data['packages']) && is_array($data['packages'])) {
            foreach(['basic', 'standard', 'premium'] as $type) {
                if(isset($data['packages'][$type]['features']) && is_string($data['packages'][$type]['features'])) {
                    $featuresStr = $data['packages'][$type]['features'];
                    $featuresArr = array_map('trim', explode(',', $featuresStr));
                    $data['packages'][$type]['features'] = array_filter($featuresArr);
                }
            }
        }
        
        if(isset($data['reviews']) && is_array($data['reviews'])) {
            // Remove empty reviews
            $data['reviews'] = array_filter($data['reviews'], function($rev) {
                return !empty($rev['user']) || !empty($rev['comment']);
            });
            // Re-index array
            $data['reviews'] = array_values($data['reviews']);
        }
        
        return $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required',
            'reviews_count' => 'required|numeric',
            'description' => 'required',
        ]);

        $data = $request->except('_token', 'image');
        $data = $this->formatData($data);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/templates'), $filename);
            $data['image'] = '/images/templates/' . $filename;
        }

        Template::create($data);
        return redirect()->route('dashboard.template.index')->with('success', 'Template berhasil ditambah.');
    }

    public function edit(Template $template)
    {
        return view('dashboard.template.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required',
            'reviews_count' => 'required|numeric',
            'description' => 'required',
        ]);

        $data = $request->except('_token', '_method', 'image');
        $data = $this->formatData($data);

        if ($request->hasFile('image')) {
            // Delete old image if it's stored locally
            if ($template->image && str_starts_with($template->image, '/images/templates/')) {
                $oldPath = public_path($template->image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/templates'), $filename);
            $data['image'] = '/images/templates/' . $filename;
        }

        $template->update($data);
        return redirect()->route('dashboard.template.index')->with('success', 'Template berhasil diperbarui.');
    }

    public function destroy(Template $template)
    {
        if ($template->image && str_starts_with($template->image, '/images/templates/')) {
            $oldPath = public_path($template->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        $template->delete();
        return redirect()->route('dashboard.template.index')->with('success', 'Template berhasil dihapus.');
    }
}
