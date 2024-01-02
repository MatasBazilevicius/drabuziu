<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medziaga extends Model
{
    use HasFactory;

    protected $table = 'medziagos';
    protected $primaryKey = 'id_Medziaga';
    public $timestamps = false; // Set to false if your table doesn't have created_at and updated_at columns

    protected $fillable = [
        'Medziaga',
        'id_Medziaga',
        // Add other fields as needed
    ];

    // Other model properties, relationships, and methods can be defined here
}
