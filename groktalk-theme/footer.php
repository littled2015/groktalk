</main><!-- #content -->

<!-- Cosmic Footer -->
<footer class="site-footer">
    <div class="cosmic-background"></div>
    <div class="neon-grid"></div>
    
    <div class="container">
        <div class="footer-content">
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer menu', 'groktalk'); ?>">
                    <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'container' => false,
                        'depth' => 1,
                    )); 
                    ?>
                </nav>
            <?php endif; ?>
            
            <div class="social-links">
                <?php 
                // Function to display social links
                if (function_exists('groktalk_display_social_links')) {
                    groktalk_display_social_links();
                } else {
                    // Fallback social links if function doesn't exist
                    echo '<a href="#" class="social-link twitter" aria-label="Twitter">';
                    echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">';
                    echo '<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>';
                    echo '</svg>';
                    echo '</a>';
                    
                    echo '<a href="#" class="social-link linkedin" aria-label="LinkedIn">';
                    echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">';
                    echo '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>';
                    echo '<rect x="2" y="9" width="4" height="12"></rect>';
                    echo '<circle cx="4" cy="4" r="2"></circle>';
                    echo '</svg>';
                    echo '</a>';
                }
                ?>
            </div>
            
            <div class="disclaimer">
                <p><?php esc_html_e('Not affiliated with Grok, xAI, X, Elon Musk or related companies', 'groktalk'); ?></p>
                <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?> • 
                   <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Privacy Policy', 'groktalk'); ?></a> • 
                   <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>"><?php esc_html_e('Terms of Service', 'groktalk'); ?></a>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Footer cosmos animation script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add cosmic background effects to footer
            const footer = document.querySelector('.site-footer');
            
            // Create stars for footer
            const starsContainer = document.createElement('div');
            starsContainer.className = 'stars';
            footer.prepend(starsContainer);
            
            // Add random stars
            const starCount = Math.floor(window.innerWidth / 6); // Less stars than hero
            
            for (let i = 0; i < starCount; i++) {
                const size = Math.random() * 2 + 1; // Smaller stars
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const opacity = Math.random() * 0.4 + 0.2; // More subtle
                const animationDelay = Math.random() * 3;
                const animationDuration = Math.random() * 2 + 3;
                
                const star = document.createElement('div');
                star.className = 'star';
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                star.style.left = posX + '%';
                star.style.top = posY + '%';
                star.style.opacity = opacity;
                star.style.animationDelay = animationDelay + 's';
                star.style.animationDuration = animationDuration + 's';
                
                starsContainer.appendChild(star);
            }
            
            // Back to top button functionality
            const backToTopButton = document.querySelector('.back-to-top');
            
            if (backToTopButton) {
                // Show/hide based on scroll position
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 300) {
                        backToTopButton.classList.add('active');
                    } else {
                        backToTopButton.classList.remove('active');
                    }
                });
                
                // Scroll to top when clicked
                backToTopButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>
</footer>

<?php wp_footer(); ?>

</body>
</html>