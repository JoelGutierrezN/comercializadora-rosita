<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Store::factory()->create();
        Provider::factory()->count(200)->create();
        Product::factory()->count(100)->create();
    }
}
