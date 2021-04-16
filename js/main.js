$(document).ready(function () {
  // sticky nav
  $(".js--section-features").waypoint(
    function (direction) {
      if (direction == "down") {
        $("nav").addClass("sticky");
      } else {
        $("nav").removeClass("sticky");
      }
    },
    {
      offset: "60px",
    }
  );

  // scroll on buttons
  $(".js-scroll-to-plan").click(function () {
    $("html, body").animate(
      {
        scrollTop: $(".js-plans").offset().top,
      },
      1000
    );
  });

  $(".js-scroll-to-start").click(function () {
    $("html, body").animate(
      {
        scrollTop: $(".js-section-features").offset().top,
      },
      1000
    );
  });

  // navigation scroll
  $("a[href*=#]:not([href=#])").click(function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") ||
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        $("html,body").animate(
          {
            scrollTop: target.offset().top,
          },
          1000
        );
        return false;
      }
    }
  });

  // animation on scroll
  $(".js-wp-1").waypoint(
    function (direction) {
      $(".js-wp-1").addClass("animated fadeIn");
    },
    {
      offset: "50%",
    }
  );
  $(".js-wp-1").waypoint(
    function (direction) {
      $(".js-wp-1").addClass("animated fadeInUp");
    },
    {
      offset: "50%",
    }
  );
  $(".js-wp-1").waypoint(
    function (direction) {
      $(".js-wp-1").addClass("animated fadeIn");
    },
    {
      offset: "50%",
    }
  );
  $(".js-wp-1").waypoint(
    function (direction) {
      $(".js-wp-1").addClass("animated pulse");
    },
    {
      offset: "50%",
    }
  );

  // mobile nav
  $(".js-mobile-nav").click(function () {
    const nav = $(".js-main-nav");
    const icon = $(".js-main-nav i");

    nav.slideToggle(200);
    if (icon.hasClass("ion-navicon-round")) {
      icon.addClass("ion-close-round");
      icon.removeClass("ion-navicon-round");
    } else {
      icon.addClass("ion-navicon-round");
      icon.removeClass("ion-close-round");
    }
  });
});
