<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UmkmTrend;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Show only latest trends by default
        $trends = UmkmTrend::where('is_latest', true)->orderBy('score_value', 'desc')->get();
        $batch_name = $trends->first()->batch_name ?? 'N/A';
        return view('dashboard.analytics.index', compact('trends', 'batch_name'));
    }

    public function history()
    {
        // Get unique batches
        $batches = UmkmTrend::select('batch_name', 'created_at')
            ->groupBy('batch_name', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('dashboard.analytics.history', compact('batches'));
    }

    public function show(Request $request)
    {
        $batch_name = $request->query('batch');
        $trends = UmkmTrend::where('batch_name', $batch_name)->orderBy('score_value', 'desc')->get();
        return view('dashboard.analytics.index', compact('trends', 'batch_name'));
    }

    public function refresh()
    {
        return redirect()->route('dashboard.analytics.index')->with('success', 'Fitur simulasi prospek target telah dinonaktifkan. Silakan integrasikan dengan API analitik nyata (seperti Google Analytics) untuk mendapatkan data akurat.');
    }
}
