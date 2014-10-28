define(function(require) {
  "use strict";

  var $ = require("jquery"),
    social = require("social");

  var $loader = $(".mk-preloader"),
    containerSel = ".mk-blog-container",
    moreBtnSel = ".mk-pagination-next a";

  $(".mk-pagination-next a").on("click", function (ev) {
    ev.preventDefault();
    var $content = $("#content"),
        $moreBtn = $content.find(moreBtnSel),
        url = $(this).attr("href");

    $loader.addClass("active"); 
    $.ajax({
      url: url,
      success: function (data) {
        var $newContent = $(data).find("#content"),
            $posts = $newContent.find(containerSel),
            $newMoreBtn = $newContent.find(moreBtnSel);

        if ($posts.find(".mk-blog-modern-item").length > 0) {
          $content.find(containerSel).append($posts.html());
        }

        if ($newMoreBtn.length > 0) {
          $moreBtn.attr("href", $newMoreBtn.attr("href"));
        } else {
          $moreBtn.parents(".mk-pagination").addClass("hidden");
        }

        $loader.removeClass("active");
        social.init();
      }
    });
  });
});
