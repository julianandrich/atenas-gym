<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Usuario</u></x-breadcrumb>
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
              {{-- BOTON CREAR USUARIO Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('usuario.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{ __('Register User') }}
                  </x-button>
                </a>
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
            </div>
            <x-table>
              @section('nombre-columna')
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  usuario
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  nombre
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  apellido
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  email
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  rol
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($usuarios as $usuario)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $usuario->userName }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $usuario->name }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $usuario->lastName }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $usuario->email }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $usuario->role->nombre_rol }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">

                    <a href="{{ route('usuario.edit', $usuario->id) }}"><button class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline 
                      hover:bg-green-800">Editar</button></a>
                    <a href="{{ route('usuario.show', $usuario->id) }}"><button class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 focus:shadow-outline 
                      hover:bg-yellow-600">Mostrar</button></a>

                    <form method="POST" action="{{ route('usuario.destroy', $usuario->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                        onclick="return confirm('¿Esta seguro de querer borrar este usuario?');">Borrar</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td class="text-center">
                  No se encontró dicho usuario. Intente nuevamente.
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $usuarios->links() }}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>