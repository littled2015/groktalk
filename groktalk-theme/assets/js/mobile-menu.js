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
        var $menuItems = $('.nav-menu > li');
        
        if (!$toggle.length || !$nav.length) {
            return;
        }
        
        // Add animation delay to menu items
        $menuItems.each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
        });
        
        // Toggle menu on click
        $toggle.on('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });
        
        // Handle submenu toggles
        $('.nav-menu .menu-item-has-children > a').on('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const $parent = $(this).parent();
                const $submenu = $parent.find('.sub-menu');
                
                $parent.toggleClass('submenu-open');
                
                // Toggle submenu visibility
                if ($parent.hasClass('submenu-open')) {
                    $submenu.slideDown(300);
                } else {
                    $submenu.slideUp(300);
                }
            }
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
                    
                    // Reset submenu states on desktop
                    $('.menu-item-has-children').removeClass('submenu-open');
                    $('.sub-menu').css('display', '');
                }
            }, 250);
        });
        
        // Add neon glow effect to menu items on hover
        $('.nav-menu li a').on({
            mouseenter: function() {
                $(this).addClass('glow-animation');
            },
            mouseleave: function() {
                $(this).removeClass('glow-animation');
            }
        });
        
        // Prevent scrolling when menu is open
        function preventScroll() {
            $body.css('overflow', 'hidden');
            $body.css('position', 'fixed');
            $body.css('width', '100%');
            $body.css('top', -$(window).scrollTop() + 'px');
            $body.data('scrollTop', $(window).scrollTop());
        }
        
        function enableScroll() {
            $body.css('overflow', '');
            $body.css('position', '');
            $body.css('width', '');
            $body.css('top', '');
            
            // Restore scroll position
            if ($body.data('scrollTop') !== undefined) {
                $(window).scrollTop($body.data('scrollTop'));
            }
        }
        
        function toggleMenu() {
            $nav.toggleClass('active');
            $toggle.toggleClass('active');
            
            // Toggle accessibility attributes
            var expanded = $nav.hasClass('active');
            $toggle.attr('aria-expanded', expanded);
            
            // Toggle body scroll
            if (expanded) {
                preventScroll();
                
                // Add animation to menu items
                $menuItems.addClass('fade-in-item');
            } else {
                enableScroll();
                
                // Remove animation from menu items
                $menuItems.removeClass('fade-in-item');
            }
        }
        
        function closeMenu() {
            $nav.removeClass('active');
            $toggle.removeClass('active');
            $toggle.attr('aria-expanded', 'false');
            enableScroll();
            $menuItems.removeClass('fade-in-item');
        }
        
        // Add initial accessibility attributes
        $toggle.attr('aria-expanded', 'false');
        $toggle.attr('aria-label', 'Toggle navigation menu');
        
        // Add cosmic animation to toggle button
        $toggle.append('<span class="toggle-glow"></span>');
        
        // Enhanced toggle animation
        $toggle.on({
            mouseenter: function() {
                $(this).find('.toggle-glow').addClass('active');
            },
            mouseleave: function() {
                $(this).find('.toggle-glow').removeClass('active');
            }
        });
    }
})(jQuery);