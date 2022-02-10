<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clase extends Model
{
  use HasFactory;

  protected $fillable =
  [
    'tipo_clase',
    'cupos_disponibles',
    'horario_id',
    'tarifa_id'
  ];

  public function alumno_clase()
  {
    return $this->HasMany(Alumno_Clase::class);
  }

  public function profesors()
  {
    return $this->belongsToMany(Profesor::class)
      ->withTimestamps();
  }

  public function tarifa()
  {
    return $this->belongsTo(Tarifa::class);
  }

  public function dias()
  {
    return $this->belongsToMany(Dia::class)->withTimestamps();
  }

  public function horario()
  {
    return $this->belongsTo(Horario::class);
  }

  public function ejercicios()
  {
    return $this->belongsToMany(Ejercicio::class);
  }

  // QUERY SCOPES

  public function scopeSearch($query, $filtro, $search)
  {
    if (($filtro) && trim($search) && ($filtro != "")) {
      switch ($filtro) {
        case 1:
          $filtro = 'tipo_clase';
          return $query->where($filtro, "LIKE", "%$search%");
          break;

        case 2:
          $filtro = 'hora';
          return $query->whereHas('horario', function($query) use($filtro, $search) {
            $query->where($filtro, "LIKE", "%$search%");
            });
          break;

        case 3:
          $filtro = 'dia';
          return $query->whereHas('dias', function($query) use($filtro, $search) {
            $query->where($filtro, "LIKE", "%$search%");
            });
          break;

        case 4:
          $query->whereHas('alumno_clase', function ($query) use ($search) {
            $query->whereHas('alumno', function ($query) use ($search) {
              $query->whereHas('user', function ($query) use ($search) {
                return $query->where(DB::raw("CONCAT(name,' ',lastName)"), "LIKE", "%$search%");
              });
            });
          });
          break;
          
        case 5:
          return $query->whereHas('profesors', function($query) use($search) {
            $query->whereHas('user', function($query) use($search) {
              return $query->where(DB::raw("CONCAT(name,' ',lastName)"), "LIKE", "%$search%");
            });
          });
          break;
      }
    } elseif (trim($search) == "") {
      $filtro = "";
    }
  }

}
