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
        // Force a single copy of Vue in the bundle. Without this the build can
        // include two Vue instances (one pulled in by Vuetify), which triggers
        // "[Vuetify] Multiple instances of Vue detected" and renders nothing.
        dedupe: ['vue'],
        alias: {
            '@': path.resolve(__dirname, 'resources/assets/js'),
            // Full build (includes the runtime template compiler, needed for
            // the in-DOM #app template) in CommonJS form. The ESM full builds
            // break `.extend` for CJS consumers (Vuetify, vue-class-component)
            // under Rollup's interop; the .common build exports the Vue
            // constructor directly, so `.extend` works everywhere.
            vue: path.resolve(__dirname, 'node_modules/vue/dist/vue.common.js'),
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
                // The blade templates load app.js as a classic <script> (not
                // type="module"), so the bundle must be a self-contained IIFE,
                // not ES modules. inlineDynamicImports keeps it a single file.
                format: 'iife',
                inlineDynamicImports: true,
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: 'css/[name].[ext]',
            },
        },
    },
});
