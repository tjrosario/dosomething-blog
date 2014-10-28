module.exports = {
  sass: {
    files: ["scss/**/*.{scss,sass}"],
    tasks: ["lint:css", "sass:prod"]
  },
  js: {
    files: ["js/ds/**/*.js"],
    tasks: ["lint:js", "requirejs:dev"]
  },
  assets: {
    files: ["images/ds/**/*"],
    tasks: ["imagemin:dynamic"]
  }
}
