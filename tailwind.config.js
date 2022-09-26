/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        fontFamily: {
            sans: ['"Montserrat"', ...defaultTheme.fontFamily.sans],
        },
        extend: {
            colors: {
                muted: {
                    DEFAULT: colors.gray[400],
                    light: colors.gray[300],
                    dark: colors.gray[500],
                },
                primary: {
                    DEFAULT: colors.blue[700],
                    dark: colors.blue[800],
                },
            },
            screens: {
                tablet: "640px",
                // => @media (min-width: 640px) { ... }

                laptop: "1024px",
                // => @media (min-width: 1024px) { ... }

                desktop: "1280px",
                // => @media (min-width: 1280px) { ... }
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/line-clamp"),
    ],
};
