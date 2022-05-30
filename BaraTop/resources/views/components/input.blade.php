@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-yellow-300 focus:ring focus:ring-yellow-500 focus:ring-opacity-50 transform hover:scale-105 focus:scale-105  transition duration-500 ease-in-out']) !!}>
