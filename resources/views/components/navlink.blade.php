@props(['active'])

@php
$classes = 'text-gray-300 hover:bg-gray-500 hover:text-white hover:border-b-2 hover:border-white';

if ($active ?? false) {
    $classes = 'bg-gray-500 text-white border-b-2 border-white';
}
@endphp

<a {{ $attributes->merge(['class' => "$classes rounded-md px-3 py-2 text-base font-medium"]) }} 
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
