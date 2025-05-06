// Custom 404 page animations and effects
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize 404 page effects
        init404Page();
    });
    
    function init404Page() {
        // Create star field
        createStarField();
        
        // Create floating particles
        createParticles();
        
        // Create code rain effect
        createCodeRain();
        
        // Create orbiting elements
        createOrbitingElements();
        
        // Add space shuttle
        addSpaceShuttle();
        
        // Add interactive elements
        addInteractiveElements();
    }
    
    function createStarField() {
        const $errorPage = $('.error-404-page');
        
        if (!$errorPage.length) return;
        
        // Create stars container if it doesn't exist
        if (!$('.stars').length) {
            $errorPage.prepend('<div class="stars"></div>');
        }
        
        const $stars = $('.stars');
        
        // Add random stars
        const starCount = Math.floor($(window).width() / 3); // Responsive star count
        
        for (let i = 0; i < starCount; i++) {
            const size = Math.random() * 3 + 1;
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            const opacity = Math.random() * 0.5 + 0.3;
            const animationDelay = Math.random() * 3;
            const animationDuration = Math.random() * 2 + 2;
            
            const $star = $('<div class="star"></div>').css({
                'width': size + 'px',
                'height': size + 'px',
                'left': posX + '%',
                'top': posY + '%',
                'opacity': opacity,
                'animation-delay': animationDelay + 's',
                'animation-duration': animationDuration + 's'
            });
            
            $stars.append($star);
        }
    }
    
    function createParticles() {
        const $errorPage = $('.error-404-page');
        
        if (!$errorPage.length) return;
        
        // Create particles container if it doesn't exist
        if (!$('.particles').length) {
            $errorPage.prepend('<div class="particles"></div>');
        }
        
        // Note: Particles are already added in the HTML structure
        // This function remains in case we need to add more dynamic particles
    }
    
    function createCodeRain() {
        const $errorPage = $('.error-404-page');
        
        if (!$errorPage.length) return;
        
        // Create code rain container if it doesn't exist
        if (!$('.code-rain').length) {
            $errorPage.prepend('<div class="code-rain"></div>');
        }
        
        const $codeRain = $('.code-rain');
        const characters = '01';
        const columnCount = Math.floor($(window).width() / 20); // Responsive column count
        
        for (let i = 0; i < columnCount; i++) {
            const speed = Math.random() * 20 + 10;
            const delay = Math.random() * 30;
            const posX = (i / columnCount) * 100;
            
            let codeString = '';
            const codeLength = Math.floor(Math.random() * 20) + 10;
            
            for (let j = 0; j < codeLength; j++) {
                codeString += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            
            const $codeColumn = $('<div class="code-column"></div>').css({
                'left': posX + '%',
                'animation-duration': speed + 's',
                'animation-delay': delay + 's'
            }).text(codeString);
            
            $codeRain.append($codeColumn);
        }
    }
    
    function createOrbitingElements() {
        const $errorAnimation = $('.error-animation');
        
        if (!$errorAnimation.length) return;
        
        // Orbit texts are already added in the HTML structure
        // This function remains in case we need to create more dynamic orbiting elements
    }
    
    function addSpaceShuttle() {
        // Space shuttle is already added in the HTML structure
        // This function remains in case we need to adjust the space shuttle dynamically
    }
    
    function addInteractiveElements() {
        const $errorContent = $('.error-content');
        
        if (!$errorContent.length) return;
        
        // Add cosmic decorations - already added in HTML structure
        
        // Add parallax effect
        $(window).on('mousemove', function(e) {
            const width = $(window).width();
            const height = $(window).height();
            const mouseX = e.clientX;
            const mouseY = e.clientY;
            
            const moveX = (mouseX - width/2) / width * 30;
            const moveY = (mouseY - height/2) / height * 30;
            
            $('.cosmic-background').css({
                'transform': `translate(${moveX}px, ${moveY}px)`
            });
            
            $('.grid-lines').css({
                'transform': `translate(${moveX/2}px, ${moveY/2}px)`
            });
            
            $('.error-content').css({
                'transform': `translate(${-moveX/10}px, ${-moveY/10}px)`
            });
        });
        
        // Add search form animations
        $('.search-field').on('focus', function() {
            $(this).closest('.search-form-inner').css({
                'box-shadow': '0 0 20px rgba(121, 40, 202, 0.3)'
            });
        }).on('blur', function() {
            $(this).closest('.search-form-inner').css({
                'box-shadow': '0 0 15px rgba(121, 40, 202, 0.1)'
            });
        });
    }
    
})(jQuery);