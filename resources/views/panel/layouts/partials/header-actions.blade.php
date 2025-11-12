<section class="header-actions">

        <section class="flex items-center justify-between h-full px-4">

            <section class="bg-rose-500">
                <section class="flex items-center">
                    <div></div>
                </section>
            </section>

            <!-- notify -->
            <section class="notify">
                <section class="flex items-center gap-x-11">

                    {{-- notifications --}}
                    <div class="relative">
                        <a href="">
                            <div class="fill-gray-200 stroke-gray-300 hover:fill-gray-300/70 transition-all duration-200">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    width="34"
                                    height="34"
                                    stroke-width="0.5"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                                        clip-rule="evenodd"
                                    />
                                </svg>

                            </div>
                            <span class="badge -top-1 -left-7">
                                <sup>+</sup>
                                <small>99</small>
                            </span>
                        </a>

                        <section class="notify-sub-item bg-white hidden">
                            <section class="sub-item-header border-b-2 ">
                                <a href="" class="block py-2  text-center">
                                    <h2> اعلان های خوانده نشده</h2>
                                </a>
                            </section>
                            <section class="notify-sub-item-lists">
                                <a href="" class="notify-sub-item-list">
                                    <div class="flex items-center gap-x-2">
                                        <img src="." class="avatar" alt="">
                                        <div class="space-y-3">

                                        </div>
                                    </div>
                                </a>
                            </section>
                        </section>
                    </div>

                    {{-- comments --}}
                    <div class="relative">
                        <a href="">
                            <div class="fill-gray-200 stroke-gray-300 hover:fill-gray-300/70 transition-all duration-200">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    width="34"
                                    height="34"
                                    aria-hidden="true"
                                    data-slot="icon"
                                    stroke-width="0.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z"
                                    />
                                    <path
                                        d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z"
                                    />
                                </svg>
                            </div>
                            <span class="badge -top-1 -left-6">
                                <sup></sup>
                                <small>11</small>
                            </span>
                        </a>
                    </div>

                    <div>
                        @auth
                            @if(!auth()->user()->profile?->full_name)
                                <a href="">تکمیل اطلاعات کاربری</a>
                            @else

                                    <a href="{{ route('auth.logout') }}"  class="flex items-center justify-between p-2 rounded-lg gap-x-4 border">
                                    <span class="">
                                        {{ auth()->user()->profile->full_name }}
                                    </span>
                                        <span class="mt-1">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                              <path d="m15 18-6-6 6-6" />
                                            </svg>
                                    </span>
                                    </a>
                                </form>
                            @endif
                        @endauth
                    </div>
                </section>
            </section>

        </section>

</section>
