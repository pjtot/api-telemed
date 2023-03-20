<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Hperson extends Model
{
    use HasFactory, FilterQueryString;

    protected $table = 'hperson';

    protected $primaryKey = 'hpercode';

    public $incrementing = false;

    protected $fillable = [
        'hpercode',
        'patlast',
        'patfirst',
        'patbdate',
        'patsex',
    ];

    public $timestamps = false;

    protected $filters = [
        'hpercode',
        'patlast',
        'patfirst',
        'like',
    ];
}
