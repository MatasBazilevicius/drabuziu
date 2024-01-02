<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spalva extends Model
{
    protected $table = 'spalvos';
    protected $primaryKey = 'id_Spalva';
    public $timestamps = false; // Set to false if your table doesn't have created_at and updated_at columns

    protected $fillable = [
        'Spalva',
        'id_Spalva',
    ];

    // Other model properties, relationships, and methods can be defined here
}
