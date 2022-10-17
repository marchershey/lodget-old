import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        hmr: {
            host: "172.20.10.5",
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [
                "app/Http/Controllers/**",
                "resources/views/**",
                "routes/**",
            ],
            usePolling: true,
        }),
    ],
});
