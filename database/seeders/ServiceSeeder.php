<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Htypser;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['DENTA', 'Dental', 'A', 'DENTA'],
            ['ENTHN', 'ENT-HNS', 'A', 'ENTHN'],
            ['FAMED', 'FAMILY MEDICINE', 'A', 'MEDIC'],
            ['GYNEC', 'GYNECOLOGY', 'A', 'OBGYN'],
            ['MEDIC', 'MEDICINE', 'A', 'MEDIC'],
            ['OBSTE', 'OBSTETRICS', 'A', 'OBGYN'],
            ['OPTHA', 'OPHTHALMOLOGY', 'A', 'OPTHA'],
            ['ORTHO', 'ORTHOPEDICS', 'A', 'ORTHO'],
            ['PEDIA', 'PEDIATRICS', 'A', 'PEDIA'],
            ['PSYCH', 'Psychiatry', 'A', 'PSYCH'],
            ['SURGE', 'SURGERY', 'A', 'SURGI']
        ];

        foreach ($data as $row) {
            Htypser::updateOrCreate(
                [ 'tscode' => $row[0] ],
                [
                    'tsdesc' => $row[1],
                    'tsstat' => $row[2],
                    'tstype' => $row[3],
                ]
            );
        }
    }
}
