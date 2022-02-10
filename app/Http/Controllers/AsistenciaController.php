<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Clase;
use App\Models\Horario;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::orderBy('id','ASC')->paginate(5);
        // $clases = Clase::all();
        // $horarios = Horario::all();
        return view('asistencia.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $clases = Clase::all();
        // $horarios = Horario::all();
        return view('asistencia.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

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
        // $asistencias = Asistencia::findOrFail($id);
        // $clases = Clase::all();
        // $horarios = Horario::all();
        return view('asistencia.edit');
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
        
          
        //   $asistencia = request()->except('_token', '_method');
    
        //   Asistencia::where('id', '=', $id)->update($asistencia);
    
        //   return redirect('asistencia')->with('status', 'Asistencia modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Asistencia::destroy($id);

        // return redirect('asistencia')->with('status', 'Asistencia eliminada con exito');
    }
    
    public function buscarClase()
    {
        return view('asistencia.buscarclase');

    }



}
