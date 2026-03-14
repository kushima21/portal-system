<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $table = 'personnels';
    protected $primaryKey = 'personel_id'; // Important
    public $incrementing = false;           // since personel_id is not auto-increment
    protected $keyType = 'string';          // if ID is string, adjust as needed

    protected $fillable = [
        'personel_id',
        'fname',
        'lname',
        'mname',
        'gender',
        'birthdate',
        'religion',
        'address',
        'nationality',
        'contact_number',
        'email',
        'civil_status',
    ];
}