/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'danger': '#d80504',
        'success': '#098b34'
      }
    },
    fontFamily: {
      'roboto': ['Roboto', 'Arial', 'sans-serif'],
    }
  },
  plugins: [],
}

