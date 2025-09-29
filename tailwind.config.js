/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.{html,js,php}",
    "./src/**/*.{html,js,php}",
    "./index.php",
    "./*.html",
  ],
  theme: {
    extend: {
      colors: {
        vending: {
          primary: "#2563eb",
          secondary: "#dc2626",
          success: "#16a34a",
          warning: "#ca8a04",
          dark: "#1f2937",
        },
      },
      fontFamily: {
        vending: ["Inter", "sans-serif"],
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
