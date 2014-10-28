module.exports = function(grunt) {
  // The `build` task lints, tests, and compiles assets.
  grunt.registerTask("build", ["requirejs:dev", "sass:prod", "imagemin:dynamic"]);

  // The `prod` build task is used when building for production. Since compiled assets
  // are ignored in version control, this is run in Continuous Integration on deploy.
  grunt.registerTask("prod", ["requirejs:debug", "requirejs:prod", "sass:dev", "sass:prod", "imagemin:dynamic"]);
}
