<footer class="site-footer">
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
                <?php groktalk_display_social_links(); ?>
            </div>
            
            <div class="disclaimer">
                <p><?php esc_html_e('Not affiliated with Grok, xAI, X, Elon Musk or related companies', 'groktalk'); ?></p>
                <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?> • 
                   <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Privacy Policy', 'groktalk'); ?></a> • 
                   <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>"><?php esc_html_e('Terms of Service', 'groktalk'); ?></a>
                </p>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>