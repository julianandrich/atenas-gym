<form action="@yield('action')" method="GET" class="max-w-4xl space-x-3">

  <div class="flex flex-auto items-center space-x-2 pr-2">
    <div class="w-max">
      <select name="filtro" id="filtro"
        class="w-28 sm:w-48 block text-gray-700 py-1 px-3 mt-1 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-800 focus:border-red-800">
        @yield('opciones')
      </select>
    </div>

    <x-input type="text" id="search" name="search" value="{{Request::input ('search')}}"
      class="mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent xs:w-1/3"
      autocomplete="off" />

    <button
      class="bg-red-700 text-white rounded-full p-2 hover:bg-red-500 focus:outline-none w-9 h-9 flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
          clip-rule="evenodd" />
      </svg>
    </button>
  </div>
</form>



{{-- 
  
  Secciones a tener en cuenta al llamar al componente busqueda:
  - action
  - opciones

  
          OPCIONES PARA SELECT

          <option value="">
            Filtrar por...
          </option>

          <option value="opc1">
            opc1
          </option> 
--}}