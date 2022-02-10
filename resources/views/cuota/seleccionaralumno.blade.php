<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('cuota.index') }}">Gestión Cuota</a> /
      <u>Seleccionar Alumno</u>
    </x-breadcrumb>
  </x-slot>

  {{-- <div class="px-4 py-5 bg-white sm:p-6"> --}}
  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-gray-200">
            <!-- Validation Errors -->
            <x-validation-errors class=" mt-5" :errors="$errors" />

            <form action="{{ route('cuota.create') }}" method="GET">
              @csrf
              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">

                <div class="grid grid-cols-1 gap-4">

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="userName" :value="__('Alumno')" class="font-semibold" />
                    <select name="userName"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300">
                      <option hidden value="">Seleccione un alumno</option>
                      <option value="value1"></option>
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="tipo_clase" :value="__('Tipo de Clase')" class="font-semibold" />
                    <select name="tipo_clase"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300">
                      <option hidden value="">Seleccione la clase</option>
                      <option value="value1"></option>
                    </select>
                  </div>
                </div>
                <div class="px-4 mt-3 py-2  flex items-center justify-between sm:px-6">
                  <a href="{{ route('cuota.index') }}">
                    <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                      {{ __('Back') }}
                    </x-button>
                  </a>
                  <x-button
                    class="ml-3 bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{ __('Select student') }}
                  </x-button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>