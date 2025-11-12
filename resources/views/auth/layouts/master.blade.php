<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        @include('auth.layouts.partials.head-tags')
        <title>@yield('title' , 'Auth | otp')</title>
    </head>
    <body>

        <!-- header -->
        <section class="row h-[var(--header-height)] bg-sky-300">
            <header class="header h-16 shadow bg-gray-50 ps-4 pe-8">
                @include('auth.layouts.partials.header')
            </header>
        </section>

        <section class="row">
            <main class="main bg-gray-100 h-[calc(100vh_-_var(--header-height))]">
                <div class="container mx-auto p-1 border h-full">
                    <div class="flex flex-col items-center justify-center gap-y-4 pt-16">
                        @yield('content')
                    </div>
                </div>
            </main>

        </section>
        @include('alerts.toasts.toast')
    </body>
</html>
