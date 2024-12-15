/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html", // All HTML files in the root directory
    "./src/**/*.html", // Include nested HTML files in 'src' folder
    "./src/**/*.{js,jsx,ts,tsx}", // Other files like React, if used
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
