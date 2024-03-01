@props(['titleSize' => 'sm', 'title' => ''])

<div class="bg-white w-full rounded-2xl shadow p-4 flex flex-col gap-4 h-fit">
    @if (isset($title))
        <div class="font-semibold text-{{ $titleSize }}">
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
