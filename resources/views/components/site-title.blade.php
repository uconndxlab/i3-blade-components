@include('i3::components._styles')

<div {{ $attributes->merge(['class' => 'site-title']) }}>
    <div class="site-title__content {{ $containerClass }}">
        <div class="site-title__identity">
            <div class="site-title__subheader">
                @if ($subheaderUrl)
                    <a href="{{ $subheaderUrl }}">{{ $subheader }}</a>
                @else
                    {{ $subheader }}
                @endif
            </div>

            <div class="site-title__title">
                @if ($titleUrl)
                    <a href="{{ $titleUrl }}">{{ $title }}</a>
                @else
                    {{ $title }}
                @endif
            </div>
        </div>

        @isset($right)
            <div class="site-title__right">
                {{ $right }}
            </div>
        @endisset
    </div>
</div>
