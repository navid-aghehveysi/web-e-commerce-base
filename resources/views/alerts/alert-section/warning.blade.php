@if(session('alert-section-warning'))
    <div class="bg-green-400 text-white p-4 rounded-2xl shadow-2xl fixed top-10 right-0 left-0 h-24">
        <h2 class="text-xl border-b">هشدار&times;</h2>
        <p class="mt-4">

            {{ session('alert-section-warning') }}
        </p>
    </div>
@endif
