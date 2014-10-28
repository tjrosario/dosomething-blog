/**
 * We configure RequireJS options, paths, and shims here.
 *
 *  - paths: Load any Bower components in here.
 *  - shim: Shim any non-AMD scripts.
 *  - modules: Configure outputted build files.
 *
 *  @see https://github.com/jrburke/r.js/blob/master/build/example.build.js
 */

require.config({
  paths: {
    "almond": "../../bower_components/almond/almond",
    "jquery": "../../bower_components/jquery/dist/jquery",
    "neue": "../../bower_components/neue/js",
    "text": "../../bower_components/requirejs-text/text"
  },
  stubModules: ["text"],
  modules: [
    {
      name: "lib",
      create: true,
      include: [
        "almond",
        "jquery"
      ]
    },
    {
      name: "app",
      insertRequire: ["app"],
      exclude: [
        "almond",
        "jquery"
      ]
    }
  ]
});
