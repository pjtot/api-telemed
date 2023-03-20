<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpersonal extends Model
{
    use HasFactory;

    protected $table = 'hpersonal';

    protected $primaryKey = 'employeeid';

    public $incrementing = false;

    protected $fillable = [
        'employeeid',
        'lastname',
        'firstname',
        'middlename',
        'postitle',
        'deptcode',
    ];

    public $timestamps = false;

    public function htypser()
    {
        return $this->belongsTo(Htypser::class, 'deptcode', 'tscode');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'employeeid', 'employeeid');
    }
}
