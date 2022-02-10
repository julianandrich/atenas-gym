@props(['active'])

@php
$classes = ($active ?? false)
? 'block px-4 py-2 items-center border-b-2 border-red-700 text-base font-medium leading-5 text-red-700
focus:outline-none focus:border-red-900 transition duration-150 ease-in-out'
: 'block px-4 py-2 items-center border-b-2 border-transparent text-base font-medium leading-5 text-gray-700
hover:text-red-900 hover:border-red-900 focus:outline-none focus:text-red-900 focus:border-red-900 transition
duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
{{-- <a
  {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm leading-5 text-gray-300 border-b-2 border-red-700 text-red-700 focus:outline-none focus:border-red-900 transition duration-75 ease-in-out']) }}>{{ $slot }}</a>
--}}