<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Henctr extends Model
{
    use HasFactory;

    protected $table = 'henctr';

    protected $primaryKey = 'enccode';

    public $incrementing = false;

    protected $fillable = [
        'enccode',
        'hpercode',
        'encdate',
        'enctime',
        'toecode',
    ];

    public $timestamps = false;
}
