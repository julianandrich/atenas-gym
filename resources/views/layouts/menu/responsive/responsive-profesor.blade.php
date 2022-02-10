<x-responsive-nav-link class="px-3 py-2" :href="route('asistencia.index')" :active="request()->routeIs('asistencia.*')">
  {{ __('Asistencias') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('rutina.index')" :active="request()->routeIs('rutina.*')">
  {{ __('Rutinas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('cuota.index')" :active="request()->routeIs('cuota.*')">
  {{ __('Cuotas') }}
</x-responsive-nav-link>