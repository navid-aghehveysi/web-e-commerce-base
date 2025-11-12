<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
@stack('style')
@stack('script')
@stack('vite-scripts')
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite([
        'resources/css/auth/auth.css',
         'resources/js/public.js',
         'resources/js/auth/auth.js'
    ])
@endif
