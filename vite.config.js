import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/layouts/navbar.css',
                'resources/css/layouts/footer.css',
                'resources/css/about.css',
            ],
            refresh: true,
        }),
    ],
});
