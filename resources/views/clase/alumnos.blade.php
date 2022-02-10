<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('clase.index')}}">Gestión Clase</a> /
      {{$clase->tipo_clase}} -
      @foreach ($clase->dias as $dia)
      {{ $dia->dia }}@if (!$loop->last), @endif
      @endforeach
      - {{ $clase->horario->hora->format('H:i A')}}
      / <u>Alumnos</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class=" mt-5" />
            <x-denied-message class=" mt-5" :errors="$errors" />
            <div class="flex flex-col">
              {{-- {{$clase->id}} --}}
              <form action="{{route('clase.addAlumnos', $clase->id)}}" method="post">
                @csrf
                <div class="mb-4 flex space-x-2">
                  <x-label value="{{ __('Student:') }}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el" id="alumno_id" style="width:100%" name="alumno" required>
                    <option value="" selected></option>
                    @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->name }} {{ $alumno->lastName }} - DNI:
                      {{ $alumno->dni}}</option>
                    @endforeach
                  </select>


                  @if ($cupos[0] = 0) <x-button type="submit" title="Solo se admiten 10 alumnos por clase"
                    class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold"
                    disabled>
                    {{ __('Add Student') }}
                  </x-button>
                  @else
                  <x-button type="submit"
                    class="bg-blue-400 text-blue-800 hover:bg-blue-700 hover:text-white border-blue-800 font-bold">
                    {{ __('Add Student') }}
                  </x-button>

                  @endif

                </div>
              </form>


              <x-table>
                @section('nombre-columna')
                <tr>
                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Alumnos
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    dni
                  </th>

                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    acciones
                  </th>
                </tr>
                @endsection


                @section('contenido-filas')

                @forelse ($alumno_clase as $alumno)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    {{$alumno->nombre}} {{$alumno->apellido}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    {{$alumno->dni}}
                  </td>


                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <div class="inline-flex" role="group" aria-label="Button group">

                      <form method="POST" action="{{ route('clase.deleteAlumnos', array($alumno->id, $clase->id)) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                          class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-md focus:shadow-outline hover:bg-red-800"
                          onclick="return confirm('¿Esta seguro de querer quitar el alumno de esta clase?');">Borrar</button>
                      </form>
                    </div>
                  </td>

                </tr>
                @empty
                <tr>
                  <td>
                    No se encontraron alumnos en esta clase.
                  </td>
                </tr>
                @endforelse

                @endsection
              </x-table>

            </div>
            <div class="px-4 py-2  mt-3 flex items-center justify-center sm:px-6">
              <a href="{{route('clase.index')}}">
                <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                  {{ __('Back') }}
                </x-button>
              </a>
            </div>
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