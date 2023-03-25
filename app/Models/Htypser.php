<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Htypser extends Model
{
    use HasFactory, FilterQueryString;

    protected $table = 'htypser';

    protected $primaryKey = 'tscode';

    public $incrementing = false;

    public $timestamps = false;

    public $filters = [
        'tscode',
        'tsstat',
        'tstype',
        'sort',
    ];
}
