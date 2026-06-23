import { defineConfig } from 'vite';
import path from 'path';
import vue from '@vitejs/plugin-vue2';

export default defineConfig({
    plugins: [vue()],
    server: {
        port: 5173,
        // Serve the already-compiled public assets for the mix() hot-reload path
        fs: { allow: ['..'] },
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/assets/js'),
        },
    },
    build: {
        outDir: 'public',
        emptyOutDir: false,
        rollupOptions: {
            input: {
                app: path.resolve(__dirname, 'resources/assets/js/app.ts'),
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: 'css/[name].[ext]',
            },
        },
    },
});
