<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('alumnos.buscarClase')}}">Buscar Clase</a> / <u>Consulta
        Rutina</u> </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-400">
            <div class="flex flex-col">
              <div class="flex-1 my-3" id="print-container">

                <div class="text-center font-bold mb-2 underline">Rutina de
                  {{$rutina->alumno_clase->alumno->user->name}}
                  {{$rutina->alumno_clase->alumno->user->lastName}} de la clase
                  {{$rutina->alumno_clase->clase->tipo_clase}}
                  - @foreach ($rutina->alumno_clase->clase->dias as $dia)
                  {{ $dia->dia }}@if (!$loop->last), @endif
                  @endforeach -
                  {{ $rutina->alumno_clase->clase->horario->hora->format('H:i A')}}
                </div>


                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border border-gray-400 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-400">
                          <thead class="bg-gray-100">
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
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-gray-400 divide-y divide-gray-400">
                            @forelse ($ejercicios_rutina as $ejercicio)
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
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
                            </tr>
                            @empty
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                Por el momento esta rutina no tiene ejercicios asignados.
                              </td>
                            </tr>
                            @endforelse

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 mt-3 py-2  flex items-center justify-between sm:px-6">
                <a href="{{ url()->previous()}}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                @if (count($ejercicios_rutina) == 0)
                <x-button disabled title="La rutina debe tener ejercicios asignados para poder imprimirla"
                  class="ml-3 bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                  {{ __('Print Routine') }}
                </x-button>
                @else
                <x-button onclick="print();"
                  class="ml-3 bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                  {{ __('Print Routine') }}
                </x-button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
  @section('scripts')
  <script src="print.js"></script>
  <script>
    function print() {
      printJS({
      printable: 'print-container',
      type: 'html',
      maxWidth: '800px',
      targetStyles: ['*'],
      })
      }
  </script>
  @endsection
</x-app-layout>