import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/css/Status/index.css',
            'resources/css/Status/edit.css','resources/css/Status/create.css','resources/css/guest.css'
        ],
            refresh: true,
        }),
    ],
});
