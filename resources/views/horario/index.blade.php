<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Horario</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class="mb-4 font-bold flex justify-center" />
            <x-denied-message class="mb-4 font-bold flex justify-center" />
            <div class="mb-3">
              {{-- BOTON CREAR horario Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('horario.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{ __('Register Time') }}
                  </x-button>
                </a>

                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('horario.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>
                  {{-- {{ old('filtro') == 'time' ? 'selected' : '' }}value="hora" --}}
                  <option value="hora">
                    Horario
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
                  hora
                </th>

                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($horarios as $horario)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $horario->hora->format('H:i A') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">
                    <a href="{{ route('horario.edit', $horario->id) }}"><button
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">Editar</button></a>
                    <form method="POST" action="{{ route('horario.destroy', $horario->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                        onclick="return confirm('¿Esta seguro de querer borrar este horario?');">Borrar</button>
                    </form>
                  </div>

                </td>
              </tr>
              @empty
              <tr class="text-center">
                <td>
                  @if (strlen($horarios) === 0)
                  <center>No hay horarios creados.</center>
                  @else
                  <center>No se encontró dicho horario. Intente nuevamente</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $horarios->links() }}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>