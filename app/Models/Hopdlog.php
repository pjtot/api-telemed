<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Hopdlog extends Model
{
    use HasFactory, FilterQueryString;

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

    public $filters = [
        'enccode',
        'hpercode',
        'opddate',
        'disinstruc',
        'limit',
        'like',
        'sort',
    ];

    protected $with = [ 'patient', 'service' ];

    public function patient()
    {
        return $this->belongsTo(Hperson::class, 'hpercode', 'hpercode');
    }

    public function service()
    {
        return $this->belongsTo(Htypser::class, 'tscode', 'tscode');
    }

    public function limit($query, $value): \Illuminate\Database\Eloquent\Builder
    {
        return $query->limit($value);
    }
}
