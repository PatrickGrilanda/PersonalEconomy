@props(['titleSize' => 'sm', 'title' => '', 'titleStyle' => ''])

<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl shadow p-4 flex flex-col gap-4 h-fit']) }}>
    @if (isset($title))
        <div class="font-semibold text-{{ $titleSize }} {{ $titleStyle }}">
            {{ $title }}
        </div>
    @endif
    <div>
        {{ $slot }}
    </div>
    <div>
        @if (isset($footer))
            {{ $footer }}
        @endif
    </div>
</div>
