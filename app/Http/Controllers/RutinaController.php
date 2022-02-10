<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\User;
use App\Models\Alumno_Clase;
use App\Models\Ejercicio;
use App\Models\Profesor;
use Illuminate\Support\Facades\DB;

class RutinaController extends Controller
{

  public function index(Request $request)
  {

    $search = $request->get('search');
    $filtro = $request->get('filtro');

    $rutinas = Rutina::orderBy('id', 'DESC')
      ->search($filtro, $search)
      ->simplePaginate(10);

    // dd($rutinas);
    return view('rutina.index', compact('rutinas'));
  }

  public function create()
  {
    $alumnos =
      DB::select('select users.id as user_id, users.name as name, users.dni as dni, users.lastName as lastname, alumnos.id as alumno_id from users join alumnos on users.id = alumnos.user_id where users.active = 1');

    // $alumnos = User::where('role_id', 1)->where('active', 1)->get();

    $profesor = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [auth()->id()]);

    return view('rutina.create', compact('alumnos', 'profesor'));
  }

  public function store(Request $request)
  {

    $queryAlumnoClase = DB::select('select alumno_clase.id as id from alumno_clase where alumno_clase.id in (select alumno_clase.id from alumno_clase join alumnos on alumno_clase.alumno_id = alumnos.id where alumno_clase.clase_id = ? and alumno_clase.alumno_id in (SELECT alumno_clase.alumno_id from alumno_clase JOIN alumnos on alumno_clase.alumno_id = alumnos.id JOIN users on alumnos.user_id = users.id where users.id = ?))', [$request->clase, $request->alumno]);

    $validacion = DB::select('select count(*) as c from rutinas where alumno_clase_id = ? and fecha_emision = ?', [$queryAlumnoClase[0]->id, now()->format('Y/m/d')]);

    if ($validacion[0]->c > 0) {
      return  back()->with('error', 'No es posible crear más de una rutina el día de hoy para este alumno en dicha clase.');
    }

    $queryProfesor = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [auth()->id()]);

    $alumno_clase = Alumno_Clase::findOrFail($queryAlumnoClase[0]->id);
    $profesor = Profesor::findOrFail($queryProfesor[0]->id);

    $rutina = Rutina::create([
      'alumno_clase_id' => $alumno_clase->id,
      'fecha_emision' => now()->format('Y/m/d'),
      'profesor_id' => $profesor->id,
    ]);

    return redirect('rutina')->with('message', 'Rutina creada con éxito.');
  }

  public function show($id)
  {
    $rutina = Rutina::findOrFail($id);

    $ejercicios_rutina = DB::select('select ejercicios.id as id, ejercicio_rutina.id as ejercicio_rutina_id, ejercicios.nombre_ejercicio as nombre_ejercicio, rutinas.id as rutina_id, ejercicio_rutina.series as series, ejercicio_rutina.repeticiones as repeticiones, ejercicio_rutina.descanso as descanso from ejercicio_rutina join ejercicios on ejercicio_rutina.ejercicio_id = ejercicios.id join rutinas on ejercicio_rutina.rutina_id = rutinas.id where rutina_id = ?', [$rutina->id]);

    return view('rutina.show', compact('rutina', 'ejercicios_rutina'));
  }

  public function edit($id)
  {
    $rutina = Rutina::findOrFail($id);
    $alumnos = User::where('role_id', '1')->where('active', '1')->get();
    $profesor = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [auth()->id()]);

    return view('rutina.edit', compact('rutina', 'alumnos', 'profesor'));
  }

  public function update(Request $request, $id)
  {
    $rutina = Rutina::findOrFail($id);
    $queryAlumnoClase = DB::select('select alumno_clase.id as id from alumno_clase where alumno_clase.id in (select alumno_clase.id from alumno_clase join alumnos on alumno_clase.alumno_id = alumnos.id where alumno_clase.clase_id = ? and alumno_clase.alumno_id in (SELECT alumno_clase.alumno_id from alumno_clase JOIN alumnos on alumno_clase.alumno_id = alumnos.id JOIN users on alumnos.user_id = users.id where users.id = ?))', [$request->clase, $request->alumno]);

    $validacion = DB::select('select count(*) as c from rutinas where alumno_clase_id = ? and fecha_emision = ?', [$queryAlumnoClase[0]->id, now()->format('Y/m/d')]);

    if ($validacion[0]->c > 0) {
      return  back()->with('error', 'No es posible crear más de una rutina el día de hoy para este alumno en dicha clase.');
    }

    $queryProfesor = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [auth()->id()]);

    $alumno_clase = Alumno_Clase::findOrFail($queryAlumnoClase[0]->id);
    $profesor = Profesor::findOrFail($queryProfesor[0]->id);


    $rutina->alumno_clase_id = $alumno_clase->id;
    $rutina->fecha_emision = now()->format('Y/m/d');
    $rutina->profesor_id = $profesor->id;

    $rutina->save();

    return redirect('rutina')->with('message', 'Rutina modificada con éxito.');
  }

  public function destroy($id)
  {
    // $rutina = Rutina::findOrFail($id);
    // dd($rutina->ejercicios->count());
    // if ($rutina->ejercicios->count() > 0) {
    //   return redirect('rutina')->with('error', 'No es posible eliminar este rutina ya que tiene ejercicios asignados.');
    // } else {
    Rutina::destroy($id);

    return redirect('rutina')->with('message', 'Rutina eliminada con éxito.');
    // }
  }

  public function findClase()
  {
    $data = DB::query()
      ->select('clases.id', 'clases.tipo_clase', 'horarios.hora', DB::raw("GROUP_CONCAT(dias.dia SEPARATOR ', ') as dias"))
      ->from('clases')
      ->join('horarios', 'clases.horario_id', '=', 'horarios.id')
      ->join('clase_dia', 'clases.id', '=', 'clase_dia.clase_id')
      ->join('dias', 'clase_dia.dia_id', '=', 'dias.id')
      ->whereIn('clases.id', function ($query) {
        $query->select('clases.id')
          ->from('clases')
          ->join('alumno_clase', 'clases.id', '=', 'alumno_clase.clase_id')
          ->join('alumnos', 'alumno_clase.alumno_id', '=', 'alumnos.id')
          ->where('alumnos.user_id', '=', request()->input('alumno_id'));
      })
      ->groupby('clases.id')
      ->get();

    return response()->json($data);
  }


  public function indexEjercicios($id)
  {

    $rutina = Rutina::findOrFail($id);

    $ejercicios = Ejercicio::whereHas('clases', function ($query) use ($rutina) {
      $query->where('tipo_clase', '=', $rutina->alumno_clase->clase->tipo_clase);
    })->get();

    $ejercicios_rutina = DB::select('select ejercicios.id as id, ejercicio_rutina.id as ejercicio_rutina_id, ejercicios.nombre_ejercicio as nombre_ejercicio, rutinas.id as rutina_id, ejercicio_rutina.series as series, ejercicio_rutina.repeticiones as repeticiones, ejercicio_rutina.descanso as descanso from ejercicio_rutina join ejercicios on ejercicio_rutina.ejercicio_id = ejercicios.id join rutinas on ejercicio_rutina.rutina_id = rutinas.id where rutina_id = ?', [$rutina->id]);

    return view('rutina.ejercicios', compact('rutina', 'ejercicios', 'ejercicios_rutina'));
  }
  public function addEjercicios(Request $request, $id)
  {

    $rutina = Rutina::findOrFail($id);

    $validacion = DB::select('select count(*) as enRutina from ejercicio_rutina where ejercicio_rutina.ejercicio_id = ? and ejercicio_rutina.rutina_id = ?', [$request->ejercicio, $rutina->id]);

    if ($validacion[0]->enRutina > 0) {
      return  back()->with('error', 'El ejercicio ya se encuentra en esta rutina.');
    }

    $rutina->ejercicios()->attach($request->ejercicio, ['series' => $request->series, 'repeticiones' => $request->repeticiones, 'descanso' => $request->descanso]);

    return back();
  }
  public function deleteEjercicios($ejercicio, $id)
  {

    $rutina = Rutina::findOrFail($id);

    $ejercicio = DB::select('select ejercicios.id as id from ejercicios where ejercicios.id = ?', [$ejercicio]);
    $ejercicio_id = $ejercicio[0]->id;

    $rutina->ejercicios()->detach($ejercicio_id);

    return back();
  }
}
