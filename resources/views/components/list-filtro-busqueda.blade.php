{{-- TENER EN CUENTA YIELD OPCION --}}

<li class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9" id="listbox-option-0" role="option">
  <div class="flex items-center">

    <span class="font-normal ml-3 block truncate">
      @yield('opcion')
    </span>

  </div>
  <span class="text-red-800 absolute inset-y-0 right-0 flex items-center pr-4">

    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd"
        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
        clip-rule="evenodd" />
    </svg>
  </span>
</li>