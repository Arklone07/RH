import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: ['resources/views/*', 'resources/sass/', 'resources/js/*'],
        }),
    ],
    resolve:{
        alias:{
            '~bootstrap':path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
    server: {
        hmr: {
            host: 'localhost',
        },
      }
});
