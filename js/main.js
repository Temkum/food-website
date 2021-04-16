$(document).ready(function () {
  // sticky nav
  $(".js--section-categories").waypoint(
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
});

/* // execute on scroll
window.onscroll = function () {
  stickyNav();
};

// get navbar

// alert("Script works");
 */
