<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\UmkmTrend;
use App\Models\Hero;
use App\Models\TemplateReview;

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

        return view('dashboard.index', compact('stats'));
    }
}
