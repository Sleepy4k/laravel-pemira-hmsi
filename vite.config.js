import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/css/landing.css',

                'resources/js/addon/home-page.js',
                'resources/js/addon/layout-dashboard.js',
                'resources/js/addon/layout-error.js',
                'resources/js/addon/signin-page.js',
                'resources/js/addon/timeline-page.js',

                'resources/js/lib/boxicons.js',
                'resources/js/lib/apexchart.js',
            ],
            refresh: true,
        }),
        tailwindcss({
            optimize: {
                minify: true,
            }
        }),
    ],
    build: {
        chunkSizeWarningLimit: 600,
        rollupOptions: {
            output: {
                manualChunks: {
                    sweetalert2: ['sweetalert2'],
                    axios: ['axios'],
                }
            },
        },
    },
});
