<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use App\Models\Ejercicio;
use Illuminate\Support\Facades\DB;

class EjercicioController extends Controller
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

    $ejercicios = Ejercicio::with('clases')
      ->search($filtro, $search)
      ->orderByDesc('id')
      ->simplePaginate(10);

    return view('ejercicio.index', compact('ejercicios'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $clases = Clase::orderBy('tipo_clase', 'desc')->groupBy('tipo_clase')->get();
    return view('ejercicio.create', compact('clases'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'tipo_clase' => 'required',
      'nombre_ejercicio' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255|unique:ejercicios,nombre_ejercicio',
      'descripcion' => 'required|string|max:255|unique:ejercicios,descripcion',
    ], ['tipo_clase.required' => 'El campo tipo de clase es obligatorio.']);


    // for ($i = 0; $i < count($request->tipo_clase); $i++) {
    //   $query = DB::select('select * from ejercicios join clase_ejercicio on ejercicios.id = clase_ejercicio.ejercicio_id join clases on clase_ejercicio.clase_id = clases.id where clases.id = ? and ejercicios.nombre_ejercicio = ? and ejercicios.descripcion = ?', [$request->tipo_clase[$i], $request->nombre_ejercicio, $request->descripcion]);



    // }

    // foreach ($request->tipo_clase as $clase) {
    //   dd($clase[1]);
    //   // $query = DB::select('select count(*) from ejercicios join clase_ejercicio on ejercicios.id = clase_ejercicio.ejercicio_id join clases on clase_ejercicio.clase_id = clases.id where clases.tipo_clase = ? and ejercicios.nombre_ejercicio = ? and ejercicios.descripcion = ?', [$clase, $request->nombre_ejercicio, $request->descripcion]);
    // }


    $ejercicio = new Ejercicio();

    $ejercicio->nombre_ejercicio = ucfirst($request->nombre_ejercicio);
    $ejercicio->descripcion = ucfirst($request->descripcion);
    $ejercicio->save();

    $ejercicio->clases()->sync($request->input('tipo_clase'), []);

    return redirect('ejercicio')->with('message', 'Ejercicio creado con éxito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    $ejercicio = Ejercicio::findOrFail($id);
    $clases = Clase::all();
    $clase_ejercicio = $ejercicio->clases->pluck('id')->toArray();
    return view('ejercicio.edit', compact('ejercicio', 'clases', 'clase_ejercicio'));
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
    $ejercicio = Ejercicio::findOrFail($id);

    $request->validate([
      'tipo_clase' => 'required',
      'nombre_ejercicio' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255|unique:ejercicios,nombre_ejercicio,' . $ejercicio->id,
      'descripcion' =>
      'required|string|max:255|unique:ejercicios,descripcion,' . $ejercicio->id,
    ]);

    $ejercicio = request()->except('_token', '_method', 'tipo_clase');
    Ejercicio::where('id', '=', $id)->update($ejercicio);
    $ejer = Ejercicio::find($id);
    $ejer->clases()->sync($request->input('tipo_clase'));


    return redirect('ejercicio')->with('message', 'Ejercicio modificado con éxito.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Ejercicio::destroy($id);

    return redirect('ejercicio')->with('message', 'Ejercicio eliminado con éxito.');
  }
}
