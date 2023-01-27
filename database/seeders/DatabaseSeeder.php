<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Region;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $regions = ['kachin','kayah','kayin','chin','sagaing','tanintharyi','bago','magway','mandalay','mon','rakhine','yangon','shan','ayeyarwady'];
        foreach($regions as $region){
            Region::create([
                'name' => $region
            ]);
        }
    }
}
