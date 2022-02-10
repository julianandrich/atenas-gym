<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('asistencia.index') }}">Gestión Asistencia</a> /
      <u>Mostrar Asistencia</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-gray-200">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <ul class="list-disc list-inside bold">
                  <li>Fecha: Ejemplo</li>
                  <li>Horario: Ejemplo</li>
                  <li>Tipo de Clase: Ejemplo</li>
                  <li>Profesor: Ejemplo</li>
                </ul>
              </div>
              <div class="border-t grid grid-cols-1 justify-between border-gray-200">
                <dl>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 1
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        checked disabled>
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 2
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        checked disabled>
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 3
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 4
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        checked disabled>
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 5
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        checked disabled>
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 6
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        checked disabled>
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 7
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        checked disabled>
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm text-center font-medium text-gray-500">
                      Alumno 8
                    </dt>
                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <input type="checkbox" name="alumno1" id="alumno1"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          <div class="px-4 py-2 my-3 flex items-center justify-center sm:px-6">
            <a href="{{ url()->previous() }}">
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