<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::firstOrCreate([
            'plan' => 'Free',
        ]);

        Plan::firstOrCreate([
            'plan' => 'Premium',
        ]);
    }
}
