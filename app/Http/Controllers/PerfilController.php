<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
  public function update(Request $request)
  {
    $request->validate([
      'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
      'phone' => 'required|int',
      'emergency_number' => 'required|int',
    ]);

    auth()->user()->update($request->only('email', 'phone', 'emergency_number'));

    if ($request->input('password')) {
      $request->validate(['password' => 'min:6|confirmed']);
      auth()->user()->update(['password' => bcrypt($request->input('password'))]);
    }

    return redirect('perfil')->with('message', 'Perfil modificado con éxito.');
  }
}
