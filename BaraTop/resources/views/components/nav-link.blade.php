@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-white text-md leading-5 text-white font-bold focus:outline-none focus:text-yellow-300 focus:border-yellow-300 scale-110 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-500 hover:border-yellow-500 focus:outline-none focus:text-yellow-300 focus:border-yellow-300 transform hover:scale-110 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
