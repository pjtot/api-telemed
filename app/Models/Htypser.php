<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htypser extends Model
{
    use HasFactory;

    protected $table = 'htypser';

    protected $primaryKey = 'tscode';

    public $incrementing = false;

    protected $fillable = [
        'tscode',
        'tsdesc',
        'tsstat',
        'tstype',
    ];

    public $timestamps = false;
}
