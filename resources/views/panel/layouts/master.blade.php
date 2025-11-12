<!doctype html>
<html lang="fa" dir="rtl" class="dark-">
    <head>

        @include('panel.layouts.partials.head-tags')
        <title>@yield('title' , 'Home | Index')</title>
    <body>

        <section class="row ">
            <!-- Header -->
            <header class="header bg-white shadow fixed top-0 left-0 right-0  h-[var(--header-height)] z-50">
                <section class="wrapper">
                    @include('panel.layouts.partials.header')
                </section>
            </header>
        </section>

        <div class="h-[var(--header-height)] bg-amber-800"></div>

        <section class="row ">

            <section class="h-[calc(100vh_-_var(--header-height))] bg-gray-100">
                <!-- Aside -->
                <aside class="aside w-[var(--aside-width)] fixed top-[var(--header-height)] right-0 bottom-0">
                    <section class="wrapper bg-white">

                        <section class="relative font-semibold text-gray-500 h-full">

                            <!-- Dashboard | Home -->
                            <div class="shadow p-1">
                                <a href="{{ route('panel.dashboard.index') }}" class="block py-4 ps-4 rounded-lg
                                hover:bg-red-500 hover:text-white transition-all duration-300">
                                    <div class="flex items-center gap-x-2">
                                        <div class="">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <rect width="7" height="9" x="3" y="3" rx="1" />
                                                <rect width="7" height="5" x="14" y="3" rx="1" />
                                                <rect width="7" height="9" x="14" y="12" rx="1" />
                                                <rect width="7" height="5" x="3" y="16" rx="1" />
                                            </svg>
                                        </div>
                                        <span class="">
                                    داشبورد
                                </span>
                                    </div>
                                </a>
                            </div>

                            <!-- Other list -->
                            <div class="absolute top-18 w-full bottom-16">
                                @include('panel.layouts.partials.aside')
                            </div>

                        </section>

                    </section>
                </aside>

                <!-- Main -->
                <main class="w-[calc(100vw_-_var(--aside-width))] fixed top-[var(--header-height)]
                    right-[var(--aside-width)] bottom-0 flex flex-col gap-y-4 p-2">
                    <!-- BreadCrumb -->
                    <nav class="bread-crumb">
                        <section class="">
                            <section class="flex items-center justify-between gap-x-4 ">
                                <ol>
                                    <li class="bread-crumb-path">
                                        <a href="{{ route('panel.dashboard.index') }}">
                                            <span>داشبورد</span>
                                            <span>/</span>
                                        </a>
                                    </li>
                                    @yield('bread-crumb')
                                </ol>
                                <span class="inline-block border-t grow"></span>
                            </section>
                        </section>
                    </nav>

                    <!-- main-header -->
                    <section class="main-header">

                        <section class="">
                            @yield('main-header')

                        </section>

                    </section>

                    <!-- content -->
                    <section class="content flex-1 overflow-y-auto">
                        @yield('content')
                    </section>
                </main>
            </section>

        </section>
        @include('panel.layouts.partials.alerts')
        @stack('local-script')
    </body>
</html>
