import { defineConfig } from 'vite'

export default defineConfig({
    build: {
        lib: {
            entry: {
                main: 'src/main.ts',
                header: 'src/components/easyrealestate-header.ts',
                app: 'src/components/easyrealestate-app.ts',
                forms: 'src/components/easyrealestate-forms.ts',
                sliders: 'src/components/easyrealestate-sliders.ts',

            },
            name: 'easyrealestate',
            fileName: (format, entryName) => `assets/js/${entryName}.${format}.js`,
            formats: ['es'],
        },
        rollupOptions: {
            output: {
                entryFileNames: 'assets/js/[name].[format].js',
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