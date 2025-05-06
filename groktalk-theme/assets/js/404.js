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
        
        // Add floating space shuttle
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
        
        const $particles = $('.particles');
        
        // Add 5 floating particles
        for (let i = 0; i < 5; i++) {
            const $particle = $('<div class="particle"></div>');
            $particles.append($particle);
        }
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
        
        // Add orbiting text elements
        const orbitTexts = ['404', 'ERR', 'NOT', 'LOST'];
        
        for (let i = 0; i < orbitTexts.length; i++) {
            const $orbitText = $('<div class="orbit-text"></div>').text(orbitTexts[i]);
            $errorAnimation.append($orbitText);
        }
    }
    
    function addSpaceShuttle() {
        const $errorPage = $('.error-404-page');
        
        if (!$errorPage.length) return;
        
        // Create space shuttle SVG
        const shuttleSvg = `
            <svg class="space-shuttle" viewBox="0 0 100 60" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="shuttleGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#39FF14" />
                        <stop offset="100%" stop-color="#8A2BE2" />
                    </linearGradient>
                    <filter id="shuttleGlow" height="130%">
                        <feGaussianBlur in="SourceAlpha" stdDeviation="3" result="blur"/>
                        <feFlood flood-color="#39FF14" flood-opacity="0.7" result="glowColor"/>
                        <feComposite in="glowColor" in2="blur" operator="in" result="softGlow"/>
                        <feMerge>
                            <feMergeNode in="softGlow"/>
                            <feMergeNode in="SourceGraphic"/>
                        </feMerge>
                    </filter>
                </defs>
                <path d="M95,30 L80,15 C75,10 70,10 65,10 L20,10 C15,10 10,15 5,20 L0,30 L5,40 C10,45 15,50 20,50 L65,50 C70,50 75,50 80,45 L95,30 Z" fill="url(#shuttleGradient)" filter="url(#shuttleGlow)"/>
                <ellipse cx="15" cy="30" rx="5" ry="10" fill="#1A1A1D"/>
                <ellipse cx="35" cy="30" rx="8" ry="15" fill="#1A1A1D"/>
                <ellipse cx="60" cy="30" rx="10" ry="18" fill="#1A1A1D"/>
                <circle cx="75" cy="30" r="3" fill="#39FF14"/>
            </svg>
        `;
        
        $errorPage.append(shuttleSvg);
    }
    
    function addInteractiveElements() {
        const $errorContent = $('.error-content');
        
        if (!$errorContent.length) return;
        
        // Add cosmic decorations
        $errorContent.append('<div class="cosmic-decoration top-left"></div>');
        $errorContent.append('<div class="cosmic-decoration bottom-right"></div>');
        
        // Make buttons interactive
        $('.error-actions .btn').addClass('interactive-element');
        
        // Add grid lines
        const $errorPage = $('.error-404-page');
        
        if (!$('.grid-lines').length) {
            $errorPage.prepend('<div class="grid-lines"></div>');
        }
        
        // Add cosmic background
        if (!$('.cosmic-background').length) {
            $errorPage.prepend('<div class="cosmic-background"></div>');
        }
        
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
                'box-shadow': '0 0 20px rgba(57, 255, 20, 0.3)'
            });
        }).on('blur', function() {
            $(this).closest('.search-form-inner').css({
                'box-shadow': '0 0 15px rgba(57, 255, 20, 0.1)'
            });
        });
    }
    
})(jQuery);