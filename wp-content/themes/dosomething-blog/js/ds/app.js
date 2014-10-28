/**
 * This is where we load and initialize components of our app.
 */
define("app", function(require) {
  "use strict";

  var $ = require("jquery"),
    social = require("social");

  // Initialize modules on load
  require("pagination");

  $(document).ready(function() {
    social.init();
  });
});
