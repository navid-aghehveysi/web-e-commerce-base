@if(session('alert-section-info'))
    <div class="bg-green-400 text-white p-4 rounded-2xl shadow-2xl fixed top-10 right-0 left-0 h-24">
        <h2 class="text-xl border-b">اطلاعیه&times;</h2>
        <p class="mt-4">

            {{ session('alert-section-info') }}
        </p>
    </div>
@endif
