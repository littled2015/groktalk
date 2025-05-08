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
            
            // Add CSS for code rain container
            const cssStyle = `
                <style>
                    .code-rain {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        z-index: 3;
                        pointer-events: none;
                    }
                    
                    .code-column {
                        position: absolute;
                        top: -100px;
                        color: rgba(121, 40, 202, 0.6);
                        font-family: monospace;
                        font-size: 16px;
                        font-weight: bold;
                        text-shadow: 0 0 5px rgba(121, 40, 202, 0.8);
                        animation: codeRain linear infinite;
                    }
                    
                    @keyframes codeRain {
                        0% {
                            transform: translateY(-100%);
                        }
                        100% {
                            transform: translateY(100vh);
                        }
                    }
                </style>
            `;
            
            $('head').append(cssStyle);
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
        
        // Add CSS for orbiting elements if not present
        if (!$('.orbit-styles').length) {
            const orbitStyles = `
                <style class="orbit-styles">
                    .orbit-text {
                        position: absolute;
                        font-weight: bold;
                        color: rgba(121, 40, 202, 0.7);
                        text-shadow: 0 0 8px rgba(121, 40, 202, 0.5);
                        animation: orbit linear infinite;
                        font-size: 24px;
                    }
                    
                    .orbit-text:nth-child(2) {
                        animation-duration: 12s;
                        animation-delay: -4s;
                    }
                    
                    .orbit-text:nth-child(3) {
                        animation-duration: 16s;
                        animation-delay: -8s;
                    }
                    
                    .orbit-text:nth-child(4) {
                        animation-duration: 20s;
                        animation-delay: -12s;
                    }
                    
                    @keyframes orbit {
                        0% {
                            transform: rotate(0deg) translateX(120px) rotate(0deg);
                        }
                        100% {
                            transform: rotate(360deg) translateX(120px) rotate(-360deg);
                        }
                    }
                </style>
            `;
            
            $('head').append(orbitStyles);
        }
        
        // Orbit texts are already added in the HTML structure
        // This function remains in case we need to create more dynamic orbiting elements
    }
    
    function addSpaceShuttle() {
        // Space shuttle is already added in the HTML structure
        // Add animation for space shuttle
        const shuttleAnimation = `
            <style class="shuttle-styles">
                .space-shuttle {
                    position: absolute;
                    bottom: 100px;
                    left: -100px;
                    animation: shuttleFly 20s linear infinite;
                    filter: drop-shadow(0 0 10px rgba(121, 40, 202, 0.6));
                }
                
                @keyframes shuttleFly {
                    0% {
                        transform: translateX(-100px) translateY(0) rotate(10deg);
                    }
                    50% {
                        transform: translateX(calc(100vw + 100px)) translateY(-100px) rotate(10deg);
                    }
                    50.01% {
                        transform: translateX(calc(100vw + 100px)) translateY(100px) rotate(-190deg);
                    }
                    100% {
                        transform: translateX(-100px) translateY(0) rotate(-190deg);
                    }
                }
            </style>
        `;
        
        if (!$('.shuttle-styles').length) {
            $('head').append(shuttleAnimation);
        }
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