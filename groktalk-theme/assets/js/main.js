// Main JavaScript for GrokTalk Theme
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize theme functionality
        initTheme();
    });
    
    function initTheme() {
        // Initialize scroll animations
        initScrollAnimations();
        
        // Initialize forms
        initForms();
        
        // Initialize any page-specific functionality
        initPageSpecific();
    }
    
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);
        
        // Observe elements with animation class
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
    }
    
    function initForms() {
        // Initialize newsletter forms
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const email = $form.find('input[type="email"]').val();
            
            // Add your form submission logic here
            console.log('Newsletter subscription:', email);
            
            // Show success message
            showNotification('Thank you for subscribing!', 'success');
        });
        
        // Initialize contact forms
        $('.contact-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const formData = new FormData(this);
            
            // Add your form submission logic here
            
            showNotification('Message sent successfully!', 'success');
        });
    }
    
    function initPageSpecific() {
        const $body = $('body');
        
        // AI Talent page specific
        if ($body.hasClass('ai-talent-template')) {
            // Add any AI talent page specific functionality
            console.log('AI Talent page initialized');
        }
        
        // Innovation spotlight page specific
        if ($body.hasClass('innovation-spotlight-template')) {
            // Add any innovation spotlight page specific functionality
            console.log('Innovation Spotlight page initialized');
        }
        
        // Solutions hub page specific
        if ($body.hasClass('solutions-hub-template')) {
            // Add any solutions hub page specific functionality
            console.log('Solutions Hub page initialized');
        }
    }
    
    function showNotification(message, type) {
        const notification = $('<div>')
            .addClass(`notification notification-${type}`)
            .text(message);
        
        $('body').append(notification);
        
        setTimeout(() => {
            notification.addClass('show');
        }, 10);
        
        setTimeout(() => {
            notification.removeClass('show');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        const target = $(this.getAttribute('href'));
        
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 600);
        }
    });
    
})(jQuery);