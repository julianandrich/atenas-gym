<x-nav-link class="px-3 py-2" :href="route('alumnos.clase')" :active="request()->routeIs('alumnos.clase')">
  {{ __('Clases') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('alumnos.buscarClase')"
  :active="request()->routeIs(['alumnos.buscarClase','alumnos.rutina'])">
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('alumnos.cuota')" :active="request()->routeIs('alumnos.cuota')">
  {{ __('Cuotas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('alumnos.asistencia')" :active="request()->routeIs('alumnos.asistencia')">
  {{ __('Asistencias') }}
</x-nav-link>