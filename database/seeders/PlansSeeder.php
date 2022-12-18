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
            'id' => 1,
            'plan' => 'Free',
        ]);

        Plan::firstOrCreate([
            'id' => 2,
            'plan' => 'Premium',
        ]);
    }
}
