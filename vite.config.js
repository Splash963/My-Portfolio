import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        cors: true,
        port: 5173,
        hmr: {
            host: '192.168.1.104',
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
                'resources/css/contact.css',
                'resources/css/projects.css',
                'resources/css/layouts/icons.css',
                'resources/css/layouts/reviews.css',
                'resources/css/admin/dashboard.css',
                'resources/css/admin/layouts/offcanvas.css',
                'resources/css/admin/manage-projects.css',
                'resources/js/admin/manage-projects.js',
            ],
            refresh: true,
        }),
    ],
});
``