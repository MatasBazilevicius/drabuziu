<?php
// app/Models/Gamintojas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamintojas extends Model
{
    use HasFactory;

    protected $table = 'gamintojai';
    protected $primaryKey = 'id_Gamintojas';
    public $timestamps = false; // Set to false if your table doesn't have created_at and updated_at columns

    protected $fillable = [
        'Gamintojas',
        'id_Gamintojas'
    ];

    // Other model properties, relationships, and methods can be defined here
}
