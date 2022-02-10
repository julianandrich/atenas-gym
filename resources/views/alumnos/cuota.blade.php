<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Consulta Cuota</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="flex flex-col sm:flex-row mb-3 justify-end items-center">

              {{-- BUSCADOR --}}
              <x-search>
                @section('action')
                {{ route('usuario.index') }}
                @endsection

                @section('opciones')
                <option hidden value="">
                  Filtrar por...
                </option>
                {{-- @php if (isset($seleccionado) && $seleccionado=='1' ) { echo 'selected' ; } @endphp --}}
                <option value="1">
                  Usuario
                </option>

                <option value="2">
                  Nombre y Apellido
                </option>

                @endsection
              </x-search>
              {{-- FIN BUSCADOR --}}
            </div>
            <x-table>
              @section('nombre-columna')
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Fecha
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Fecha de Caducidad
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Días
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Importe
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/01/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/02/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  3
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  $1200
                </td>

              </tr>
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/02/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/03/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  3
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  $1200
                </td>

              </tr>
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/03/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/04/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  3
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  $1200
                </td>

              </tr>
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/04/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  04/05/21
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  3
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  $1200
                </td>

              </tr>
              @endsection

            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>