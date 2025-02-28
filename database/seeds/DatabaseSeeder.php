<?php

use Database\Seeders\ColorSeeder;
use Database\Seeders\PerfumeBrandSeeder;
use Database\Seeders\PerfumeCategorySeeder;
use Database\Seeders\PerfumeDisplaySizeSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\ProductAttributeSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use HasFactory;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // ProductAttributeSeeder::class,
            UsersTableSeeder::class,
            RolePermissionSeeder::class,
            PerfumeCategorySeeder::class,
            PerfumeDisplaySizeSeeder::class,
            PerfumeBrandSeeder::class,
            ColorSeeder::class,

            // SettingTableSeeder::class,
            // CouponSeeder::class,
        ]);

// dd();
        // Category::factory()->count(35)->create();
        // Product::factory()->count(100)->create();
        // DB::unprepared(file_get_contents(base_path('needs/seeder/categories.sql')));
        // DB::unprepared(file_get_contents(base_path('needs/seeder/product_seed.sql')));
        //ProductReview::factory()->count(10)->create();

    }
}
