<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow  overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200" @yield("id")>
          <thead class="bg-gray-100">
            @yield('nombre-columna')
          </thead>
          <tbody @yield('tbodyID') class="bg-white divide-y divide-red-100">
            @yield('contenido-filas')
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @yield('paginacion')
</div>

{{-- 

  NOMBRE-COLUMNA
  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
    Name
  </th>

  CONTENIDO-FILAS
  <tr>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900">"CONTENIDO</div>
    </td>
  
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
      <a href="{{route('usuario.edit',$usuario->id)}}">
<x-button class="text-white bg-green-800 hover:bg-green-700">BOTON</x-button>
</a>
</td>
</tr>


PAGINACION

<div class="mt-4">
  {{$usuarios->links()}}
</div>

--}}