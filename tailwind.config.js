/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        // "./vendor/usernotnull/tall-toasts/config/**/*.php",
        // "./vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: colors.blue[600],
                    light: colors.blue[500],
                    dark: colors.blue[800],
                    muted: colors.blue[300],
                },
                muted: {
                    DEFAULT: colors.gray[500],
                    light: colors.gray[100],
                },
                gray: colors.slate,
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
        //     require('@tailwindcss/line-clamp'),
    ],
};
