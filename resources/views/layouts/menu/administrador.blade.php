<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

<x-nav-link class="px-3 py-2" :href="route('asistencia.index')" :active="request()->routeIs('asistencia.*')">
  {{ __('Asistencias') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('clase.index')" :active="request()->routeIs('clase.*')">
  {{ __('Clases') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('rutina.index')" :active="request()->routeIs('rutina.*')">
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('ejercicio.index')" :active="request()->routeIs('ejercicio.*')">
  {{ __('Ejercicios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('usuario.index')" :active="request()->routeIs('usuario.*')">
  {{ __('Usuarios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('cuota.index')" :active="request()->routeIs('cuota.*')">
  {{ __('Cuotas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('tarifa.index')" :active="request()->routeIs('tarifa.*')">
  {{ __('Tarifas') }}
</x-nav-link>
<x-nav-link class="px-3 py-2" :href="route('horario.index')" :active="request()->routeIs('horario.*')">
  {{ __('Horarios') }}
</x-nav-link>