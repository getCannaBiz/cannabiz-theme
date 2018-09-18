(function($) {

    $(document).ready(function() {

        // Add lightbox gallery to default WP gallery
        $(".gallery-item").each(function() {
            // Get url of image for data src
            var dataSrc = $(this).find("a").attr("href");

            // Get the image caption
            var caption = $(this).find(".gallery-caption").html();

            // Add data src attribute
            $(this).attr('data-src', dataSrc);

            // Add caption attribute
            if (typeof caption !== 'undefined') {
                $(this).attr('data-sub-html', '<h3>' + caption + '</h3>');
            }
        });


        // Initialize the lightbox gallery
        $(".post [id^=lightGallery], .post-text [data-link='file'], .edd_download [id^=lightGallery]").each(function() {
            $(this).lightGallery({
                showThumbByDefault: true,
                mode: 'fade',
                speed: 250,
                thumbMargin: 10,
                thumbWidth: 125,
                loop: true,
                onOpen: galleryHeight
            });
        });


        // Add a little padding to the lightbox gallery
        function galleryHeight() {

            // Get the height of the caption area
            setTimeout(function() {
                // Get height of thumb navs
                var thumbHeight = $(".thumb_cont").height();

                // Add some padding to the bottom to compensate for the thumbs
                $(".lightGallery-slide").css({
                    'padding-bottom': thumbHeight + 'px'
                });

                $("#lightGallery-Gallery.open #lightGallery-slider .lightGallery-slide").fadeIn(200);

            }, 100);

        }
        galleryHeight();


        // Center main navigation drop down
        $(".main-navigation li").each(function() {
            if ($(this).find("ul").length > 0) {
                var parent_width = $(this).outerWidth(true);
                var child_width = $(this).find("ul").outerWidth(true);
                var new_width = parseInt((child_width - parent_width) / 2);
                $(this).find("ul").css('margin-left', -new_width + "px");
            }
        });


        // Header Menu Toggle
        $(".menu-toggle").click(function() {
            $(".site-branding, .main-navigation, .site-header-bg-wrap").toggle();

            $(".menu-toggle span").toggle();
        });


        // Responsive mobile navigation functions
        $(window).on("resize load", function() {
            // Add class to desktop nav for toggling
            $(".main-navigation").addClass('desktop-nav');

            // Desktop drop menu
            $(".main-navigation.desktop-nav li.menu-item").hoverIntent({
                over: navover,
                out: navout,
                timeout: 100
            });

            // Fade in drop menu
            function navover() {
                $(this).children("ul").addClass("show-sub");
                setTimeout(function() {
                    $(".header-search #s").focus();
                }, 200);
            }

            function navout() {
                $(this).children("ul").removeClass("show-sub");
            }

            var current_width = $(window).width();

            // If width is below iPad size
            if (current_width < 769) {

                // Add class to desktop nav for toggling
                $(".main-navigation").removeClass('desktop-nav');
                $(".main-navigation").addClass('mobile-nav');

                // Toggle sub menus on mobile
                $(".menu").find("li.menu-item-has-children:not(.header-search)").click(function() {
                    $(".menu li").not(this).find("ul").next().slideUp(100);
                    $(this).find("> ul").stop(true, true).slideToggle(100);
                    $(this).toggleClass("active-sub-menu");
                    return false;
                });

                // Don't fire sub menu toggle if a user is trying to click the link
                $(".menu-item-has-children a, .main-navigation #s, .main-navigation #searchsubmit").click(function(e) {
                    e.stopPropagation();
                    return true;
                });

            } else {
                $(".main-navigation").addClass('desktop-nav');
                $(".main-navigation").removeClass('mobile-nav');
                $(".logo, .hero-title, .main-navigation, .site-header-bg-wrap ").show();
            }

        });


        // Detect mobile/tablet orientation
        var current_width = $(window).width();

        // Allow drop menus to be clicked on landscape tablet
        if (current_width > 600) {
            function orient() {
                if (window.orientation == 90 || window.orientation == -90) {
                    // Add landscape class to body
                    $("body").addClass("landscape");

                    // Remove desktop nav class
                    $(".main-navigation").removeClass("desktop-nav");

                    orientation = 'landscape';

                    return false;
                }
            }

            // Call orientation function on page load
            $(function(){
                orient();
            });

            // Call orientation function on orientation change */
            $(window).bind( 'orientationchange', function(e){
                orient();
            });
        }

    });

})(jQuery);

/*
 * ScrollToFixed
 * https://github.com/bigspotteddog/ScrollToFixed
 *
 * Copyright (c) 2011 Joseph Cava-Lynch
 * MIT license
 */

(function(a){a.isScrollToFixed=function(b){return !!a(b).data("ScrollToFixed")};a.ScrollToFixed=function(d,i){var m=this;m.$el=a(d);m.el=d;m.$el.data("ScrollToFixed",m);var c=false;var H=m.$el;var I;var F;var k;var e;var z;var E=0;var r=0;var j=-1;var f=-1;var u=null;var A;var g;function v(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");f=-1;E=H.offset().top;r=H.offset().left;if(m.options.offsets){r+=(H.offset().left-H.position().left)}if(j==-1){j=r}I=H.css("position");c=true;if(m.options.bottom!=-1){H.trigger("preFixed.ScrollToFixed");x();H.trigger("fixed.ScrollToFixed")}}function o(){var J=m.options.limit;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function q(){return I==="fixed"}function y(){return I==="absolute"}function h(){return !(q()||y())}function x(){if(!q()){var J=H[0].getBoundingClientRect();u.css({display:H.css("display"),width:J.width,height:J.height,"float":H.css("float")});cssOptions={"z-index":m.options.zIndex,position:"fixed",top:m.options.bottom==-1?t():"",bottom:m.options.bottom==-1?"":m.options.bottom,"margin-left":"0px"};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);H.addClass(m.options.baseClassName);if(m.options.className){H.addClass(m.options.className)}I="fixed"}}function b(){var K=o();var J=r;if(m.options.removeOffsets){J="";K=K-E}cssOptions={position:"absolute",top:K,left:J,"margin-left":"0px",bottom:""};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);I="absolute"}function l(){if(!h()){f=-1;u.css("display","none");H.css({"z-index":z,width:"",position:F,left:"",top:e,"margin-left":""});H.removeClass("scroll-to-fixed-fixed");if(m.options.className){H.removeClass(m.options.className)}I=null}}function w(J){if(J!=f){H.css("left",r-J);f=J}}function t(){var J=m.options.marginTop;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function B(){if(!a.isScrollToFixed(H)||H.is(":hidden")){return}var M=c;var L=h();if(!c){v()}else{if(h()){E=H.offset().top;r=H.offset().left}}var J=a(window).scrollLeft();var N=a(window).scrollTop();var K=o();if(m.options.minWidth&&a(window).width()<m.options.minWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.maxWidth&&a(window).width()>m.options.maxWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.bottom==-1){if(K>0&&N>=K-t()){if(!L&&(!y()||!M)){p();H.trigger("preAbsolute.ScrollToFixed");b();H.trigger("unfixed.ScrollToFixed")}}else{if(N>=E-t()){if(!q()||!M){p();H.trigger("preFixed.ScrollToFixed");x();f=-1;H.trigger("fixed.ScrollToFixed")}w(J)}else{if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}}}else{if(K>0){if(N+a(window).height()-H.outerHeight(true)>=K-(t()||-n())){if(q()){p();H.trigger("preUnfixed.ScrollToFixed");if(F==="absolute"){b()}else{l()}H.trigger("unfixed.ScrollToFixed")}}else{if(!q()){p();H.trigger("preFixed.ScrollToFixed");x()}w(J);H.trigger("fixed.ScrollToFixed")}}else{w(J)}}}}}function n(){if(!m.options.bottom){return 0}return m.options.bottom}function p(){var J=H.css("position");if(J=="absolute"){H.trigger("postAbsolute.ScrollToFixed")}else{if(J=="fixed"){H.trigger("postFixed.ScrollToFixed")}else{H.trigger("postUnfixed.ScrollToFixed")}}}var D=function(J){if(H.is(":visible")){c=false;B()}else{l()}};var G=function(J){(!!window.requestAnimationFrame)?requestAnimationFrame(B):B()};var C=function(){var K=document.body;if(document.createElement&&K&&K.appendChild&&K.removeChild){var M=document.createElement("div");if(!M.getBoundingClientRect){return null}M.innerHTML="x";M.style.cssText="position:fixed;top:100px;";K.appendChild(M);var N=K.style.height,O=K.scrollTop;K.style.height="3000px";K.scrollTop=500;var J=M.getBoundingClientRect().top;K.style.height=N;var L=(J===100);K.removeChild(M);K.scrollTop=O;return L}return null};var s=function(J){J=J||window.event;if(J.preventDefault){J.preventDefault()}J.returnValue=false};m.init=function(){m.options=a.extend({},a.ScrollToFixed.defaultOptions,i);z=H.css("z-index");m.$el.css("z-index",m.options.zIndex);u=a("<div />");I=H.css("position");F=H.css("position");k=H.css("float");e=H.css("top");if(h()){m.$el.after(u)}a(window).bind("resize.ScrollToFixed",D);a(window).bind("scroll.ScrollToFixed",G);if("ontouchmove" in window){a(window).bind("touchmove.ScrollToFixed",B)}if(m.options.preFixed){H.bind("preFixed.ScrollToFixed",m.options.preFixed)}if(m.options.postFixed){H.bind("postFixed.ScrollToFixed",m.options.postFixed)}if(m.options.preUnfixed){H.bind("preUnfixed.ScrollToFixed",m.options.preUnfixed)}if(m.options.postUnfixed){H.bind("postUnfixed.ScrollToFixed",m.options.postUnfixed)}if(m.options.preAbsolute){H.bind("preAbsolute.ScrollToFixed",m.options.preAbsolute)}if(m.options.postAbsolute){H.bind("postAbsolute.ScrollToFixed",m.options.postAbsolute)}if(m.options.fixed){H.bind("fixed.ScrollToFixed",m.options.fixed)}if(m.options.unfixed){H.bind("unfixed.ScrollToFixed",m.options.unfixed)}if(m.options.spacerClass){u.addClass(m.options.spacerClass)}H.bind("resize.ScrollToFixed",function(){u.height(H.height())});H.bind("scroll.ScrollToFixed",function(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");B()});H.bind("detach.ScrollToFixed",function(J){s(J);H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");a(window).unbind("resize.ScrollToFixed",D);a(window).unbind("scroll.ScrollToFixed",G);H.unbind(".ScrollToFixed");u.remove();m.$el.removeData("ScrollToFixed")});D()};m.init()};a.ScrollToFixed.defaultOptions={marginTop:0,limit:0,bottom:-1,zIndex:1000,baseClassName:"scroll-to-fixed-fixed"};a.fn.scrollToFixed=function(b){return this.each(function(){(new a.ScrollToFixed(this,b))})}})(jQuery);