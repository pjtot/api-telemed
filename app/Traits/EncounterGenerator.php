<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Henctr;
use App\Models\Hopdlog;
use App\Models\Hperson;
use Illuminate\Support\Facades\DB;

trait EncounterGenerator {
    protected function generateEncounterCode($hpercode, $encdate): string
    {
        return "OPD" . ltrim($hpercode, '0') . Carbon::parse($encdate)->format('MdYHis');
    }

    protected function generateEncounter($hpercode, $tscode, $priority, $teleconsultation)
    {
        try {
            DB::beginTransaction();

            $encdate = date('Y-m-d H:i:s');
            $enccode = $this->generateEncounterCode($hpercode, $encdate);
            $age = $this->computeAgeInYearsMonthDay($hpercode);
            $disinstruc = $teleconsultation ? 'T' : ($priority == 0 ? 'R' : 'P');
            $filling = Hopdlog::whereRaw("cast(opddate as date) = '" . date('Y-m-d') . "'")
                ->where([
                    ['tscode', $tscode],
                    ['disinstruc', $disinstruc],
                ])
                ->count() + 1;

            Henctr::create([
                'enccode' => $enccode,
                'hpercode' => $hpercode,
                'encdate' => $encdate,
                'enctime' => $encdate,
                'toecode' => 'OPD',
            ]);

            Hopdlog::create([
                'enccode' => $enccode,
                'hpercode' => $hpercode,
                'opddate' => $encdate,
                'opdtime' => $encdate,
                'tacode' => 'SERVI',
                'tscode' => $tscode,
                'opdstat' => 'A',
                'newold' => Hopdlog::where('hpercode', $hpercode)->count() > 0 ? 'O' : 'N',
                'filling' => $filling,
                'datetriage' => $encdate,
                'patage' => $age['year'],
                'patagemo' => $age['month'],
                'patagedy' => $age['day'],
                'disinstruc' => $disinstruc,
            ]);

            DB::commit();

            return $enccode;
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    protected function computeAgeInYearsMonthDay($hpercode): array
    {
        $hperson = Hperson::find($hpercode);
        $age = Carbon::parse($hperson->patbdate)->diff(Carbon::now());
        $ageInYears = $age->y;
        $ageInMonths = $age->m;
        $ageInDays = $age->d;

        return [
            'year' => $ageInYears,
            'month' => $ageInMonths,
            'day' => $ageInDays,
        ];
    }
}