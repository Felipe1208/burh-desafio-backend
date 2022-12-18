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
            'id' => 1,
            'type' => 'CLT',
        ]);

        JobType::firstOrCreate([
            'id' => 2,
            'type' => 'PJ',
        ]);

        JobType::firstOrCreate([
            'id' => 3,
            'type' => 'Estágio',
        ]);
    }
}
