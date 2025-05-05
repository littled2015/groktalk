// Mobile menu functionality for GrokTalk Theme
(function($) {
    'use strict';
    
    $(document).ready(function() {
        $('.mobile-menu-toggle').on('click', function() {
            var $this = $(this);
            var $nav = $('.main-navigation');
            
            $nav.toggleClass('active');
            $this.toggleClass('active');
            $this.attr('aria-expanded', $nav.hasClass('active'));
        });
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                $('.main-navigation').removeClass('active');
                $('.mobile-menu-toggle').removeClass('active').attr('aria-expanded', 'false');
            }
        });
        
        // Handle window resize
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if ($(window).width() > 768) {
                    $('.main-navigation').removeClass('active');
                    $('.mobile-menu-toggle').removeClass('active').attr('aria-expanded', 'false');
                }
            }, 250);
        });
    });
})(jQuery);