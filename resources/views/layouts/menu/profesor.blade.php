<x-nav-link class="px-3 py-2" :href="route('asistencia.index')" :active="request()->routeIs('asistencia.*')">
  {{ __('Asistencias') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('rutina.index')" :active="request()->routeIs('rutina.*')">
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('cuota.index')" :active="request()->routeIs('cuota.*')">
  {{ __('Cuotas') }}
</x-nav-link>