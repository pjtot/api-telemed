<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
        ]);

        \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'email' => 'admin@demo.com',
            'password' => bcrypt('password'),
            'employeeid' => \App\Models\Hpersonal::factory()->create([
                'deptcode' => 'MEDIC',
            ])->employeeid,
        ]);

        \App\Models\Hperson::factory(100)->create();

        $this->call([
            EncounterSeeder::class,
        ]);
    }
}