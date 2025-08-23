import { defineConfig } from 'vite'

export default defineConfig({
    build: {
        lib: {
            entry: 'src/main.ts',
            name: 'easyrealestate',
            fileName: (format, entryName) => `assets/js/${entryName}.${format}.js`,
            formats: ['iife'] 
        },
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[ext]/[name].[ext]',
            }
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                silenceDeprecations: [
                    'import',
                    'mixed-decls',
                    'color-functions',
                    'global-builtin',
                ],
            }
        }
    }
})