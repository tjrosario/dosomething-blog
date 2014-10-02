module.exports = function(grunt) {
  grunt.registerTask("lint", ["lint:css"]);
  grunt.registerTask("lint:css", ["scsslint:scss"]);
}
