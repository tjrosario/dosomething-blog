module.exports = {
  sass: {
    files: ["scss/**/*.{scss,sass}"],
    tasks: ["lint:css", "sass:prod"]
  },
  js: {
    files: ["js/**/*.js"],
    tasks: ["uglify:dev"]
  },
  assets: {
    files: ["images/ds/**/*"],
    tasks: ["imagemin:dynamic"]
  }
}
