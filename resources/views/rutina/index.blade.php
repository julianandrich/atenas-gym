<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Rutina</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class="mb-4 font-bold flex justify-center" />
            <x-denied-message class="mb-4 font-bold flex justify-center" />
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR rutina Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('rutina.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{ __('Register Rutine') }}
                  </x-button>
                </a>
                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('rutina.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>
                  {{-- @php if (isset($seleccionado) && $seleccionado=='1' ) { echo 'selected' ; } @endphp --}}
                  <option value="1">
                    Tipo de clase
                  </option>

                  <option value="2">
                    Fecha de emisión
                  </option>

                  <option value="3">
                    Alumno
                  </option>

                  <option value="4">
                    Profesor
                  </option>
                  @endsection
                </x-search>
                {{-- FIN BUSCADOR --}}
              </div>
            </div>
            <x-table>
              @section('nombre-columna')
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tipo de clase
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Fecha de emisión
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Alumno
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Profesor
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
              @endsection

              @section('contenido-filas')
              @forelse ($rutinas as $rutina)
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{$rutina->alumno_clase->clase->tipo_clase}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ \Carbon\Carbon::parse($rutina->fecha_emision)->format('d/m/Y')}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{$rutina->alumno_clase->alumno->user->name}} {{$rutina->alumno_clase->alumno->user->lastName}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{$rutina->profesor->user->name}} {{$rutina->profesor->user->lastName}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">
                    <a href="{{ route('rutina.edit', $rutina->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">
                        Editar</button></a>
                    <a href="{{ route('rutina.show', $rutina->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 focus:shadow-outline hover:bg-yellow-600">
                        Mostrar</button></a>
                    <a href="{{ route('rutina.ejercicios', $rutina->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 focus:shadow-outline hover:bg-blue-600">
                        Ejercicios</button></a>

                    <form method="POST" action="{{route('rutina.destroy',$rutina->id)}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                        onclick="return confirm('¿Está seguro de querer borrar esta rutina?');">Borrar</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td>
                  @if (strlen($rutinas) === 0)
                  <center>No hay rutinas creadas.</center>
                  @else
                  <center>
                    No se encontró dicha rutina. Intente nuevamente.</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $rutinas->links() }}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>