import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue({
            // This is needed, or else Vite will try to find image paths (which it wont be able to find because this will be called on the web, not directly)
            // For example <img src="/images/logo.png"> will not work without the code below
            template: {
                transformAssetUrls: {
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});