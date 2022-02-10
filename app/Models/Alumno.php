<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Alumno extends User
{
    use HasFactory;

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function alumno_clase(){
      return $this->HasMany(Alumno_Clase::class);
    }
}
