<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('usuario.index') }}">Gestión Usuario</a> /
      <u>Editar
        Usuario</u>
    </x-breadcrumb>
  </x-slot>

  {{-- <div class="px-4 py-5 bg-white sm:p-6"> --}}
  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <!-- Validation Errors -->
            <x-validation-errors class="mb-3" :errors="$errors" />
            <x-success-message class="mb-3" :errors="$errors" />
            <x-denied-message class=" mt-5" :errors="$errors" />
            <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">

                <div class="grid grid-cols-6 gap-4">
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="userName" :value="__('User Name')" class="font-semibold" />
                    <x-input id="userName" class="block w-full px-4 py-2 mt-2" type="text" name="userName"
                      value="{{ old('userName', $usuario->userName) }}" required autofocus />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="email" :value="__('Email')" class="font-semibold" />
                    <x-input id="email" class="block w-full px-4 py-2 mt-2" type="email" name="email"
                      value="{{ old('email', $usuario->email) }}" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="dni" :value="__('DNI')" class="font-semibold" />
                    <x-input id="dni" class="block w-full px-4 py-2 mt-2" type="text" name="dni"
                      value="{{ old('dni', $usuario->dni) }}" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="name" :value="__('Name')" class="font-semibold" />
                    <x-input id="name" class="block w-full px-4 py-2 mt-2" type="text" name="name"
                      value="{{ old('name', $usuario->name) }}" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="lastName" :value="__('Last Name')" class="font-semibold" />
                    <x-input id="lastName" class="block w-full px-4 py-2 mt-2" type="text" name="lastName"
                      value="{{ old('lastName', $usuario->lastName) }}" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="gender" :value="__('gender')" class="font-semibold" />
                    <select id="gender"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                      name="gender" required>
                      <option value="Masculino" {{ $usuario->gender === 'Masculino' ? 'selected' : '' }}>
                        Masculino
                      </option>
                      <option value="Femenino" {{ $usuario->gender === 'Femenino' ? 'selected' : '' }}>
                        Femenino
                      </option>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="age" :value="__('Age')" class="font-semibold" />
                    <x-input id="age" class="block w-full px-4 py-2 mt-2" type="text" maxlength="2" name="age"
                      value="{{ old('age', $usuario->age) }}" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="phone" :value="__('Phone')" class="font-semibold" />
                    <x-input id="phone" class="block w-full px-4 py-2 mt-2" type="text" name="phone"
                      value="{{ old('phone', $usuario->phone) }}" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="emergency_number" :value="__('Emergency Number')" class="font-semibold" />
                    <x-input id="emergency_number" class="block w-full px-4 py-2 mt-2" type="text"
                      name="emergency_number" value="{{ old('emergency_number', $usuario->emergency_number) }}"
                      required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="roles" :value="__('Role')" class="font-semibold" />

                    <select id="roles"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                      name="role_id" required>
                      <option hidden value="">
                        {{ old('role_id', $usuario->role->nombre_rol) }}
                      </option>
                      @foreach ($roles as $role)
                      <option value="{{ $role->id }}" {{ $usuario->role->id == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre_rol }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="my-3">
                  <div class="inline grid-cols-6 space-x-2 gap-6 ">

                    <x-label for="historial_medico" :value="__('Historial Médico')" class="text-xl font-semibold" />
                    <label for="eRespiratorias" class="inline-flex items-center">
                      <input type="hidden" name="eRespiratorias" value="0">
                      <input id="eRespiratorias" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="eRespiratorias" value="1"
                        {{ $usuario->eRespiratorias || old('eRespiratorias', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('E. Respiratorias') }}</span>
                    </label>

                    <label for="eCardiacas" class="inline-flex items-center">
                      <input type="hidden" name="eCardiacas" value="0">
                      <input id="eCardiacas" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="eCardiacas" value="1"
                        {{ $usuario->eCardiacas || old('eCardiacas', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('E. Cardíacas') }}</span>
                    </label>

                    <label for="eRenal" class="inline-flex items-center">
                      <input type="hidden" name="eRenal" value="0">
                      <input id="eRenal" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="eRenal" value="1" {{ $usuario->eRenal || old('eRenal', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('E. Renales') }}</span>
                    </label>

                    <label for="convulsiones" class="inline-flex items-center">
                      <input type="hidden" name="convulsiones" value="0">
                      <input id="convulsiones" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="convulsiones" value="1"
                        {{ $usuario->convulsiones || old('convulsiones', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('Convulsiones') }}</span>
                    </label>

                    <label for="epilepsia" class="inline-flex items-center">
                      <input type="hidden" name="epilepsia" value="0">
                      <input id="epilepsia" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="epilepsia" value="1"
                        {{ $usuario->epilepsia || old('epilepsia', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('Epilepsia') }}</span>
                    </label>

                    <label for="diabetes" class="inline-flex items-center">
                      <input type="hidden" name="diabetes" value="0">
                      <input id="diabetes" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="diabetes" value="1" {{ $usuario->diabetes || old('diabetes', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('Diabetes') }}</span>
                    </label>

                    <label for="asma" class="inline-flex items-center">
                      <input type="hidden" name="asma" value="0">
                      <input id="asma" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="asma" value="1" {{ $usuario->asma || old('asma', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('Asma') }}</span>
                    </label>

                    <label for="alergia" class="inline-flex items-center">
                      <input type="hidden" name="alergia" value="0">
                      <input id="alergia" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="alergia" value="1" {{ $usuario->alergia || old('alergia', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('Alergias') }}</span>
                    </label>

                    <label for="medicacion" class="inline-flex items-center">
                      <input type="hidden" name="medicacion" value="0">
                      <input id="medicacion" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="medicacion" value="1"
                        {{ $usuario->medicacion || old('medicacion', 0) === 1 ? 'checked' : '' }}>
                      <span class="ml-2 text-sm text-gray-600">{{ __('Medicación') }}</span>
                    </label>
                  </div>{{-- /div historial medico --}}
                </div>
                <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                  <a href="{{ url()->previous() }}">
                    <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                      {{ __('Back') }}
                    </x-button>
                  </a>

                  <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                    {{ __('Edit User') }}
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