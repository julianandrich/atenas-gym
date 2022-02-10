<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Clase</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class="mb-4 font-bold flex justify-center" />
            <x-denied-message class="mb-4 font-bold flex justify-center" />
            <div class="mb-3">
              {{-- BOTON CREAR clase Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('clase.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{ __('Register Class') }}
                  </x-button>
                </a>

                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('clase.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>
                  {{-- {{ old('filtro') == 'tipo_clase' ? 'selected' : '' }} value="1" --}}
                  <option value="1">
                    Tipo de Clase
                  </option>
                  <option value="2">
                    Horario
                  </option>
                  <option value="3">
                    Días de Entrenamiento
                  </option>
                  <option value="4">
                    Alumnos
                  </option>
                  <option value="5">
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
                  Cupos Disponibles
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Horario
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Dias de Entrenamiento
                </th>

                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tarifa
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($clases as $clase)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $clase->tipo_clase }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $clase->cupos_disponibles }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $clase->horario->hora->format('H:i A') }}
                </td>

                <td class="px-6 py-4 whitespace-normal text-center">
                  @foreach ($clase->dias as $dia)
                  {{ $dia->dia }}@if (!$loop->last),
                  @endif
                  @endforeach
                </td>

                {{-- AVERIGUAR COMO MOSTRAR COMAS ENTRE DIAS --}}
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  ${{ $clase->tarifa->precio }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">

                    <a href="{{ route('clase.edit', $clase->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-l-md focus:shadow-outline hover:bg-green-800">Editar</button></a>
                    <a href="{{ route('clase.show', $clase->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-800 focus:shadow-outline hover:bg-yellow-600">
                        Mostrar</button></a>
                    <a href="{{ route('clase.alumnos', $clase->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-800 focus:shadow-outline hover:bg-pink-700">
                        Alumnos</button></a>
                    <a href="{{ route('clase.profesores', $clase->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-800 focus:shadow-outline hover:bg-indigo-800">
                        Profesores</button></a>

                    <form method="POST" action="{{ route('clase.destroy', $clase->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-800 rounded-r-md focus:shadow-outline hover:bg-red-800"
                        onclick="return confirm('¿Esta seguro de querer borrar esta clase?');">Borrar</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td>
                  @if (strlen($clases) === 0)
                  <center>No hay clases creadas.</center>
                  @else
                  <center>No se encontró dicho clase. Intente nuevamente</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $clases->links() }}
              </div>
              @endsection

            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>


{{-- <x-dropdown align="right" width="48">
  <x-slot name="trigger">
    <x-button
      class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
      <span class="pr-1 font-semibold flex-1">Acciones</span>
      <span>
        <svg
          class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                                              transition duration-150 ease-in-out"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
      </span>
    </x-button>
  </x-slot>

  <x-slot name="content">
    <x-dropdown-link href="{{ route('clase.edit', $clase->id) }}">
{{ __('Edit') }}
</x-dropdown-link>

<form method="POST" action="{{ route('clase.destroy', $clase->id) }}">
  @csrf
  @method('DELETE')

  <x-dropdown-button class="text-center w-full" :href="route('clase.destroy',$clase->id)"
    onclick="return confirm('¿Esta seguro de querer borrar esta clase?');">
    Borrar
  </x-dropdown-button>
</form>

<x-dropdown-link href="{{ route('clase.alumnos', $clase->id) }}">
  {{ __('Students') }}
</x-dropdown-link>

<x-dropdown-link href="#">
  {{ __('Teachers') }}
</x-dropdown-link>
</x-slot>
</x-dropdown> --}}