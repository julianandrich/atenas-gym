<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;

class TarifaController extends Controller
{
    
    public function index(Request $request)
    {
        $tarifas = Tarifa::orderBy('cantidad_dias','ASC')
        ->simplePaginate(5);
        return view('tarifa.index',compact('tarifas'));
    }

    public function create()
    {
        return view('tarifa.create');
    }

    public function edit($id)
    {
        $tarifa = Tarifa::findOrFail($id);
        return view('tarifa.edit', compact("tarifa"));
    }

}
