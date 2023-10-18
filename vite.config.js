import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/js/jquery-easing/jquery.easing.min.js',
                'resources/js/sb-admin-2.min.js',
            ],
            refresh: true,
        }),
    ],
});
