<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\EncounterGenerator;
use App\Models\Hperson;
use Carbon\Carbon;

class EncounterSeeder extends Seeder
{
    use EncounterGenerator;

    public function run(): void
    {
        $patients = Hperson::all();

        foreach ($patients as $patient) {
            $this->generateEncounter(
                $patient->hpercode,
                'MEDIC',
                Carbon::parse($patient->patbdate)->diffInYears(now()) > 60 ? 1 : 0,
                rand(0, 1),
            );
        }
    }
}
