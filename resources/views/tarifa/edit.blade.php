<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('tarifa.index') }}">Gestión Tarifa</a> / <u>Editar
        Tarifa</u>
    </x-breadcrumb>
  </x-slot>


  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <!-- Validation Errors -->
            <x-validation-errors class=" mt-5" :errors="$errors" />

            <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">
              <div class="grid grid-cols-2 gap-4">
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <x-label for="cantidad_dias" :value="__('Cantidad de Dias')" class="font-semibold" />
                  <x-input id="cantidad_dias" class="block w-full px-4 py-2 mt-2" type="text" name="cantidad_dias"
                    value="{{ old('cantidad_dias', $tarifa->cantidad_dias) }}" required autofocus />
                </div>
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <x-label for="precio" :value="__('Precio')" class="font-semibold" />
                  <x-input id="precio" class="block w-full px-4 py-2 mt-2" type="text" name="precio"
                    value="{{ old('precio', $tarifa->precio) }}" required autofocus />
                </div>

              </div>
              <div class="px-4 py-2 mt-3 flex items-center justify-between sm:px-6">
                <a href="{{ route('tarifa.index') }}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                  {{ __('Edit Fee') }}
                </x-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>

</x-app-layout>