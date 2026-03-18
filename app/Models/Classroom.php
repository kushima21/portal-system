<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $primaryKey = 'classroom_id';

    protected $fillable = [
        'year_level',
        'section',
        'year_level_category',
        'adviser',
    ];

    public $timestamps = true;
}