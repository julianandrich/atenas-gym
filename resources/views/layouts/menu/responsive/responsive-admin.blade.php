<x-responsive-nav-link class="px-3 py-2" :href="route('asistencia.index')" :active="request()->routeIs('asistencia.*')">
  {{ __('Asistencias') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('clase.index')" :active="request()->routeIs('clase.*')">
  {{ __('Clases') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('rutina.index')" :active="request()->routeIs('rutina.*')">
  {{ __('Rutinas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('ejercicio.index')" :active="request()->routeIs('ejercicio.*')">
  {{ __('Ejercicios') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('usuario.index')" :active="request()->routeIs('usuario.index')">
  {{ __('Usuarios') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('cuota.index')" :active="request()->routeIs('cuota.*')">
  {{ __('Cuotas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('tarifa.index')" :active="request()->routeIs('tarifa.*')">
  {{ __('Tarifas') }}
</x-responsive-nav-link>
<x-responsive-nav-link class="px-3 py-2" :href="route('horario.index')" :active="request()->routeIs('horario.*')">
  {{ __('Horarios') }}
</x-responsive-nav-link>