@props(['links' => [], 'style' => 'outline'])

<x-btn.group>
    @foreach ($links as $link)
        <x-btn href="{{ $link['url'] ?? '#' }}" style="{{ $style }}">
            {{ $link['label'] ?? '' }}

            @if (isset($link['icon']))
                <x-dynamic-component :component="$link['icon']" />
            @endif
        </x-btn>
    @endforeach
</x-btn.group>
