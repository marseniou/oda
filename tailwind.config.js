/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],
  daisyui:{
    themes: [
      {
          royal: {
              "primary": "#A78338",
              "secondary": "#d946ef",
              "accent": "#7e22ce",
              "neutral": "#FFFFFF",
              "base-100": "#F3F2EE",
              "info": "#00ffff",
              "success": "#2dd4bf",
              "warning": "#fde047",
              "error": "#db2777",
              "primary-content": "#FFFFFF",
              "secondary-content": "#232323"
          },
          
      },
      'dark'
  ],
  }
}
