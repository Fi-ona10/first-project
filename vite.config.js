import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build', // ensure Laravel expects this path
        }),
    ],
    build: {
        manifest: true,
        outDir: path.resolve(__dirname, 'public/build'),
        emptyOutDir: true,
        rollupOptions: {
            output: {
                // put manifest.json directly in public/build
                entryFileNames: 'assets/[name]-[hash].js',
                chunkFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash].[ext]',
            },
        },
    },
});
