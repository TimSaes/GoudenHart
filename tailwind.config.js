import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                background: "#7DFF91",
                menu: "#00A1E7",
                view: "#43A4FF",
                edit: "#F28816",
                delete: "#FF0000",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                comic_neue: ["Comic Neue", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
