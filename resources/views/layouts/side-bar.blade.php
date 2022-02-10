{{-- <div id="atenas-sidebar"
  class="bg-gray-400 h-16 w-1/5 z-10 fixed bottom-0 mt-12 border-r border-red-800 md:relative md:h-full md:w-52">
  <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between"> --}}

    @switch(Auth::user()->role_id)
    @case(1)
    @include('layouts.menu.alumno')
    @break
    @case(2)
    @include('layouts.menu.profesor')
    @break
    @case(3)
    @include('layouts.menu.administrador')
    @break
    @default
    @break
    @endswitch