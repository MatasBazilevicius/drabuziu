<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Naudotojai extends Model
{
    protected $table = 'naudotojai';
    protected $primaryKey = 'id_Naudotojas';
    protected $fillable = [
        'Vardas',
        'El_Pastas',
        'Pavarde',
        'telefono_numeris',
        'Adresas',
        'Gimimo_data',
        'Slapyvardis',
        'Slaptazodis',
        'Registracijos_data',
        'Paskutinio_prisijungimo_data',
        'Paskyros_tipas',
        'id_Naudotojas',
    ];

    

    public $timestamps = false;

}
