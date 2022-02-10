<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno_Clase extends Pivot
{

  use HasFactory;

  protected $table = 'alumno_clase';

  protected $fillable = [
    'alumno_id', 'clase_id'
  ];

  public function alumno()
  {
    return $this->belongsTo(Alumno::class);
  }

  public function clase()
  {
    return $this->belongsTo(Clase::class);
  }

  public function asistencias()
  {
    return $this->HasMany(Asistencia::class);
  }

  public function rutinas()
  {
    return $this->HasMany(Rutina::class);
  }

  public function cuotas()
  {
    return $this->HasMany(Cuota::class);
  }
}
