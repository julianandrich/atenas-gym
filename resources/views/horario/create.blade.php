<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('horario.index') }}">Gestión Horario</a> / <u>Crear
        Horario</u>
    </x-breadcrumb>
  </x-slot>

  {{-- <div class="px-4 py-5 bg-white sm:p-6"> --}}
  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <!-- Validation Errors -->
            <x-validation-errors class=" mt-5" :errors="$errors" />
            <x-denied-message class="mb-3" :errors="$errors" />
            <x-success-message class="mb-3" :errors="$errors" />

            <form action="{{ route('horario.store') }}" method="POST">
              @csrf
              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">
                <div class="grid grid-cols-1 gap-6">
                  <div class="col-span-1">
                    <x-label for="hora" :value="__('Horario')" class="font-semibold" />
                    <x-input id="hora" class="block w-full px-4 py-2 mt-2" type="time" name="hora" :value="old('hora')"
                      required autofocus />
                  </div>
                </div>
              </div>

              <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                <a href="{{ route('horario.index') }}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                <x-button
                  class="ml-3 bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                  {{ __('Register Time') }}
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>