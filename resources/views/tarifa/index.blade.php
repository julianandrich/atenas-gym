<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Tarifa</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR tarifa Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <div class="flex-auto justify-center ml-4">
                  @if (count($tarifas) == 5)
                  <x-button title="Solo se admiten 5 tarifas" class="bg-blue-400 text-blue-800 hover:bg-blue-700
                    hover:text-white border-blue-800 font-bold opacity-50 cursor-not-allowed">
                    {{ __('Register Fee') }}
                  </x-button>
                  @else
                  <a href="{{ route('tarifa.create') }}">
                    <x-button type="button" class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white
                      border-blue-800 font-bold">
                      {{ __('Register Fee') }}
                    </x-button>
                  </a>
                  @endif
                </div>
              </div>
            </div>

            <x-table>
              @section('nombre-columna')
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Cantidad de Dias
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Precio
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($tarifas as $tarifa)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $tarifa->cantidad_dias }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $tarifa->precio }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">
                    <a href="{{ route('tarifa.edit', $tarifa->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">Editar</button></a>

                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                      onclick="return confirm('¿Esta seguro de querer borrar esta tarifa?');">Borrar</button>

                  </div>

                </td>
              </tr>
              @empty
              <tr>
                <td>
                  @if (strlen($tarifas) === 0)
                  <center>No hay tarifas creadas.</center>
                  @else
                  <center>
                    No se encontró dicha tarifa. Intente nuevamente.</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $tarifas->links() }}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>