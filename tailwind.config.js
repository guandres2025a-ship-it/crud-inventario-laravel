import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js", // 🔴 MUY IMPORTANTE
    ],

    safelist: [
        // Modales
        "fixed",
        "inset-0",
        "z-50",
        "hidden",
        "flex",
        "items-center",
        "justify-center",

        // Animaciones
        "scale-95",
        "scale-100",
        "opacity-0",
        "opacity-100",
        "transition",
        "transform",

        // Fondo modal
        "bg-black/50",
        "bg-black",
        "bg-opacity-50",
        "backdrop-blur-sm",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
