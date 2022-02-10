<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Profesor extends User
{
  use HasFactory;

  public function __construct()
  {
    //
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function clases()
  {
    return $this->belongsToMany(Clase::class)->withTimestamps();
  }

  public function rutinas()
  {
    return $this->hasMany(Rutina::class);
  }
}
