<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('rutina.index') }}">Gestión Rutina</a> /
      <u>Ejercicios</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white  border-gray-200">
            <x-success-message class=" mt-5" />
            <x-denied-message class=" mt-5" :errors="$errors" />
            <form action="{{ route('rutina.addEjercicios',$rutina->id) }}" method="POST">
              @csrf
              <div class="flex flex-col my-5">
                <x-table>
                  @section('id')
                  id="tabla1"
                  @endsection
                  @section('nombre-columna')
                  <tr>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Ejercicio
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Series
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Repeticiones
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Descanso
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      acciones
                    </th>
                  </tr>
                  @endsection


                  @section('contenido-filas')


                  <tr>
                    <td class="px-3 py-2 whitespace-nowrap text-center font-medium">
                      {{-- {{dd($alum_id)}} --}}
                      <select class="select2_el" id="ejercicio_id" style="width:100%" name="ejercicio" required>
                        <option value="" selected></option>
                        @foreach ($ejercicios as $ejercicio)
                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre_ejercicio }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-center text-sm font-medium">
                      <x-input maxlength="2" value="" ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="series"
                        class="block text-center" type="text" name="series" :value="old('series')" required autofocus />
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-center text-sm font-medium">
                      <x-input id="repeticiones" class="block  text-center " maxlength="2" value=""
                        ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="repeticiones"
                        :value="old('repeticiones')" required />
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-center text-sm font-medium">
                      <x-input id="descanso" class="block  text-center " type="text" name="descanso"
                        :value="old('descanso')" maxlength="2" value="" ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
                    </td>


                    <td class="px-3 py-2 whitespace-nowrap text-center text-sm font-medium">
                      @if (count($ejercicios_rutina) >= 10)
                      <x-button type="submit" title="Solo se admiten 10 ejercicios por rutina"
                        class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold"
                        disabled>
                        {{ __('Add Exercise') }}
                      </x-button>
                      @else
                      <x-button type="submit"
                        class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                        {{ __('Add Exercise') }}
                      </x-button>

                      @endif
                    </td>
                  </tr>
                  @endsection
                </x-table>
              </div>
            </form>
            <div class="text-center font-bold mb-2 underline">Rutina de {{$rutina->alumno_clase->alumno->user->name}}
              {{$rutina->alumno_clase->alumno->user->lastName}} de la clase {{$rutina->alumno_clase->clase->tipo_clase}}
              - @foreach ($rutina->alumno_clase->clase->dias as $dia)
              {{ $dia->dia }}@if (!$loop->last), @endif
              @endforeach -
              {{ $rutina->alumno_clase->clase->horario->hora->format('H:i A')}}</div>
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ejercicio
                          </th>

                          <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Series
                          </th>
                          <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Repeticiones
                          </th>
                          <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descansos
                          </th>
                          <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            acciones
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($ejercicios_rutina as $ejercicio)
                        <tr>
                          <td class="px-6 py-4 w-48 whitespace-nowrap text-center text-sm font-medium">
                            {{$ejercicio->nombre_ejercicio}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            {{$ejercicio->series}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            {{$ejercicio->repeticiones}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            {{$ejercicio->descanso}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <div class="inline-flex" role="group" aria-label="Button group">

                              <form method="POST"
                                action="{{ route('rutina.deleteEjercicios', array($ejercicio->id, $rutina->id))}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                  class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-md focus:shadow-outline hover:bg-red-800"
                                  onclick="return confirm('¿Esta seguro de querer quitar el ejercicio de esta rutina?');">Borrar</button>
                              </form>
                            </div>
                          </td>
                        </tr>
                        @empty

                        @endforelse


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="px-4 py-2  my-3 flex items-center justify-center sm:px-6">
            <a href="{{route('rutina.index')}}">
              <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                {{ __('Back') }}
              </x-button>
            </a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </x-slot>
</x-app-layout>
<script>
  $(document).ready(function() {
    $('.select2_el').select2({
      placeholder: "Seleccionar",
      allowClear: true,
      width: 'resolve',
      language: {

        noResults: function() {

          return "No hay resultado";
        },
        searching: function() {

          return "Buscando..";
        }
      }
    });
  });
</script>