<div class="">
    <a href="{{ $route ? route($route) : $link }}" class="group {{ $itemStyle }}"
    >
        <div class="flex items-center gap-x-2 hover:text-white ">
            <span class="{{$iconStyle}}">
                 {!!  $icon !!}
            </span>
            <span class="{{ $titleStyle }}">
                    {{$title}}
            </span>
        </div>
    </a>
</div>
