@php
    $defaultClasses = 'site-logo object-contain';
    $mergedClasses = trim($classes . ' ' . $defaultClasses);
@endphp


<a href="{{ route('home') }}" title="{{ $getAlt() }}">
    <img 
        src="{{ $logo }}" 
        alt="{{ $getAlt() }}" 
        class="{{ $mergedClasses }}"
        @if($width) width="{{ $width }}" @endif
        @if($height) height="{{ $height }}" @endif
    />
</a>