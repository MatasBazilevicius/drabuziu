<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dydis extends Model
{
    protected $table = 'dydis';
    protected $primaryKey = 'id_Dydis';
    public $timestamps = false; // Set to false if your table doesn't have created_at and updated_at columns

    protected $fillable = [
        'id_Dydis',
        'name',
    ];

    // Other model properties, relationships, and methods can be defined here
}
