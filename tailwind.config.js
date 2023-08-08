/** @type {import('tailwindcss').Config} */

const colors = require("tailwindcss/colors");

export default {
    content: ["./resources/**/*.blade.php"],
    theme: {
        fontWeight: {
            thin: "100",
            extralight: "200",
            light: "300",
            normal: "400",
            medium: "500",
            semibold: "600",
            bold: "700",
            extrabold: "800",
            black: "900",
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: colors.blue[700],
                    light: colors.blue[500],
                    lighter: colors.blue[300],
                    lightest: colors.blue[100],
                    dark: colors.blue[800],
                },
                muted: {
                    lighter: colors.gray[100],
                    light: colors.gray[200],
                    DEFAULT: colors.gray[400],
                    dark: colors.gray[600],
                },
                gray: colors.gray,
            },
            fontFamily: {
                inter: ["Inter", "sans-serif"],
            },
            screens: {
                tablet: "640px", // => @media (min-width: 640px) { ... }
                laptop: "1024px", // => @media (min-width: 1024px) { ... }
                desktop: "1280px", // => @media (min-width: 1280px) { ... }
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        require("tailwindcss-animate"),
    ],
};
