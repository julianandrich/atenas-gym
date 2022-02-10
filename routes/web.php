<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\AlumnoController;

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::view('perfil', 'perfil.edit')->name('perfil');
  Route::put('perfil', [PerfilController::class, 'update'])->name('perfil.update');


  Route::group(['middleware' => 'alumno'], function () {
    Route::get('clases', [AlumnoController::class, 'consultaClase'])->name('alumnos.clase');
    Route::get('buscarClase', [AlumnoController::class, 'buscarClase'])->name('alumnos.buscarClase');
    Route::get('asistencias', [AlumnoController::class, 'consultaAsistencia'])->name('alumnos.asistencia');
    Route::get('rutinas', [AlumnoController::class, 'consultaRutina'])->name('alumnos.rutina');
    Route::get('cuotas', [AlumnoController::class, 'consultaCuota'])->name('alumnos.cuota');
  });

  Route::group(['middleware' => 'profesor'], function () {
    Route::group(['middleware' => 'admin'], function () {
      //gestion usuario
      Route::resource('usuario', UserController::class);
      //gestion clase
      Route::get('clase/{clase}/alumnos', [ClaseController::class, 'indexAlumnos'])->name('clase.alumnos');
      Route::post('addAlumnos/{clase}', [ClaseController::class, 'addAlumnos'])->name('clase.addAlumnos');
      Route::delete('deleteAlumnos/{alumno}/{clase}', [ClaseController::class, 'deleteAlumnos'])->name('clase.deleteAlumnos');
      Route::get('clase/{clase}/profesores', [ClaseController::class, 'indexProfesores'])->name('clase.profesores');
      Route::post('addprofesores/{clase}', [ClaseController::class, 'addProfesores'])->name('clase.addProfesores');
      Route::delete('deleteprofesores/{profesor}/{clase}', [ClaseController::class, 'deleteProfesores'])->name('clase.deleteProfesores');
      Route::resource('clase', ClaseController::class);
      //gestion horario
      Route::resource('horario', HorarioController::class);
      //gestion tarifa
      Route::resource('tarifa', TarifaController::class);
      //gestion ejercicio
      Route::resource('ejercicio', EjercicioController::class);
    });
    //gestion rutina
    Route::get('findClase', [RutinaController::class, 'findClase'])->name('findClase'); //json 
    Route::get('rutina/{rutina}/ejercicios', [RutinaController::class, 'indexEjercicios'])->name('rutina.ejercicios');
    Route::post('addEjercicios/{rutina}', [RutinaController::class, 'addEjercicios'])->name('rutina.addEjercicios');
    Route::delete('deleteEjercicios/{ejercicio}/{rutina}', [RutinaController::class, 'deleteEjercicios'])->name('rutina.deleteEjercicios');
    Route::resource('rutina', RutinaController::class);
    //gestion asistencia
    Route::get('buscarclase', [AsistenciaController::class, 'buscarClase'])->name('asistencia.buscarclase');
    Route::get('asistencia/edit', function () {
      return view('asistencia.edit');
    })->name('asistencia.edit');

    Route::get('asistencia/show', function () {
      return view('asistencia.show');
    })->name('asistencia.show');
    Route::resource('asistencia', AsistenciaController::class)->except(['edit', 'show']);
    //gestion cuota
    Route::get('seleccionaralumno', [CuotaController::class, 'seleccionarAlumno'])->name('cuota.seleccionaralumno');
    Route::get('cuota/edit', function () {
      return view('cuota.edit');
    })->name('cuota.edit');
    Route::resource('cuota', CuotaController::class)->except(['edit', 'show']);
  });
});
