<x-responsive-nav-link class="px-3 py-2" :href="route('alumnos.clase')" :active="request()->routeIs('alumnos.clase')">
  {{ __('Clases') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('alumnos.buscarClase')" :active="request()->routeIs('alumnos.buscarClase')">
  {{ __('Rutinas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('alumnos.cuota')" :active="request()->routeIs('alumnos.cuota')">
  {{ __('Cuotas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('alumnos.asistencia')"
  :active="request()->routeIs('alumnos.asistencia')">
  {{ __('Asistencias') }}
</x-responsive-nav-link>