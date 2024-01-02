<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzsakymai extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql'; // specify the database connection
    protected $table = 'uzsakymai'; // specify the table name if it's different from the model name
    protected $primaryKey = 'id_Uzsakymas'; // specify the primary key if it's different
    protected $fillable = [
        'suma', 'Vardas', 'Pavarde', 'Gatves_adresas',
        'Miestas', 'Pasto_kodas', 'Pristatymo_salis', 'pristatymo_budas',
        'busena', 'id_Uzsakymas', 'fk_Krepselisid_Krepselis',
        'fk_Nuolaidų_Kodaiid_Nuolaidų_Kodai', 'fk_Apmokejimasid_Apmokejimas'
    ];

    use HasFactory;

    // You can define relationships or other model-specific methods here...
}
