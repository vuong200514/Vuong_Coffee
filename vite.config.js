import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: process.env.TEST ? process.env.TEST + '-8002.app.github.dev': null,
            clientPort: process.env.TEST ? 443 : null,
            protocol: process.env.TEST ? 'wss' : null
        },
    }
});
