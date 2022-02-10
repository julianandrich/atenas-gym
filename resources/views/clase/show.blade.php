<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('clase.index') }}">Gestión Clase</a> /
      <u>Mostrar
        Clase</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white  border-gray-200">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <h1 class="text-xl leading-6 font-semibold text-gray-900">
                  Clase N°: {{$clase->id}}
                </h1>
              </div>
              <div class="border-t grid grid-cols-1 border-gray-200">
                <dl>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium  text-gray-500">
                      Tipo de Clase
                    <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$clase->tipo_clase}}
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Cupos Disponibles
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{ $clase->cupos_disponibles }}
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Horario
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{ $clase->horario->hora->format('H:i A')}}
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Dias de Entrenamiento
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      @foreach ($clase->dias as $dia)
                      {{ $dia->dia }}@if (!$loop->last), @endif
                      @endforeach
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Tarifa
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      ${{ $clase->tarifa->precio }}
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Alumnos
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                      @foreach ($alumno_clase as $alumno)
                      <li>
                        {{ $alumno->nombre }} {{ $alumno->apellido }}
                      </li>
                      @endforeach

                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Profesores
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                      @foreach ($profesores as $profesor)
                      <li>
                        {{ $profesor->nombre }} {{ $profesor->apellido }}
                      </li>
                      @endforeach
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          <div class="px-4 py-2  flex items-center justify-center sm:px-6">
            <a href="{{url()->previous()}}">
              <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                {{ __('Back') }}
              </x-button>
            </a>
          </div>

        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>