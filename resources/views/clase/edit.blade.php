<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('clase.index')}}">Gestión Clase</a> / <u>Editar
        Clase</u>
    </x-breadcrumb>
  </x-slot>


  <x-slot name="slot">
    <div class="py-4 lg:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-4 bg-white border-b border-gray-200">
            <!-- Validation Errors -->
            <x-validation-errors class=" mt-5" :errors="$errors" />
            <x-success-message class="mb-4 font-bold flex justify-center" />
            <x-denied-message class="mb-4 font-bold flex justify-center" />

            <form method="POST" action="{{route('clase.update',$clase->id)}}">
              @csrf
              @method('PUT')
              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">

                <div class="grid grid-cols-2 gap-4">
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="tipo_clase" :value="__('Tipo de Clase')" class="font-semibold" />
                    <x-input id="tipo_clase" class="block w-full px-4 py-2 mt-2" type="text" name="tipo_clase"
                      value="{{old('tipo_clase',$clase->tipo_clase)}}" required autofocus />
                  </div>

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="horarios" :value="__('Horario')" class="font-semibold" />

                    <select id="horarios" class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md 
                      shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300" name="horario_id" required>
                      <option hidden value="{{$clase->horario->id}}">
                        {{ old('horario_id', $clase->horario->hora->format('H:i A')) }}
                      </option>
                      @foreach ($horarios as $horario)
                      <option value="{{$horario->id}}" {{$clase->horario->id == $horario->id ? 'selected' : ''}}>
                        {{$horario->hora->format('H:i A')}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mt-3">
                  <div class="inline grid-cols-6 space-x-2 gap-6 ">
                    <x-label for="dia" :value="__('Días de la semana')" class="text-xl px-2 mb-2 font-semibold" />


                    @foreach ($dias as $dia)
                    <div class="inline-flex items-center">
                      <input id="dia" type="checkbox" class="rounded border-gray-300 text-red-900 
                      shadow-sm focus:border-red-300 focus:ring
                      focus:ring-red-200 focus:ring-opacity-50" name="dias[]" value="{{$dia->id}}"
                        @if(in_array($dia->id, $clase_dias)) checked @endif>

                      <span class="ml-2 text-sm text-gray-600">{{ $dia->dia }}</span>
                    </div>
                    @endforeach
                  </div>


                </div>{{--/div dias de la semana--}}
              </div>
              <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                <a href="{{route('clase.index')}}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                  {{ __('Edit Class') }}
                </x-button>
              </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </x-slot>
</x-app-layout>