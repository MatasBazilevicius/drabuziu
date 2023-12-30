<?php
// zinutes.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drabuziai extends Model
{
    protected $connection = 'parde'; // specify the database connection
    protected $table = 'zinutes'; // specify the table name if it's different from the model name
    protected $primaryKey = 'id_Zinute'; // specify the primary key if it's different
    protected $fillable = [ 'Turinys', 'fk_Naudotojasid_Naudotojas', 'fk_Naudotojasid_Naudotojas1'];
    
    // other model properties...
}
