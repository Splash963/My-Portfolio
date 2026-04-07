import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        cors: true,
        port: 5173,
        hmr: {
            host: '172.20.10.8',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/layouts/navbar.css',
                'resources/css/layouts/footer.css',
                'resources/css/about.css',
                'resources/css/services.css',
                'resources/css/projects.css',
                'resources/css/layouts/icons.css',
            ],
            refresh: true,
        }),
    ],
});
``