<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::firstOrCreate([
            'type' => 'CLT',
        ]);

        JobType::firstOrCreate([
            'type' => 'PJ',
        ]);

        JobType::firstOrCreate([
            'type' => 'Estágio',
        ]);
    }
}
