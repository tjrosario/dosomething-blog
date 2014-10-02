module.exports = {
  options: {
    force: true,
    jshintrc: true,
    reporter: require("jshint-stylish")
  },
  all: [
    "js/**/*.js"
  ]
}
