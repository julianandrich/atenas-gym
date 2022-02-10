@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md w-full shadow-sm sm:text-sm
border-gray-300 block focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50']) !!}>