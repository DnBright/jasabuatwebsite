<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Template;
use App\Models\TemplateReview;
use App\Http\Controllers\Dashboard\BerandaController;
use App\Http\Controllers\Dashboard\TemplateController;
use App\Http\Controllers\Dashboard\AnalyticsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CalculatorFeatureController;

// API untuk landing page (public)
Route::get('/api/calculator-features', [CalculatorFeatureController::class, 'apiIndex']);

Route::get('/setup-admin', function () {
    $user = \App\Models\User::firstOrCreate(
        ['email' => 'saidin21@gmail.com'],
        [
            'name' => 'Admin DnBright',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
        ]
    );
    
    // Update password if user already exists to ensure it's 'password123'
    $user->password = \Illuminate\Support\Facades\Hash::make('password123');
    $user->save();

    return "Admin created! Email: saidin21@gmail.com | Password: password123 <br><a href='/login'>Login Here</a>";
});

Route::get('/', function () {
    $hero = Hero::first();
    $templatesDB = Template::all();

    // Wrap in try-catch in case tables don't exist yet on server
    try {
        $packages = \App\Models\PricingPackage::all();
    } catch (\Exception $e) {
        $packages = collect();
    }
    try {
        $setting = \App\Models\Setting::pluck('value', 'key')->toArray();
    } catch (\Exception $e) {
        $setting = [];
    }

    return view('landing.index', compact('hero', 'templatesDB', 'packages', 'setting'));
})->name('home');

Route::get('/template/{id}', function ($id) {
    $template = Template::with('templateReviews')->findOrFail($id);
    return view('landing.template.details', compact('template'));
})->name('template.details');

Route::post('/template/{id}/review', function (Request $request, $id) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|min:10|max:1000',
    ]);

    TemplateReview::create([
        'template_id' => $id,
        'name' => $request->name,
        'email' => $request->email,
        'rating' => $request->rating,
        'comment' => $request->comment,
        'is_approved' => true,
    ]);

    return redirect()->back()->with('success', 'Terima kasih! Ulasan Anda telah ditambahkan.');
})->name('template.review.store');

Route::get('/demo/{id}', function ($id) {
    $template = Template::findOrFail($id);
    $demoView = 'landing.demo.' . strtolower(str_replace(' ', '_', $template->name));
    
    if (!view()->exists($demoView)) {
        $demoView = 'landing.demo.default';
    }
    
    return view($demoView, compact('template'));
})->name('template.demo');

Route::get('/debug-files', function () {
    $output = "Public Path: " . public_path() . "\n\n";
    $output .= "Files in public:\n";
    $files = scandir(public_path());
    foreach ($files as $file) {
        $output .= $file . "\n";
    }
    
    $imagesPath = public_path('images');
    $output .= "\nImages Path: " . $imagesPath . "\n\n";
    if (is_dir($imagesPath)) {
        $output .= "Files in public/images:\n";
        $files = scandir($imagesPath);
        foreach ($files as $file) {
            $output .= $file . "\n";
        }
        
        // Also check hero
        if (is_dir($imagesPath . '/hero')) {
            $output .= "\nFiles in public/images/hero:\n";
            $files = scandir($imagesPath . '/hero');
            foreach ($files as $file) {
                $output .= $file . "\n";
            }
        }
    } else {
        $output .= "public/images is NOT a directory\n";
    }
    return response($output)->header('Content-Type', 'text/plain');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
        Route::post('/analytics/refresh', [AnalyticsController::class, 'refresh'])->name('analytics.refresh');
        Route::get('/analytics/history', [AnalyticsController::class, 'history'])->name('analytics.history');
        Route::get('/analytics/view', [AnalyticsController::class, 'show'])->name('analytics.show');
        
        Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');
        Route::post('/beranda', [BerandaController::class, 'update'])->name('beranda.update');
        
        Route::resource('template', TemplateController::class)->except(['show']);
        Route::resource('calculator-features', CalculatorFeatureController::class)->except(['show']);
        
        Route::resource('packages', \App\Http\Controllers\Dashboard\PricingPackageController::class)->except(['show']);
        
        Route::get('/settings', [\App\Http\Controllers\Dashboard\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [\App\Http\Controllers\Dashboard\SettingController::class, 'update'])->name('settings.update');
    });
});

use Illuminate\Support\Facades\Artisan;

Route::get('/deploy-maintenance-trigger', function (Request $request) {
    if ($request->query('token') !== 'bPXwtuggH5qk81') {
        abort(403, 'Unauthorized');
    }

    $output = [];

    // 0. Remove Vite hot file (prevents "blank page" in production)
    $hotFile = public_path('hot');
    if (file_exists($hotFile)) {
        unlink($hotFile);
        $output[] = 'Vite Hot File: Berhasil dihapus!';
    } else {
        $output[] = 'Vite Hot File: Tidak ditemukan (OK).';
    }
    
    // 1. Run migrations
    try {
        Artisan::call('migrate', ['--force' => true]);
        $output[] = 'Migrasi: ' . trim(Artisan::output());
    } catch (\Exception $e) {
        $output[] = 'Migrasi Gagal: ' . $e->getMessage();
    }

    // 2. Storage symlink native
    try {
        $target = storage_path('app/public');
        $link = public_path('storage');
        if (!file_exists($link)) {
            @symlink($target, $link);
            $output[] = 'Symlink Storage: Sukses dibuat secara native!';
        } else {
            $output[] = 'Symlink Storage: Sudah ada.';
        }
    } catch (\Exception $e) {
        $output[] = 'Symlink Storage Gagal: ' . $e->getMessage();
    }

    // 3. Database seeding if empty
    try {
        if (\App\Models\Template::count() === 0) {
            Artisan::call('db:seed', ['--class' => 'DashboardDataSeeder', '--force' => true]);
            Artisan::call('db:seed', ['--class' => 'CalculatorFeatureSeeder', '--force' => true]);
            Artisan::call('db:seed', ['--class' => 'UmkmTrendSeeder', '--force' => true]);
            $output[] = 'Seeding Data Awal: Sukses!';
        } else {
            $output[] = 'Seeding Data Awal: Dilewati (database sudah berisi data).';
        }
    } catch (\Exception $e) {
        $output[] = 'Seeding Gagal: ' . $e->getMessage();
    }

    // 4. Clear semua cache lama (penting setelah deploy!)
    try {
        Artisan::call('view:clear');
        $output[] = 'View Cache: Berhasil dihapus!';
    } catch (\Exception $e) {
        $output[] = 'View Clear Gagal: ' . $e->getMessage();
    }

    try {
        Artisan::call('config:clear');
        $output[] = 'Config Cache: Berhasil dihapus!';
    } catch (\Exception $e) {
        $output[] = 'Config Clear Gagal: ' . $e->getMessage();
    }

    try {
        Artisan::call('route:clear');
        $output[] = 'Route Cache: Berhasil dihapus!';
    } catch (\Exception $e) {
        $output[] = 'Route Clear Gagal: ' . $e->getMessage();
    }

    // 5. Optimize Cache (re-compile setelah clear)
    try {
        Artisan::call('optimize');
        $output[] = 'Cache Optimize: ' . trim(Artisan::output());
    } catch (\Exception $e) {
        $output[] = 'Optimize Gagal: ' . $e->getMessage();
    }

    return response()->json([
        'status' => 'success',
        'log' => $output
    ]);
});

require __DIR__.'/settings.php';
