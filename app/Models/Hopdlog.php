<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopdlog extends Model
{
    use HasFactory;

    protected $table = 'hopdlog';

    protected $primaryKey = 'enccode';

    public $incrementing = false;

    protected $fillable = [
        'enccode',
        'hpercode',
        'opddate',
        'opdtime',
        'tacode',
        'tscode',
        'opdstat',
        'newold',
        'filling',
        'datetriage',
        'patage',
        'patagemo',
        'patagedy',
        'disinstruc',
    ];

    public $timestamps = false;
}
