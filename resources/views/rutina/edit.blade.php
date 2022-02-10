<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('rutina.index') }}">Gestión Rutina</a> / <u>Editar
        Rutina</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class="mb-3" :errors="$errors" />
            <x-denied-message class=" mt-5" :errors="$errors" />
            <form method="post" action="{{ route('rutina.update', $rutina->id) }}">
              @csrf
              @method('PUT')
              <div class="flex flex-col">
                <div class="mb-4 flex flex-col p-3 space-y-2">
                  <div id="profesor" class="flex space-x-2  sm:col-span-2">
                    <x-label value="{{ __('Profesor:') }}" class="block text-md font-medium text-gray-700" />

                    <x-label value="{{ Auth::user()->name }} {{ Auth::user()->lastName }}"
                      class="block text-md font-bold text-gray-700" />
                  </div>


                  <div class="flex space-x-2  sm:col-span-2">
                    <x-label value="{{ __('Student:') }}" class="block text-md font-medium text-gray-700" />

                    <select class="select2_el" id="alumno_id" style="width:100%" name="alumno" required>
                      <option value="" selected></option>
                      @foreach ($alumnos as $alumno)
                      <option value="{{ $alumno->id }}"
                        {{ $rutina->alumno_clase->alumno->user_id == $alumno->id ? 'selected' : '' }}>
                        {{ $alumno->name }} {{ $alumno->lastName }}</option>
                      @endforeach
                    </select>
                  </div>


                  <div id="clase" class=" hidden space-x-6  sm:col-span-2">
                    <x-label value="{{ __('Clase:') }}" class="block text-md font-medium text-gray-700" />
                    <select class="select2_el " style="width:100%" id="clase_id" name="clase" required>
                      <option value="" selected></option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="px-4 py-2  mt-3 flex items-center justify-between sm:px-6">
                <a href="{{ route('rutina.index') }}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>

                </a>
                <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                  {{ __('Edit Rutine') }}
                </x-button>
            </form>
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
<script>
  $(document).ready(function() {

    $('#alumno_id').change(function() {
        var $clase = $('#clase_id');
        $.ajax({
            url: "{{ route('findClase') }}",
            data: {
              alumno_id: $(this).val()
            },
            success: function(data) {
              console.log(data);
              $clase.html('<option value="" selected>Seleccionar</option>');
              $.each(data, function(id, value) {
                  $clase.append('<option value="' + value.id + '">' + value.tipo_clase + ' - ' + value
                    .hora + ' - ' + value.dias + '</option>');
                    console.log(id.id);
                  });
              }
            }); 
            $('#clase_id').val(""); 
            $('#clase').removeClass('hidden');
            $('#clase').addClass('flex');
        });
    });
</script>