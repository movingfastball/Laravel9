@props([
    'href' => '',
    'theme' => 'praimary',
])
@php
    if(!function_exists('getThemeClassForButtonA')){
        function getThemeClassForButtonA($theme) {
            return match ($theme) {
                'primary' => 'text-white bg-blue-500 hover:bg-blue-600
                focus:ring-blue-500',
                'secondary' => 'text-white bg-blue-500 hover:bg-blue-600
                focus:ring-blue-500', 
                default => '',               
            };
        }
    }
@endphp
<a href="{{ $href }}" class="
    inlin-flex justify-center
    py2 px-4
    border border-transparent
    shadow-sm
    text-sm
    font-medium
    rounded-md
    focus:outline-none focus:ring-2 focus:ring-offset-2
    {{ getThemeClassForButtonA($theme) }}">
    {{ $slot }}
</a>