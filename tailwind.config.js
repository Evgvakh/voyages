/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./allArticle.html",
    "./article.html",
    "./login.html",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
