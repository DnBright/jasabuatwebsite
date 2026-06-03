<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Update settings table
        DB::table('settings')
            ->where('key', 'whatsapp_number')
            ->update(['value' => '85190894806']);

        // 2. Update pricing packages button links
        $packages = DB::table('pricing_packages')->get();
        foreach ($packages as $pkg) {
            if (strpos($pkg->button_link, '6285859044929') !== false) {
                $newLink = str_replace('6285859044929', '6285190894806', $pkg->button_link);
                DB::table('pricing_packages')
                    ->where('id', $pkg->id)
                    ->update(['button_link' => $newLink]);
            }
        }

        // 3. Update hero button links
        $heroes = DB::table('heroes')->get();
        foreach ($heroes as $hero) {
            $newLink = $hero->button_link;
            if (strpos($hero->button_link, '6281234567890') !== false) {
                $newLink = str_replace('6281234567890', '6285190894806', $hero->button_link);
            } elseif (strpos($hero->button_link, '6285859044929') !== false) {
                $newLink = str_replace('6285859044929', '6285190894806', $hero->button_link);
            }
            if ($newLink !== $hero->button_link) {
                DB::table('heroes')
                    ->where('id', $hero->id)
                    ->update(['button_link' => $newLink]);
            }
        }

        // 4. Clear landing cache
        \Illuminate\Support\Facades\Cache::forget('landing_setting');
        \Illuminate\Support\Facades\Cache::forget('landing_packages');
        \Illuminate\Support\Facades\Cache::forget('landing_hero');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to rollback to the old number
    }
};
