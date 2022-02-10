{{-- <x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><u>Dashboard</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="sm:px-6 h-full flex justify-center items-center">
      <div class="w-auto">
        <div class="bg-gray-200 overflow-visible">
          <div class="text-center text-5xl font-bold  bg-gray-200 text-black mx-auto w-auto h-auto ">
            Le damos la bienvenida, {{ Auth::user()->name }} 😄
</div>
</div>
</div>
</div>
</x-slot>
</x-app-layout> --}}

<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><u>Dashboard</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="xl:bg-contain xl:bg-center h-full flex flex-col sm:justify-center items-center sm:pt-0">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
          <div class="text-center text-5xl p-6 bg-white border-b border-gray-200">
            Le damos la bienvenida, {{ Auth::user()->name }} 😄
          </div>
        </div>
      </div>
    </div>
  </x-slot>

</x-app-layout>