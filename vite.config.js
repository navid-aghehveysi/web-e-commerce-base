import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'


export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/css/auth/auth.css',
                'resources/css/panel/panel.css',
                'resources/css/front/front.css',
                'resources/js/public.js',
                'resources/js/auth/auth.js',
                'resources/js/panel/panel.js',
                'resources/js/front/front.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
