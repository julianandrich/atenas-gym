<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Perfil</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-4 bg-white border-b border-gray-200">
            <x-validation-errors class="mb-4" :errors="$errors" />
            <x-success-message class="mb-4" :errors="$errors" />
            <form method="POST" action="{{route('perfil.update')}}" autocomplete="off">
              @method('PUT')
              @csrf
              <div class="grid grid-col-1 gap-6">
                <div class="grid grid-row-1 gap-6 my-5">
                  <!-- Email -->
                  <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block w-full mt-1" type="email" name="email"
                      value="{{old('email', auth()->user()->email)}}" autofocus />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-row-2 gap-6">
                  <!-- Teléfono -->
                  <div>
                    <x-label for="phone" :value="__('Phone')" />
                    <x-input id="phone" class="block w-full mt-1" type="text" name="phone"
                      value="{{old('phone', auth()->user()->phone)}}" />
                  </div>
                  <!-- Teléfono Emergencia -->
                  <div>
                    <x-label for="emergency_number" :value="__('Teléfono de emergencia')" />
                    <x-input id="emergency_number" class="block w-full mt-1" type="text" name="emergency_number"
                      value="{{old('emergency_number', auth()->user()->emergency_number)}}" />
                  </div>

                </div>

                <div class="grid grid-row-2 gap-6">
                  <!-- Password -->
                  <div>
                    <x-label for="password" :value="__('New Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                      autocomplete="new-password" />
                  </div>

                  <!-- Confirm Password -->
                  <div>
                    <x-label for="password_confirmation" :value="__('Confirm New Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                      name="password_confirmation" />
                  </div>
                </div>
              </div>
              <div class="px-4 py-2 my-3 grid items-center justify-center sm:px-6">
                <x-button class=" bg-green-900 hover:bg-green-700">
                  {{ __('Edit Profile') }}
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>




















{{-- 
<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Perfil</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
      <div class="md:flex md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <!-- Validation Errors -->
          {{-- <x-validation-errors class=" mt-5" :errors="$errors" /> 

          <form method="POST" action="{{route('perfil.update',auth()->id())}}">
@csrf
@method('PUT')
<div class="shadow overflow-hidden sm:rounded-md">
  <div class="px-4 py-5 bg-white sm:p-6">
    <div class="grid grid-cols-2 gap-4">
      <!-- Email -->
      {{-- col-span-6 sm:col-span-6 lg:col-span-2 
                  <div class="col-span-6 md:col-span-2">
                    <x-label for="email" :value="__('Email')" class="font-semibold" />
                    <x-input id="email" class="block w-full mt-1" type="email" name="email"
                      value="{{old('email', auth()->user()->email)}}" />
    </div>
    <!-- Teléfono -->
    <div>
      <x-label for="phone" :value="__('Phone')" class="font-semibold" />
      <x-input id="phone" class="block w-full mt-1" type="text" name="phone"
        value="{{old('phone', auth()->user()->phone)}}" />
    </div>
    <!-- Teléfono Emergencia -->
    <div>
      <x-label for="emergency_number" :value="__('Teléfono de emergencia')" class="font-semibold" />
      <x-input id="emergency_number" class="block w-full mt-1" type="text" name="emergency_number"
        value="{{old('emergency_number', auth()->user()->emergency_number)}}" />
    </div>
    <!-- Password -->
    <div>
      <x-label for="password" :value="__('Password')" class="font-semibold" />
      <x-input id="password" class="block w-full mt-1" type="password" name="password" placeholder="Nueva Contraseña"
        autocomplete="new-password" />
    </div>
    <!-- Confirm Password -->
    <div>
      <x-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold" />
      <x-input id="password_confirmation" class="block w-full mt-1" type="password"
        placeholder="Repita su nueva contraseña" name="password_confirmation" />
    </div>
  </div>
  <!-- Botón Editar -->
  <div class="px-4 py-2  flex items-center justify-center sm:px-6">
    <x-button class="mt-3 bg-green-900 hover:bg-green-700">
      {{ __('Edit Profile') }}
    </x-button>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
</x-slot>
</x-app-layout> --}}