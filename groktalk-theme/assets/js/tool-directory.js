/**
 * JavaScript for AI Tool Directory functionality
 */
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize tool directory functionality
        initToolDirectory();
    });
    
    function initToolDirectory() {
        // Tool category filtering
        initCategoryFilters();
        
        // Load more button functionality
        initLoadMore();
        
        // Comparison functionality
        initToolComparison();
        
        // Initialize search
        initToolSearch();
        
        // Handle any tool submission form
        initToolSubmission();
    }
    
    function initCategoryFilters() {
        const $filterPills = $('.category-pill');
        const $toolCards = $('.tool-card');
        
        if (!$filterPills.length || !$toolCards.length) {
            return;
        }
        
        $filterPills.on('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all pills
            $filterPills.removeClass('active');
            
            // Add active class to clicked pill
            $(this).addClass('active');
            
            // Get the category to filter by
            const category = $(this).data('category');
            
            // Show/hide tool cards based on category
            if (category === 'all') {
                $toolCards.fadeIn();
            } else {
                $toolCards.each(function() {
                    const cardCategories = $(this).data('categories') ? $(this).data('categories').split(',') : [];
                    if (cardCategories.includes(category)) {
                        $(this).fadeIn();
                    } else {
                        $(this).fadeOut();
                    }
                });
            }
        });
    }
    
    function initLoadMore() {
        const $loadMoreBtn = $('.load-more .btn');
        
        if (!$loadMoreBtn.length) {
            return;
        }
        
        // In a real implementation, this would fetch more tools via AJAX
        $loadMoreBtn.on('click', function() {
            // Show a loading indicator
            $(this).text('Loading...');
            
            // Simulate loading delay
            setTimeout(() => {
                // For demo purposes, we'll just update the button text
                $(this).text('All Tools Loaded');
                $(this).prop('disabled', true);
            }, 1500);
        });
    }
    
    function initToolComparison() {
        const $comparisonBtn = $('.comparison-buttons .btn-secondary');
        const $comparisonLinks = $('.comparison-link');
        
        if (!$comparisonBtn.length) {
            return;
        }
        
        // In a real implementation, this would open a tool selection modal
        $comparisonBtn.on('click', function() {
            alert('Tool comparison feature is coming soon! This would open a selection modal in the final implementation.');
        });
        
        // Handle comparison links
        $comparisonLinks.on('click', function(e) {
            e.preventDefault();
            alert('This would load a comparison between the selected tools in the final implementation.');
        });
    }
    
    function initToolSearch() {
        const $searchForm = $('.tool-search form');
        
        if (!$searchForm.length) {
            return;
        }
        
        // Handle search form submission
        $searchForm.on('submit', function(e) {
            // In a demo, we'll just alert instead of submitting
            // In a real implementation, this would work normally
            const searchQuery = $(this).find('input[type="search"]').val();
            
            if (searchQuery.trim() === '') {
                return true; // Allow empty search to proceed normally
            }
            
            // For demo purposes only
            if (window.location.href.includes('page-templates')) {
                e.preventDefault();
                alert('Search functionality will be implemented in the final version. You searched for: ' + searchQuery);
            }
        });
    }
    
    function initToolSubmission() {
        const $submissionForm = $('#ai-tool-submission-form');
        
        if (!$submissionForm.length) {
            return;
        }
        
        // Character counter for description field
        const $descriptionField = $('#tool-description');
        const $charCount = $('#char-count');
        
        if ($descriptionField.length && $charCount.length) {
            $descriptionField.on('input', function() {
                $charCount.text($(this).val().length);
            });
        }
        
        // Listing plan selection highlight
        const $listingPlan = $('#listing-plan');
        const $planCards = $('.plan-card');
        
        if ($listingPlan.length && $planCards.length) {
            $listingPlan.on('change', function() {
                const selectedPlan = $(this).val();
                
                // Remove highlight from all plan cards
                $planCards.removeClass('selected');
                
                // Add highlight to selected plan card
                if (selectedPlan) {
                    $planCards.each(function() {
                        if ($(this).find('.plan-name').text().toLowerCase().includes(selectedPlan)) {
                            $(this).addClass('selected');
                        }
                    });
                }
            });
        }
        
        // FAQ toggles
        const $faqItems = $('.faq-item');
        
        $faqItems.each(function() {
            const $question = $(this).find('.faq-question');
            const $answer = $(this).find('.faq-answer');
            const $icon = $question.find('.toggle-icon');
            
            $question.on('click', function() {
                // Toggle answer visibility
                if ($answer.is(':visible')) {
                    $answer.slideUp();
                    $icon.text('+');
                } else {
                    $answer.slideDown();
                    $icon.text('-');
                }
                
                // Toggle active class
                $(this).parent().toggleClass('active');
            });
        });
        
        // Form submission (for demo purposes)
        $submissionForm.on('submit', function(e) {
            // For demo purposes, prevent actual submission
            if (window.location.href.includes('page-templates')) {
                e.preventDefault();
                
                // Validate form
                if (this.checkValidity()) {
                    // Show success message
                    alert('Thank you for your submission! We will review your tool within 2-3 business days.');
                    
                    // Reset form
                    this.reset();
                } else {
                    // Let the browser handle validation
                    $(this).find(':invalid').first().focus();
                }
            }
        });
    }
    
})(jQuery);