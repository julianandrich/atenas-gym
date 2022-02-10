@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-700 text-base align-bottom font-medium leading-5
text-red-700
focus:outline-none focus:border-red-900 transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-300
hover:text-red-900 hover:border-red-900 focus:outline-none focus:text-red-900 focus:border-red-900 transition
duration-150 ease-in-out';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>