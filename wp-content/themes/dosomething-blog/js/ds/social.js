define(function(require) {
  "use strict";

  var $ = require("jquery"),
    Features = require("utils/Features"),
    eventtype = Features.mobilecheck() ? "touchstart" : "click";

  var init = function () {
    $(".twitter-share").on(eventtype, function() {
      var $this = $(this),
          $url = $this.attr("data-url"),
          $title = $this.attr("data-title");

      window.open("http://twitter.com/intent/tweet?text=" + $title + " " + $url, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
      return false;
    });

    $(".pinterest-share").on(eventtype, function() {
      var $this = $(this),
          $url = $this.attr("data-url"),
          $title = $this.attr("data-title"),
          $image = $this.attr("data-image");
      window.open("http://pinterest.com/pin/create/button/?url=" + $url + "&media=" + $image + "&description=" + $title, "twitterWindow", "height=320,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
      return false;
    });

    $(".facebook-share").on(eventtype, function() {
      var $url = $(this).attr("data-url");
      window.open("https://www.facebook.com/sharer/sharer.php?u=" + $url, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
      return false;
    });

    $(".googleplus-share").on(eventtype, function() {
      var $url = $(this).attr("data-url");
      window.open("https://plus.google.com/share?url=" + $url, "googlePlusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
      return false;
    });

    $(".linkedin-share").on(eventtype, function() {
      var $this = $(this),
          $url = $this.attr("data-url"),
          $title = $this.attr("data-title"),
          $desc = $this.attr("data-desc");
      window.open("http://www.linkedin.com/shareArticle?mini=true&url=" + $url + "&title=" + $title + "&summary=" + $desc, "linkedInWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
      return false;
    });
  };

  return {
    init: init
  };
});
