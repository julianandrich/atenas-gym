<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
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

    $horarios = Horario::orderBy('hora', 'ASC')
      ->search($filtro, $search)
      ->simplePaginate(4);

    return view('horario.index', compact('horarios'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('horario.create');
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
      'hora' => 'required|unique:horarios|after:07:59|before:22:00'
    ], [
      'hora.after' => 'El horario debe ser a partir de las 08:00 AM.',
      'hora.before' => 'El horario debe ser antes de las 22:00 PM.'
    ]);

    $hora = new \DateTime($request->hora);
    $formathora = $hora->format('H:i');
    $horario = new Horario();
    $horario->hora = $formathora;
    $horario->save();

    return redirect('horario')->with('message', 'Horario creado con éxito.');
  }


  public function edit($id)
  {
    $horario = Horario::findOrFail($id);
    return view('horario.edit', compact('horario'));
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
    $horario = Horario::findOrFail($id);
    // dd($horario->id);
    $request->validate([
      'hora' =>
      'required|after:07:59|before:22:00|unique:horarios,hora,' . $horario->id,
    ], [
      'hora.after' => 'El horario debe ser a partir de las 08:00 AM.',
      'hora.before' => 'El horario debe ser antes de las 22:00 PM.'
    ]);

    $horario = request()->except('_token', '_method');

    Horario::where('id', '=', $id)->update($horario);

    return redirect('horario')->with('message', 'Horario modificado con éxito.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $horario = Horario::findOrFail($id);

    if ($horario->clases()->count()) {
      return redirect('horario')->with('error', 'No es posible eliminar este horario ya que está relacionado a una clase.');
    } else {
      Horario::destroy($id);

      return redirect('horario')->with('message', 'Horario eliminado con éxito.');
    }
  }
}
