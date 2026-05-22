<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\UmkmTrend;
use App\Models\Hero;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_templates' => Template::count(),
            'high_prospects' => UmkmTrend::where('score_value', '>=', 80)->count(),
            'hero_exists' => Hero::exists(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
