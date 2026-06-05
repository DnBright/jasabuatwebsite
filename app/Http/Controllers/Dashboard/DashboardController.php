<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Template;
use App\Models\TemplateReview;
use App\Models\UmkmTrend;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_templates' => Template::count(),
            'high_prospects' => UmkmTrend::where('score_value', '>=', 80)->count(),
            'hero_exists' => Hero::exists(),
            'total_reviews' => TemplateReview::count(),
            'pending_reviews' => TemplateReview::where('is_approved', false)->count(),
        ];

        $topTrends = UmkmTrend::orderBy('score_value', 'desc')->take(3)->get();

        return view('dashboard.index', compact('stats', 'topTrends'));
    }
}
