import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/css/welcome.css',
                'resources/js/welcome.js',

                //--------Categorias---------
                'resources/js/questions/categories.js',
                'resources/css/questions/categories.css',

                'resources/js/questions/levels.js',
                'resources/css/questions/levels.css',

                'resources/js/questions/questions.js',
                'resources/css/questions/questions.css',


                'resources/js/pasarela/pay.js',
                'resources/css/pasarela/pay.css',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
