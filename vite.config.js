import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/css/addon/landing.css',
                'resources/css/addon/signin.css',
                'resources/css/addon/candidate.css',

                'resources/css/lib/datatable.css',

                'resources/js/handler/offcanvas.js',

                'resources/js/addon/layout-dashboard.js',
                'resources/js/addon/layout-error.js',
                'resources/js/addon/layout-landing.js',

                'resources/js/addon/candidate-landing-page.js',
                'resources/js/addon/timeline-landing-page.js',
                'resources/js/addon/home-landing-page.js',

                'resources/js/addon/signin-page.js',
                'resources/js/addon/home-page.js',
                'resources/js/addon/candidate-page.js',
                'resources/js/addon/create-candidate-page.js',

                'resources/js/lib/boxicons.js',
                'resources/js/lib/apexchart.js',
                'resources/js/lib/datatable.js',
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
                    axios: ['axios'],
                }
            },
        },
    },
});
