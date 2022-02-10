<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

     protected $fillable = ['precio','cantidad_dias'];

  public function clase(){
    return $this->HasMany(Clase::class);
  }


  public function scopeSearch($query, $filtro, $search)
  {
      if (($filtro) && trim($search) && ($filtro != "")) {
        switch ($filtro) {
          case 1:
            $filtro = 'precio';
            return $query->where($filtro, "LIKE", "%$search%");
            break;
          case 2:
            $filtro = 'cantidad_dias';
            return $query->where($filtro, "LIKE", "%$search%");
            break;
  
       
        }
      } elseif (trim($search) == "") {
        $filtro = "";
      }
  }

}


