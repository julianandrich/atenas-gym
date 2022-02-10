<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
  use HasFactory;

  protected $fillable = [
    'dia',
  ];

  public function clases()
  {
    return $this->belongsToMany(Clase::class)->withTimestamps();
  }
}
