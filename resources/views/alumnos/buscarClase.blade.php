<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Buscar Clase</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-denied-message class="mb-4 font-bold flex justify-center" />
            <form action="{{ route('alumnos.rutina') }}" method="get">

              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <x-label for="tipo_clase" :value="__('Clase')" class="font-semibold" />
                  <select id="tipo_clase" name="tipo_clase"
                    class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                    required>
                    <option hidden value="">Seleccione la clase</option>
                    @foreach ($clases as $clase)
                    <option value="{{ $clase->id }}">
                      {{ $clase->tipo_clase }} - {{$clase->horario->hora->format('H:i A')}} - @foreach ($clase->dias as
                      $dia)
                      {{ $dia->dia }}@if (!$loop->last), @endif
                      @endforeach
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="px-4 mt-3 py-2  flex items-center justify-center sm:px-6">
                  <x-button
                    class=" bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{__('Select') }}
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