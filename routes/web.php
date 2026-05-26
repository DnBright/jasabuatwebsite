<?php

use App\Http\Controllers\Dashboard\AnalyticsController;
use App\Http\Controllers\Dashboard\BerandaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PricingPackageController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\TemplateController;
use App\Models\Hero;
use App\Models\PricingPackage;
use App\Models\Setting;
use App\Models\Template;
use App\Models\TemplateReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Force preloading of Eloquent models to prevent unserialize() failures on incomplete classes
class_exists(Hero::class);
class_exists(Template::class);
class_exists(PricingPackage::class);
class_exists(Setting::class);

Route::get('/sitemap.xml', function () {
    $templates = Cache::remember('landing_templates_sitemap', 86400, function () {
        return Template::all();
    });
    $content = view('landing.sitemap', compact('templates'))->render();

    return response($content, 200, ['Content-Type' => 'application/xml']);
});

Route::get('/setup-admin', function () {
    $user = User::firstOrCreate(
        ['email' => 'saidin21@gmail.com'],
        [
            'name' => 'Admin DnBright',
            'password' => Hash::make('password123'),
        ]
    );

    // Update password if user already exists to ensure it's 'password123'
    $user->password = Hash::make('password123');
    $user->save();

    return "Admin created! Email: saidin21@gmail.com | Password: password123 <br><a href='/login'>Login Here</a>";
});

Route::get('/', function () {
    // 1. Hero Caching with Self-Healing
    try {
        $hero = Cache::remember('landing_hero', 86400, function () {
            return Hero::first();
        });
        if (!is_object($hero) || get_class($hero) === '__PHP_Incomplete_Class') {
            throw new Exception('Corrupted Hero cache');
        }
    } catch (Throwable $e) {
        Cache::forget('landing_hero');
        $hero = Hero::first();
    }

    // 2. Templates Caching with Self-Healing
    try {
        $templatesDB = Cache::remember('landing_templates', 86400, function () {
            return Template::all();
        });
        if (!is_object($templatesDB) || get_class($templatesDB) === '__PHP_Incomplete_Class') {
            throw new Exception('Corrupted Templates cache');
        }
    } catch (Throwable $e) {
        Cache::forget('landing_templates');
        $templatesDB = Template::all();
    }

    // 3. Packages Caching with Self-Healing
    try {
        $packages = Cache::remember('landing_packages', 86400, function () {
            try {
                return PricingPackage::all();
            } catch (Exception $e) {
                return collect();
            }
        });
        if (!is_object($packages) || get_class($packages) === '__PHP_Incomplete_Class') {
            throw new Exception('Corrupted Packages cache');
        }
    } catch (Throwable $e) {
        Cache::forget('landing_packages');
        try {
            $packages = PricingPackage::all();
        } catch (Exception $ex) {
            $packages = collect();
        }
    }

    // 4. Setting Caching with Self-Healing
    try {
        $setting = Cache::remember('landing_setting', 86400, function () {
            try {
                return Setting::pluck('value', 'key')->toArray();
            } catch (Exception $e) {
                return [];
            }
        });
        if (!is_array($setting) || (is_object($setting) && get_class($setting) === '__PHP_Incomplete_Class')) {
            throw new Exception('Corrupted Setting cache');
        }
    } catch (Throwable $e) {
        Cache::forget('landing_setting');
        try {
            $setting = Setting::pluck('value', 'key')->toArray();
        } catch (Exception $ex) {
            $setting = [];
        }
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
    $demoView = 'landing.demo.'.strtolower(str_replace(' ', '_', $template->name));

    if (! view()->exists($demoView)) {
        $demoView = 'landing.demo.default';
    }

    return view($demoView, compact('template'));
})->name('template.demo');

Route::get('/debug-files', function () {
    $output = 'Public Path: '.public_path()."\n\n";
    $output .= "Files in public:\n";
    $files = scandir(public_path());
    foreach ($files as $file) {
        $output .= $file."\n";
    }

    $imagesPath = public_path('images');
    $output .= "\nImages Path: ".$imagesPath."\n\n";
    if (is_dir($imagesPath)) {
        $output .= "Files in public/images:\n";
        $files = scandir($imagesPath);
        foreach ($files as $file) {
            $output .= $file."\n";
        }

        // Also check hero
        if (is_dir($imagesPath.'/hero')) {
            $output .= "\nFiles in public/images/hero:\n";
            $files = scandir($imagesPath.'/hero');
            foreach ($files as $file) {
                $output .= $file."\n";
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

        Route::resource('packages', PricingPackageController::class)->except(['show']);

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

Route::get('/deploy-maintenance-trigger', function (Request $request) {
    if ($request->query('token') !== 'bPXwtuggH5qk81') {
        abort(403, 'Unauthorized');
    }

    $output = [];

    // 00. Git Pull latest changes from GitHub
    try {
        $pullOutput = shell_exec('git pull origin main 2>&1');
        $output[] = 'Git Pull: '.trim($pullOutput);
    } catch (Exception $e) {
        $output[] = 'Git Pull Gagal: '.$e->getMessage();
    }

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
        $output[] = 'Migrasi: '.trim(Artisan::output());
    } catch (Exception $e) {
        $output[] = 'Migrasi Gagal: '.$e->getMessage();
    }

    // 2. Storage symlink native
    try {
        $target = storage_path('app/public');
        $link = public_path('storage');
        if (! file_exists($link)) {
            if (function_exists('symlink')) {
                @symlink($target, $link);
                $output[] = 'Symlink Storage: Sukses dibuat secara native!';
            } else {
                $output[] = 'Symlink Storage: Lewat (fungsi symlink dinonaktifkan di server).';
            }
        } else {
            $output[] = 'Symlink Storage: Sudah ada.';
        }
    } catch (Exception $e) {
        $output[] = 'Symlink Storage Gagal: '.$e->getMessage();
    }

    // 3. Database seeding if empty
    try {
        if (Template::count() === 0) {
            Artisan::call('db:seed', ['--class' => 'DashboardDataSeeder', '--force' => true]);
            Artisan::call('db:seed', ['--class' => 'UmkmTrendSeeder', '--force' => true]);
            $output[] = 'Seeding Data Awal: Sukses!';
        } else {
            $output[] = 'Seeding Data Awal: Dilewati (database sudah berisi data).';
        }
    } catch (Exception $e) {
        $output[] = 'Seeding Gagal: '.$e->getMessage();
    }

    // 4. Clear semua cache lama (penting setelah deploy!)
    try {
        Artisan::call('view:clear');
        $output[] = 'View Cache: Berhasil dihapus!';
    } catch (Exception $e) {
        $output[] = 'View Clear Gagal: '.$e->getMessage();
    }

    try {
        Artisan::call('config:clear');
        $output[] = 'Config Cache: Berhasil dihapus!';
    } catch (Exception $e) {
        $output[] = 'Config Clear Gagal: '.$e->getMessage();
    }

    try {
        Artisan::call('route:clear');
        $output[] = 'Route Cache: Berhasil dihapus!';
    } catch (Exception $e) {
        $output[] = 'Route Clear Gagal: '.$e->getMessage();
    }

    try {
        Artisan::call('cache:clear');
        $output[] = 'Application Cache: Berhasil dihapus!';
    } catch (Exception $e) {
        $output[] = 'Application Cache Clear Gagal: '.$e->getMessage();
    }

    // 5. Optimize Cache (re-compile setelah clear)
    try {
        Artisan::call('optimize');
        $output[] = 'Cache Optimize: '.trim(Artisan::output());
    } catch (Exception $e) {
        $output[] = 'Optimize Gagal: '.$e->getMessage();
    }

    return response()->json([
        'status' => 'success',
        'log' => $output,
    ]);
});

require __DIR__.'/settings.php';
