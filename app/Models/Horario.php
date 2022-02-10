<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Horario extends Model
{
  use HasFactory;
  protected $table = 'horarios';

  protected $fillable = ['hora'];

  protected $dates = ['hora'];

  public function __construct()
  {
    //
  }

  public function clases()
  {
    return $this->hasMany(Clase::class);
  }

  // QUERY SCOPES
  public function scopeSearch($query, $filtro, $search)
  {
    if (($filtro) && trim($search) && ($filtro != "")) {
      $filtro = 'hora';
        return $query->where($filtro, "LIKE", "%$search%");
    }
  }
}
