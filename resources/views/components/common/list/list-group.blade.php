<section class="accordion-title p-2"
         @click="open = !open"
>
    <h2 class="flex items-center gap-x-1">
        <span>
            {{ $icon }}
        </span>
        <span class="">
            {{ $title }}
        </span>
    </h2>
    <div class="transition-all duration-200"
         :style="open ? 'transform: rotate(0deg)' : 'transform: rotate(-90deg)'"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="m15 18-6-6 6-6" />
        </svg>

    </div>
</section>

<section class="accordion-items transition-all duration-300 overflow-hidden"
         x-ref="content"
         :style="open ? 'height:' + $refs.content.scrollHeight + 'px' : 'height:0px'">

    @foreach($children as $child)
        <div class="">

            <a href="{{ route($child->route) }}" class="class ">
                <div class="flex items-center gap-x-2">
                    <span class="{{ $iconStyle }}">
                        {{ $child->icon }}
                    </span>
                    <span class="text-sm {{ $titleStyle }}">
                        {{ $child->title }}
                    </span>
                </div>
            </a>
        </div>
    @endforeach

</section>
