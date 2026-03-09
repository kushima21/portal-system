<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // Table name
    protected $table = 'subjects';

    // Primary key (since your table uses subject_id, not id)
    protected $primaryKey = 'subject_id';

    // If subject_id is auto-increment
    public $incrementing = true;

    // Data type of the primary key
    protected $keyType = 'int';

    // Allow mass assignment
    protected $fillable = [
        'subject_code',
        'descriptive_title'
    ];
}