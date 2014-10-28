define(function(require) {
  "use strict";

  var $ = require("jquery"),
    $win = $(window),
    $body = $("body");

  var Navigation = {
    init: function () {
      Navigation.addDom();
      $win.on("load resize", function () {
        if ($win.width() >= 768) {
          Navigation.close();
        }
      });
      $(".mk-nav-responsive-link").on("click", function() {
        if ($body.hasClass("mk-opened-nav")) {
          Navigation.close();
        } else {
          Navigation.open();
        }
      });
    },
    open: function () {
      $body.removeClass("mk-closed-nav").addClass("mk-opened-nav");
    },
    close: function () {
      $body.removeClass("mk-opened-nav").addClass("mk-closed-nav");
    },
    addDom: function () {
      if ($("#mk-responsive-nav").length === 0) {
        $(".main-navigation-ul, .mk-vm-menu").clone().attr({
          id: "mk-responsive-nav",
          "class": ""
        }).insertAfter(".mk-header-inner");

        $("#mk-responsive-nav > li").each(function() {
          var $this = $(this);

          $this.removeClass("has-mega-menu").addClass("no-mega-menu");

          $this.children("ul").siblings("a").append("<span class='mk-moon-arrow-down mk-nav-arrow mk-nav-sub-closed'></span>").end().attr("style", "");
        });

        $(".mk-header-inner").attr("style", "");

        $("#mk-responsive-nav").append($(".responsive-searchform"));

        $(".mk-nav-arrow").on("click", function(e) {
          var $this = $(this);
          if ($this.hasClass("mk-nav-sub-closed")) {
            $this.parent().siblings("ul").slideDown(450).end().end().removeClass("mk-nav-sub-closed").addClass("mk-nav-sub-opened");
          } else {
            $this.parent().siblings("ul").slideUp(450).end().end().removeClass("mk-nav-sub-opened").addClass("mk-nav-sub-closed");
          }
          e.preventDefault();
        });
      }
    }
  };

  return Navigation;

});
