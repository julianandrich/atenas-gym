@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 absolute'])

<textarea {{ $attributes->merge(['class' => 'resize-none
border-gray-300 block
focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50']) }}></textarea>