<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

     protected $fillable = 
    [
      'fecha_asistencia',
      'horario_asistencia',
      'asistio',
    ];

    public function alumno_clase(){
      return $this->belongsTo(Alumno_Clase::class);
    }
}
