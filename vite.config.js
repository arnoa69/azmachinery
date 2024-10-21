import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';
import VueI18nPlugin from '@intlify/unplugin-vue-i18n/vite';

export default defineConfig(({ mode }) => {
    // Load env file based on `mode` in the current working directory.
    // Set the third parameter to '' to load all env regardless of the `VITE_` prefix.
    const env = loadEnv(mode, process.cwd(), '')

    const appCountry = env.VITE_APP_COUNTRY;

    return {
        plugins: [
            laravel({
                input: ['resources/js/app.js', 'resources/js/script.js', 'resources/css/app.css'],
                ssr: 'resources/js/ssr.js',
                refresh: true,
            }),
            vue({
                template: {
                    transformAssetUrls: {
                        base: null,
                        includeAbsolute: false,
                    },
                },
            }),
            VueI18nPlugin({
                include: path.resolve(__dirname, `resources/js/locales/${appCountry}/**`)
            }),
        ],
        resolve: {
            alias: {
                '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            }
        },
        build: {
            rollupOptions: {
                output: {
                    manualChunks(id) {
                        if (id.includes('node_modules')) {
                            return id.toString().split('node_modules/')[1].split('/')[0].toString();
                        }
                        // Handle large JSON files for locales
                        if (id.includes(`/resources/js/locales/${appCountry}/products/**`)) {
                            return 'locales'; // You can customize this chunk name
                        }
                    }
                }
            }
        }
    }
});
