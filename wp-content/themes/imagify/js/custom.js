jQuery(function() {
    console.log( "ready!" );

    jQuery(".header-widget-area #nav_menu-2 .nav-header").prepend('<div id="mobi-menu"></div>');
    jQuery("#mobi-menu").on("click", function(){
        jQuery(".header-widget-area #nav_menu-2 .nav-header ul").slideToggle();
        jQuery(this).toggleClass("active");

    });

    if (window.innerWidth <= 767) {
        jQuery("#nav_menu-2 #menu-main-menu li.menu-item-has-children").click(function(){
            jQuery(this).children("ul.sub-menu").toggleClass('active');
        });
    }

    // Slick Slider

    jQuery('.banner_slider').slick({
        dots: false,
        arrows:false,
        autoplay: true,
        slidesToShow: 1, 
        autoplaySpeed: 3000,
        infinite:true,
        fade: true,
        cssEase: 'linear'
    });

});