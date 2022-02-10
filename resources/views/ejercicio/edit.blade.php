<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('ejercicio.index') }}">Gestión Ejercicio</a> /
      <u>Editar
        Ejercicio</u>
    </x-breadcrumb>
  </x-slot>

  {{-- <div class="px-4 py-5 bg-white sm:p-6"> --}}
  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <!-- Validation Errors -->
            <x-validation-errors class="mb-3" :errors="$errors" />
            <x-success-message class="mb-3" :errors="$errors" />
            <x-denied-message class=" mt-5" :errors="$errors" />
        
            <form action="{{ route('ejercicio.update', $ejercicio->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">
                <div class="grid grid-cols-1 gap-4">

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="tipo_clase" :value="__('Tipo de Clase')" class="font-semibold" />

                    <select name="tipo_clase[]" id="tipo_clase" multiple="multiple"
                      class="select2_el w-full block px-4 py-2 rounded-md mt-2 focus:border-red-300 focus:ring-red-200">
                      @foreach ($clases as $clase)
                      <option value="{{ $clase->id }}" @if(in_array($clase->id, $clase_ejercicio)) selected @endif>
                        {{ $clase->tipo_clase }}
                      </option>
                      @endforeach
                    </select>
                  </div>



                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="nombre_ejercicio" :value="__('Ejercicio')" class="font-semibold" />
                    <x-input id="nombre_ejercicio" class="block w-full px-4 py-2 mt-2" type="text"
                      name="nombre_ejercicio" value="{{ old('nombre_ejercicio', $ejercicio->nombre_ejercicio) }}"
                      required autofocus />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="descripcion" :value="__('Descripción')" class="font-semibold" />
                    <textarea id="descripcion" name="descripcion" class="w-full resize-none
                                           border-gray-300 block
                                            focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                      rows="3" cols="50" minlength="10" required
                      autofocus>{{ old('descripcion', $ejercicio->descripcion) }}</textarea>
                  </div>
                </div>
                <div class="px-4 py-2 mt-3 flex items-center justify-between sm:px-6">
                  <a href="{{ route('ejercicio.index') }}">
                    <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                      {{ __('Back') }}
                    </x-button>
                  </a>

                  <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                    {{ __('Edit Exercise') }}
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

<script>
  $(document).ready(function() {
        $('.select2_el').select2({
            placeholder: "Seleccionar",
            allowClear: true,
            width: 'resolve',
            language: {

                noResults: function() {

                    return "No hay resultado";
                },
                searching: function() {

                    return "Buscando..";
                }
            }
        });
    });
</script>