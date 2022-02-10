<!-- component -->
<style>
  .dropdown:hover>.dropdown-content {
    display: block;
  }
</style>

<div class="dropdown inline-block relative">
  <x-button
    class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
    <span class="pr-1 font-semibold flex-1">Acciones</span>
    <span>
      <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                  transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20">
        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
      </svg>
    </span>
  </x-button>

  <ul class="border-2 border-red-700 rounded-md dropdown-content absolute hidden text-gray-900 pt-1 z-50">
    @yield('editar')
    @yield('borrar')
    @yield('mostrar')
    @yield('alumnos')
    @yield('profesores')
  </ul>
</div>


{{-- 
  Opcion 1
  <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="@">Opcion 1</a></li>

  Opcion 2
  <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Opcion 2</a></li>

  
  Opcion 3 + opcion con otro nivel
  <li class="dropdown">
    <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Option 3 🠞</a>
    <ul class="dropdown-content absolute hidden text-gray-700 pl-5 ml-24 -mt-10">
      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Option 3-1</a>
      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Option 3-2</a>
    </ul>
  </li>
  
  Opcion 4
  <li><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Option 4</a></li>

  --}}