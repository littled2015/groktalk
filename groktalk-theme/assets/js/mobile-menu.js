// Mobile menu functionality for GrokTalk Theme
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize mobile menu
        initMobileMenu();
    });
    
    function initMobileMenu() {
        var $toggle = $('.mobile-menu-toggle');
        var $nav = $('.main-navigation');
        var $body = $('body');
        
        if (!$toggle.length || !$nav.length) {
            return;
        }
        
        // Toggle menu on click
        $toggle.on('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });
        
        // Close menu on escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $nav.hasClass('active')) {
                closeMenu();
            }
        });
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length && $nav.hasClass('active')) {
                closeMenu();
            }
        });
        
        // Handle window resize
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if ($(window).width() > 768) {
                    closeMenu();
                }
            }, 250);
        });
        
        // Prevent scrolling when menu is open
        function preventScroll() {
            $body.css('overflow', 'hidden');
        }
        
        function enableScroll() {
            $body.css('overflow', '');
        }
        
        function toggleMenu() {
            $nav.toggleClass('active');
            $toggle.toggleClass('active');
            
            var expanded = $nav.hasClass('active');
            $toggle.attr('aria-expanded', expanded);
            
            if (expanded) {
                preventScroll();
            } else {
                enableScroll();
            }
        }
        
        function closeMenu() {
            $nav.removeClass('active');
            $toggle.removeClass('active');
            $toggle.attr('aria-expanded', 'false');
            enableScroll();
        }
    }
})(jQuery);