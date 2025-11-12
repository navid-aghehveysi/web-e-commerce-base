<div class="ps-1">
    @foreach($modules as $module)
        <h2 class="text-xl text-gray-400 mt-4 p-1 mb-5">
            {{ $module->name_fa }}
        </h2>

        @foreach($module->submodules as $submodule)


            @if($submodule->submoduleItems->isEmpty())
                <div class="">
                    <a href="{{ $submodule->route ? route($submodule->route) : '#' }}" class="block py-4 ps-4
                    rounded-lg
                        hover:bg-red-500
                        hover:text-white
                        transition-all
                        duration-300"
                    >
                        <div class="flex items-center gap-x-2 hover:text-white">
                            {!! $submodule->icon !!}
                            <span class="">
                                {{ $submodule->name_fa }}
                            </span>
                        </div>
                    </a>
                </div>
            @else
                <section class="accordion space-y-0.5" x-data="{open: false}">

                    <section class="accordion-title p-2" @click="open = !open">
                        <h2 class="flex items-center gap-x-1">
                            {!! $submodule->icon !!}
                            <span class="">{{ $submodule->name_fa }}</span>
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
                    @foreach($submodule->submoduleItems as $item)
                        <section class="accordion-items transition-all duration-300 overflow-hidden ps-2 space-y-2"
                                 x-ref="content"
                                 :style="open ? 'height:' + $refs.content.scrollHeight + 'px' : 'height:0px'">

                            <div class="">

                                <a href="{{ $item->route ? route($item->route) : '#' }}" class="block py-3 ps-4
                                    rounded-lg
                                    hover:bg-red-500
                                    hover:text-white transition-all
                                    duration-300
                                    group
                                    "
                                >
                                    <div class="flex items-center gap-x-2 text-base">
                                        <span class="text-sky-500 group-hover:text-white transition-all
                                        duration-300">
                                            {!! $item->icon !!}
                                        </span>

                                        <span class="text-sm">
                                            {{ $item->name_fa }}
                                        </span>
                                    </div>
                                </a>
                            </div>


                        </section>
                    @endforeach

                </section>
            @endif
        @endforeach
    @endforeach
</div>
