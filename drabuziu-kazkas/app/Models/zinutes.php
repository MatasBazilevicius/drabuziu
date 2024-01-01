<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zinutes extends Model
{
    protected $connection = 'parde'; // specify the database connection
    protected $table = 'zinutes'; // specify the correct table name
    protected $primaryKey = 'id_Zinute'; // specify the correct primary key
    protected $fillable = ['Turinys', 'Laikas', 'id_Zinute', 'fk_Naudotojasid_Naudotojas', 'fk_Naudotojasid_Naudotojas1'];
    
    // other model properties...

    // Assuming you want to use timestamps
    public $timestamps = false; // Set to true if you have 'created_at' and 'updated_at' columns in your table
}
