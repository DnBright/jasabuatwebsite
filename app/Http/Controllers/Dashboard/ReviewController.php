<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TemplateReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = TemplateReview::with('template')->orderBy('created_at', 'desc');

        if ($request->has('status') && $request->status !== '') {
            $isApproved = $request->status === 'approved' ? true : false;
            $query->where('is_approved', $isApproved);
        }

        $reviews = $query->paginate(15)->withQueryString();

        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function toggleApprove(TemplateReview $review)
    {
        $review->update([
            'is_approved' => !$review->is_approved
        ]);

        $status = $review->is_approved ? 'disetujui' : 'disembunyikan';
        return redirect()->back()->with('success', "Ulasan berhasil $status.");
    }

    public function destroy(TemplateReview $review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
