<?php
// app/Models/UserZ.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserZ extends Model
{
    protected $table = 'naudotojai'; // replace with the actual users table name
    protected $primaryKey = 'id_Naudotojas';

    // Your other model properties...

    public function messages()
    {
        return $this->hasMany(Zinutes::class, 'fk_Naudotojasid_Naudotojas');
    }
}
