<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Profesor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clase;
use App\Models\Alumno;
use App\Models\Alumno_Clase;
use App\Models\Dia;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClaseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $search = $request->get('search');
    $filtro = $request->get('filtro');

    $clases = Clase::with('dias')
      ->search($filtro, $search)
      ->orderByDesc('id')
      ->simplePaginate(4);
    // dd($clases);
    Session::put('clase_url', request()->fullUrl());

    return view('clase.index', compact('clases'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dias = Dia::all();
    $horarios = Horario::all();

    return view('clase.create', compact('horarios', 'dias'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'tipo_clase' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'horario_id' => 'required',
      'dias' => 'required|array|min: 1'
    ], ['dias.required' => 'Debe seleccionar al menos 1 día de la semana.']);

    foreach ($request->dias as $dia) {
      $query = DB::select("select count(*) as contador from clases join clase_dia on clases.id = clase_dia.clase_id JOIN dias on clase_dia.dia_id = dias.id join horarios on clases.horario_id = horarios.id where clases.tipo_clase = ? and dias.id = ? and horarios.id = ?", [$request->tipo_clase, $dia, $request->horario_id]);
      if ($query[0]->contador > 0) {
        return  back()->with('error', 'Ya existe una clase de ese tipo en los días y horario seleccionados.')->withInput();
      }
    }

    $clase = new Clase();
    $clase->tipo_clase = $request->tipo_clase;
    $clase->horario_id = $request->horario_id;

    for ($i = 0; $i < count($request->dias); $i++) {
      $clase->tarifa_id += 1;
    }

    $clase->save();

    $clase->dias()->sync($request->input('dias', []));

    return redirect('clase')->with('message', 'Clase creada con éxito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    $clase = Clase::findOrFail($id);

    $alumno_clase = DB::select('select users.id as id, users.name as nombre, users.lastName as apellido from users where users.id in (select users.id from users join alumnos on users.id = alumnos.user_id where alumnos.id in(select alumnos.id from alumnos join alumno_clase on alumnos.id = alumno_clase.alumno_id where alumno_clase.clase_id = ?))', [$clase->id]);

    $profesores = DB::select('select users.id as id, users.name as nombre, users.lastName as apellido from users where users.id in (select users.id from users join profesors on users.id = profesors.user_id where profesors.id in(select profesors.id from profesors join clase_profesor on profesors.id = clase_profesor.profesor_id where clase_profesor.clase_id = ?))', [$clase->id]);

    return view('clase.show', compact('clase', 'alumno_clase', 'profesores'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $clase = Clase::findOrFail($id);
    $dias = Dia::all();
    $clase_dias = $clase->dias->pluck('id')->toArray();
    $horarios = Horario::all();

    return view('clase.edit', compact('clase', 'horarios', 'dias', 'clase_dias'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $clase = Clase::find($id);

    $request->validate([
      'tipo_clase' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'horario_id' => 'required',
      'dias' => 'required|array|min: 1'
    ], ['dias.required' => 'Debe seleccionar al menos 1 día de la semana.']);

    foreach ($request->dias as $dia) {
      $query = DB::select("select count(*) as contador, clases.id as id, clases.tipo_clase as tipo_clase, clases.horario_id as horario, dias.id as dia from clases join clase_dia on clases.id = clase_dia.clase_id JOIN dias on clase_dia.dia_id = dias.id join horarios on clases.horario_id = horarios.id where clases.tipo_clase = ? and dias.id = ? and horarios.id = ?", [$request->tipo_clase, $dia, $request->horario_id]);

      for ($i = 0; $i < count($query); $i++) {
        $id = $query[$i]->id;
      }

      if ($query[0]->contador > 0 && $clase->id != $id) {
        return  back()->with('error', 'Ya existe una clase de ese tipo en los días y horario seleccionados.')->withInput();
      }
    }

    $clase->tipo_clase = $request->get('tipo_clase');
    $clase->horario_id = $request->get('horario_id');
    $clase->dias()->sync($request->get('dias', []));
    $clase->tarifa_id = count($request->dias);

    $clase->save();

    if (session('clase_url')) {
      return redirect(session('clase_url'))->with('message', 'Clase modificada con éxito.');
    }
    return redirect('clase')->with('message', 'Clase modificada con éxito.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $clase = Clase::findOrFail($id);


    $query = DB::table('alumno_clase')->where('alumno_clase.clase_id', '=', $clase->id)->count();

    if ($clase->profesors()->count() || $query > 0) {
      return redirect('clase')->with('error', 'No es posible eliminar esta clase ya que está relacionada con alumnos o profesores.');
    } else {
      Clase::destroy($id);

      return redirect('clase')->with('message', 'Clase eliminada con éxito.');
    }
  }

  ///////////////////////////////////////////////////* ALUMNOS *////////////////////////////////////////////////////
  public function indexAlumnos($id)
  {
    $cupos = Clase::where('id', $id)->pluck('cupos_disponibles');
    $alumnos = User::where('role_id', 1)->where('active', 1)->get();
    $clase = Clase::findOrFail($id);
    $alumno_clase = DB::select('select users.id as id, users.name as nombre, users.dni as dni, users.lastName as apellido from users where users.id in (select users.id from users join alumnos on users.id = alumnos.user_id where alumnos.id in(select alumnos.id from alumnos join alumno_clase on alumnos.id = alumno_clase.alumno_id where alumno_clase.clase_id = ?))', [$clase->id]);

    return view('clase.alumnos', compact('alumnos', 'clase', 'alumno_clase', 'cupos'));
  }

  public function addAlumnos(Request $request, $id)
  {
    $clase = Clase::findOrFail($id);
    $cupos = Clase::where('id', $id)->pluck('cupos_disponibles');

    $validacion = DB::select('SELECT COUNT(*) as enClase FROM alumno_clase WHERE alumno_clase.alumno_id IN (SELECT alumnos.id FROM alumnos JOIN users ON alumnos.user_id = users.id WHERE alumnos.user_id = ?) AND alumno_clase.clase_id = ?', [$request->alumno, $clase->id]);

    if ($validacion[0]->enClase > 0) {
      return  back()->with('error', 'El alumno ya se encuentra en esta clase.');
    }

    $alumno_id = DB::select('select alumnos.id as id from alumnos where alumnos.user_id = ?', [$request->alumno]);
    // dd($alumno_id[0]->id);

    $alumno_clase = new Alumno_Clase();
    $alumno_clase->alumno_id = $alumno_id[0]->id;
    $alumno_clase->clase_id = $clase->id;
    $alumno_clase->save();


    $cupos_disp = $cupos[0] - 1;
    $clase->cupos_disponibles = $cupos_disp;
    $clase->save();


    return back();
  }
  public function deleteAlumnos($user_id, $clase_id)
  {
    $clase = Clase::findOrFail($clase_id);
    $cupos = Clase::where('id', $clase_id)->pluck('cupos_disponibles');
    $alumno_id = DB::select('select alumnos.id as id from alumnos where alumnos.user_id = ?', [$user_id]);

    $query = DB::select('select alumno_clase.id as id from alumno_clase where alumno_clase.alumno_id = ? and alumno_clase.clase_id = ?', [$alumno_id[0]->id, $clase_id]);

    $alumno_clase = Alumno_Clase::where('id', '=', $query[0]->id);
    $alumno_clase->delete();


    $cupos_disp = $cupos[0] + 1;
    $clase->cupos_disponibles = $cupos_disp;
    $clase->save();
    return back();
  }



  ///////////////////////////////////////////////////* PROFESORES *////////////////////////////////////////////////////

  public function indexProfesores($id)
  {

    $profesores = User::whereIn('role_id', [2, 3])->where('active', 1)->get();
    // dd($profesores);
    $clase = Clase::findOrFail($id);
    $clase_profesor = DB::select('select users.id as id, users.name as nombre, users.lastName as apellido, users.dni as dni from users where users.id in (select users.id from users join profesors on users.id = profesors.user_id where profesors.id in(select profesors.id from profesors join clase_profesor on profesors.id = clase_profesor.profesor_id where clase_profesor.clase_id = ?))', [$clase->id]);

    return view('clase.profesores', compact('profesores', 'clase', 'clase_profesor'));
  }
  public function addProfesores(Request $request, $id)
  {
    $clase = Clase::findOrFail($id);

    $validacion = DB::select('SELECT COUNT(*) as enClase FROM clase_profesor WHERE clase_profesor.profesor_id IN (SELECT profesors.id FROM profesors JOIN users ON profesors.user_id = users.id WHERE profesors.user_id = ?) AND clase_profesor.clase_id = ?', [$request->profesor, $clase->id]);

    if ($validacion[0]->enClase > 0) {
      return  back()->with('error', 'El profesor ya se encuentra en esta clase.');
    }

    $profesor_id = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [$request->profesor]);
    // dd($alumno_id[0]->id);

    $clase->profesors()->attach($profesor_id[0]->id);

    return back();
  }
  public function deleteProfesores($user, $id)
  {

    $clase = Clase::findOrFail($id);
    // dd($clase);

    $profesor = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [$user]);
    $profesor_id = $profesor[0]->id;

    $clase->profesors()->detach($profesor_id);

    return back();
  }
}
