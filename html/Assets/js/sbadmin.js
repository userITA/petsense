/*!
    * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
    */
(function(jQuery) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        jQuery("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                jQuery(this).addClass("active");
            }
        });

    // Toggle the side navigation
    jQuery("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        jQuery("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);