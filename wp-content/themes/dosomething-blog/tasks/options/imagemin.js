module.exports = {
  dynamic: {
    files: [
      {
        expand: true,
        cwd: 'images/ds/',
        src: ["**/*.{png,jpg,gif}"],
        dest: 'dist/images/'
      }
    ]
  }
};
