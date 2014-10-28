module.exports = {
  dev: {
    options: {
      mangle: false,
      compress: true,
      beautify: true
    },
    files: {
      "dist/app.js": [
        "bower_components/jquery/dist/jquery.js",
        "js/ds/main.js"
      ]
    }
  },
  prod: {
    options: {
      mangle: false,
      compress: true,
      beautify: false,
      report: 'min'
    },
    files: {
      "dist/app.js": [
        "bower_components/jquery/dist/jquery.js",
        "js/ds/main.js"
      ]
    }
  }
}
