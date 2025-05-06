// Main JavaScript for GrokTalk Theme
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize theme functionality
        initTheme();
    });
    
    function initTheme() {
        // Initialize animations
        initAnimations();
        
        // Initialize mobile menu
        initMobileMenu();
        
        // Initialize parallax effects
        initParallax();
        
        // Initialize forms
        initForms();
        
        // Initialize scroll effects
        initScrollEffects();
        
        // Initialize cosmic background
        initCosmicBackground();
        
        // Initialize any page-specific functionality
        initPageSpecific();
    }
    
    function initAnimations() {
        // Animate elements when they come into view
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    
                    // If it's a counter element, start counting
                    if (entry.target.classList.contains('stat-number')) {
                        animateCounter(entry.target);
                    }
                }
            });
        }, observerOptions);
        
        // Observe elements with animation class
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
        
        // Observe stat counters
        document.querySelectorAll('.stat-number').forEach(el => {
            observer.observe(el);
        });
        
        // Text typing effect for hero titles
        const heroTitle = document.querySelector('.hero-title');
        if (heroTitle && !heroTitle.classList.contains('no-type-effect')) {
            initTypeEffect(heroTitle);
        }
    }
    
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count') || element.innerText, 10);
        const duration = 2000; // 2 seconds
        const step = 30; // Update every 30ms
        const increment = target / (duration / step);
        
        let current = 0;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, step);
    }
    
    function initTypeEffect(element) {
        const text = element.innerText;
        element.innerText = '';
        element.style.visibility = 'visible';
        
        let i = 0;
        const speed = 50; // Typing speed in milliseconds
        
        function typeWriter() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }
        
        // Start the typing effect
        setTimeout(typeWriter, 500);
    }
    
    function initMobileMenu() {
        const $toggle = $('.mobile-menu-toggle');
        const $nav = $('.main-navigation');
        const $body = $('body');
        
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
        let resizeTimer;
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
    
    function initParallax() {
        // Simple parallax effect for background elements
        $(window).on('scroll', function() {
            const scrolled = $(window).scrollTop();
            
            $('.parallax-bg').each(function() {
                const $this = $(this);
                const speed = $this.data('speed') || 0.3;
                
                $this.css('transform', `translateY(${scrolled * speed}px)`);
            });
            
            // Floating elements
            $('.float-element').each(function() {
                const $this = $(this);
                const speed = $this.data('float-speed') || 0.1;
                const direction = $this.data('float-direction') || 1;
                
                $this.css('transform', `translateY(${Math.sin(scrolled * speed) * 10 * direction}px)`);
            });
        });
    }
    
    function initForms() {
        // Newsletter and contact form submissions
        $('.newsletter-form, .contact-form, .lead-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $button = $form.find('button[type="submit"]');
            const originalText = $button.text();
            
            // Disable button and show loading state
            $button.prop('disabled', true).text('Processing...');
            
            // Simulate form submission (replace with actual AJAX request)
            setTimeout(function() {
                $button.prop('disabled', false).text(originalText);
                
                // Show success message
                showNotification('Form submitted successfully!', 'success');
                
                // Optional: clear form
                $form.get(0).reset();
            }, 1500);
        });
    }
    
    function initScrollEffects() {
        // Highlight active menu item on scroll
        const $sections = $('section[id]');
        const $navItems = $('.nav-menu a');
        
        if ($sections.length) {
            $(window).on('scroll', function() {
                const scrollPosition = $(window).scrollTop() + 100;
                
                $sections.each(function() {
                    const $section = $(this);
                    const sectionTop = $section.offset().top;
                    const sectionBottom = sectionTop + $section.outerHeight();
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                        $navItems.removeClass('active');
                        $navItems.filter(`[href="#${$section.attr('id')}"]`).addClass('active');
                    }
                });
            });
        }
        
        // Smooth scroll for anchor links
        $('a[href^="#"]:not([href="#"])').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutExpo');
                
                // Close mobile menu if open
                if ($('.main-navigation').hasClass('active')) {
                    $('.mobile-menu-toggle').trigger('click');
                }
            }
        });
        
        // Back to top button
        const $backToTop = $('.back-to-top');
        
        if ($backToTop.length) {
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 300) {
                    $backToTop.addClass('active');
                } else {
                    $backToTop.removeClass('active');
                }
            });
            
            $backToTop.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, 800, 'easeInOutExpo');
            });
        }
    }
    
    function initCosmicBackground() {
        // Create an animated cosmic background for hero sections
        const $heroSections = $('.hero-section, .cosmic-section');
        
        if ($heroSections.length && !$heroSections.find('.neon-grid').length) {
            $heroSections.each(function() {
                const $section = $(this);
                
                // Add neon grid
                $section.append('<div class="neon-grid"></div>');
                
                // Add star particles if enabled
                if ($section.hasClass('with-stars') || $section.data('stars')) {
                    createStars($section);
                }
            });
        }
    }
    
    function createStars($container) {
        const $starsContainer = $('<div class="stars-container"></div>');
        const starCount = $container.data('star-count') || 50;
        
        for (let i = 0; i < starCount; i++) {
            const size = Math.random() * 3 + 1;
            const $star = $('<div class="star"></div>').css({
                width: `${size}px`,
                height: `${size}px`,
                left: `${Math.random() * 100}%`,
                top: `${Math.random() * 100}%`,
                animationDelay: `${Math.random() * 5}s`,
                animationDuration: `${Math.random() * 5 + 3}s`
            });
            
            $starsContainer.append($star);
        }
        
        $container.append($starsContainer);
    }
    
    function initPageSpecific() {
        const $body = $('body');
        
        // AI Talent page specific
        if ($body.hasClass('ai-talent-template')) {
            initSkillBars();
        }
        
        // Innovation spotlight page specific
        if ($body.hasClass('innovation-spotlight-template')) {
            initChatbot();
        }
        
        // Blog page specific
        if ($body.hasClass('blog-layout')) {
            initFilterTags();
        }
    }
    
    function initSkillBars() {
        $('.skill-bar').each(function() {
            const $bar = $(this);
            const $progress = $bar.find('.progress');
            const percentage = $bar.data('percentage');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        $progress.css('width', percentage + '%');
                        observer.unobserve(entry.target);
                    }
                });
            }, {threshold: 0.5});
            
            observer.observe($bar[0]);
        });
    }
    
    function initChatbot() {
        // Initialize chatbot if elements exist
        const $startButton = $('#start-chatbot');
        const $chatInterface = $('.chatbot-interface');
        
        if (!$startButton.length || !$chatInterface.length) {
            return;
        }
        
        // Start chatbot button click
        $startButton.on('click', function() {
            $chatInterface.slideDown(300);
            $startButton.hide();
            
            // Add initial greeting message
            addBotMessage('Hello! I\'m here to help you with AI-related questions. How can I assist you today?');
        });
        
        // Close chatbot button
        $('.chatbot-close').on('click', function() {
            $chatInterface.slideUp(300);
            $startButton.show();
        });
        
        // Send message on button click
        $('.chat-input button').on('click', function() {
            sendMessage();
        });
        
        // Send message on Enter key
        $('.chat-input input').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                sendMessage();
            }
        });
        
        function sendMessage() {
            const $input = $('.chat-input input');
            const message = $input.val().trim();
            
            if (message === '') return;
            
            // Add user message to chat
            addUserMessage(message);
            
            // Clear input
            $input.val('');
            
            // Show typing indicator
            showTypingIndicator();
            
            // Simulate response (replace with actual AJAX request to your chatbot API)
            setTimeout(function() {
                hideTypingIndicator();
                
                // Generate a simple response (replace with actual chatbot response)
                const responses = [
                    "I understand your interest in " + message + ". Let me share some insights about that.",
                    "That's an interesting question about " + message + ". Here's what I know.",
                    "When it comes to " + message + ", there are several approaches to consider.",
                    "I'd be happy to help you understand more about " + message + ".",
                    "Let me process your question about " + message + " and provide some information."
                ];
                
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                addBotMessage(randomResponse);
            }, 1500);
        }
        
        function addUserMessage(message) {
            const messageHtml = `
                <div class="message user-message">
                    <div class="message-content">${escapeHtml(message)}</div>
                    <div class="message-time">${getCurrentTime()}</div>
                </div>
            `;
            
            $('.chat-messages').append(messageHtml);
            scrollChatToBottom();
        }
        
        function addBotMessage(message) {
            const messageHtml = `
                <div class="message bot-message">
                    <div class="message-content">${message}</div>
                    <div class="message-time">${getCurrentTime()}</div>
                </div>
            `;
            
            $('.chat-messages').append(messageHtml);
            scrollChatToBottom();
        }
        
        function showTypingIndicator() {
            const indicatorHtml = `
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            `;
            
            $('.chat-messages').append(indicatorHtml);
            scrollChatToBottom();
        }
        
        function hideTypingIndicator() {
            $('.typing-indicator').remove();
        }
        
        function scrollChatToBottom() {
            const $chatMessages = $('.chat-messages');
            $chatMessages.scrollTop($chatMessages[0].scrollHeight);
        }
        
        function getCurrentTime() {
            const now = new Date();
            return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }
        
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    }
    
    function initFilterTags() {
        // Blog filter tags functionality
        const $filterTags = $('.filter-tag, .tag');
        
        if (!$filterTags.length) {
            return;
        }
        
        $filterTags.on('click', function(e) {
            e.preventDefault();
            
            const $this = $(this);
            
            // Toggle active class
            $filterTags.removeClass('active');
            $this.addClass('active');
            
            // Get filter value
            const filter = $this.data('filter');
            
            // Filter posts
            if (filter) {
                $('.blog-post-item, .archive-post').each(function() {
                    const $post = $(this);
                    
                    if (filter === 'all' || $post.hasClass(filter)) {
                        $post.fadeIn();
                    } else {
                        $post.fadeOut();
                    }
                });
            }
        });
    }
    
    function showNotification(message, type) {
        const notification = $('<div>')
            .addClass(`notification notification-${type || 'info'}`)
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
    
    // Add easing functions for smooth animations
    $.extend($.easing, {
        easeInOutExpo: function(x, t, b, c, d) {
            if (t==0) return b;
            if (t==d) return b+c;
            if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
            return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
        }
    });
    
})(jQuery);