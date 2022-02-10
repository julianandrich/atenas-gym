<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('usuario.index') }}">Gestión Usuario</a> /
      <u>Mostrar
        Usuario</u>
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
                  Usuario: {{$usuario->userName}}
                </h1>
              </div>
              <div class="border-t grid grid-cols-1 border-gray-200">
                <dl>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium  text-gray-500">
                      Nombre y Apellido
                    </dt>
                    <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->name}} {{$usuario->lastName}}
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Email
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->email}}
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Rol
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->role->nombre_rol}}
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      DNI
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->dni}}
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Edad
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->age}} años
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Género
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->gender}}
                    </dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Teléfono
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->phone}}
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Teléfono de Emergencia
                    </dt>
                    <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      {{$usuario->emergency_number}}
                    </dd>
                  </div>
                  <div
                    class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 items-center sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Historial Médico
                    </dt>
                    <dd class="mt-1 text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                      <ul class="list-inside list-disc inline">
                        @if ($usuario->eRespiratorias === 1)
                        <li><b><u>E. Respiratorias:</u></b> <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>E. Respiratorias:</u></b>
                          @endif

                          @if ($usuario->eCardiacas === 1)
                        <li><b><u>E. Cardiacas:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>E. Cardiacas:</u></b>
                          @endif

                          @if ($usuario->eRenal === 1)
                        <li><b><u>E. Renales:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>E. Renales:</u></b>
                          @endif

                          @if ($usuario->convulsiones === 1)
                        <li><b><u>Convulsiones:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>Convulsiones:</u></b>
                          @endif

                          @if ($usuario->epilepsia === 1)
                        <li><b><u>Epilepsia:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>Epilepsia:</u></b>
                          @endif

                          @if ($usuario->diabetes === 1)
                        <li><b><u>Diabetes:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>Diabetes:</u></b>
                          @endif

                          @if ($usuario->alergia === 1)
                        <li><b><u>Alergias:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>Alergias:</u></b>
                          @endif

                          @if ($usuario->asma === 1)
                        <li><b><u>Asma:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>Asma:</u></b>
                          @endif

                          @if ($usuario->medicacion === 1)
                        <li><b><u>Medicación:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg> </li>
                        @else
                        <li><b><u>Medicación:</u></b>
                          @endif
                      </ul>
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          <div class="px-4 py-2  flex items-center justify-center sm:px-6">
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