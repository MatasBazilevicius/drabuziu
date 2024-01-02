<?php
// Drabuziai.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drabuziai extends Model
{
    protected $connection = 'parde'; // specify the database connection
    protected $table = 'drabuziai'; // specify the table name if it's different from the model name
    protected $primaryKey = 'id_Drabuzis'; // specify the primary key if it's different
    protected $fillable = ['Pavadinimas', 'Aprasas', 'Nuotrauka', 'Kaina', 'Kiekis', 'Sukurimo_data', 'Lytis', 'fk_Gamintojasid_Gamintojas'];
    
    // other model properties...
    public function medziaga()
{
    return $this->belongsTo(Medziaga::class, 'fk_Medziagaid_Medziaga');
}

}
