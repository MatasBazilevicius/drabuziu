<?php
// Drabuziai.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql'; // specify the database connection
    protected $table = 'kategorijos'; // specify the table name if it's different from the model name
    protected $primaryKey = 'id_Kategorija'; // specify the primary key if it's different
    protected $fillable = ['pavadinimas', 'aprasymas','id_Kategorija','fk_Kategorijaid_Kategorija'];

    // Inside your Kategorijos model
public function fkKategorija()
    {
        return $this->belongsTo(Kategorija::class, 'fk_Kategorijaid_Kategorija', 'id_Kategorija');
    }   

    use HasFactory;
    
    // other model properties...
}
