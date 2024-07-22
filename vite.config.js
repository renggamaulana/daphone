import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
    base: process.env.APP_URL || '/',
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true, // Ensure Vite exits if the port is already in use
    },
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            input: {
                main: 'resources/js/app.js',
                style: 'resources/css/app.css'
            },
        },
    },
});
