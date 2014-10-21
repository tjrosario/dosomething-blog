module.exports = {
  dev: {
    options: {
      mangle: false,
      compress: true,
      beautify: true
    },
    files: {
      "dist/app.js": [
        "js/vendors.js",
        "js/scripts.js"
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
        "js/vendors.js",
        "js/scripts.js"
      ]
    }
  }
}
