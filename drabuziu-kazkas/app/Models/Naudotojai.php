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
    protected $fillable = ['id_Naudotojas', 'Vardas', 'El_pastas'];

    public $timestamps = false;

}
