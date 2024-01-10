import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/css/Status/index.css',
            'resources/css/Status/edit.css','resources/css/guest.css',
            'resources/css/Task/edit.css','resources/css/Task/create.css','resources/css/Task/index.css',
            'resources/css/Task/show.css'
        ],
            refresh: true,
        }),
    ],
});
