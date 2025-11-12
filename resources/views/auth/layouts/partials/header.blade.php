<section class="flex items-center justify-between h-full">
    <section class="flex item-center rounded shadow space-x-4 p-1">
        <a href=""  class="p-2">گروه نرم افزاری دی جی تک</a>
    </section>
    <section>
        @auth
            <a href="">پروفایل</a>
            <from action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <bottom type="submit">خروج</bottom>
            </from>
        @endauth
        @guest
            <a href="">ورود</a>
        @endguest
    </section>
    <section class="space-x-2">
        @guest
            @if(request()->routeIs('auth.register.form'))
                <a href="{{ route('auth.login') }}" class="border rounded-lg p-2">ورود</a>
            @elseif(request()->routeIs('auth.login.form'))
                <a href="{{ route('auth.register.create') }}" class="border rounded-lg p-2 text-white bg-gray-600 ">ثبت
                    نام</a>
            @endif
        @endguest
    </section>
</section>
