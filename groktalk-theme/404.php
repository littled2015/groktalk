<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main error-404-page">
    <section class="error-404 not-found">
        <div class="container">
            <div class="error-content">
                <div class="error-animation">
                    <!-- Cosmic 404 Animation -->
                    <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="100" r="90" fill="none" stroke="var(--neon-green)" stroke-width="2" stroke-dasharray="5,5" opacity="0.3">
                            <animateTransform attributeName="transform" type="rotate" from="0 100 100" to="360 100 100" dur="20s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="100" cy="100" r="70" fill="none" stroke="var(--electric-purple)" stroke-width="2" stroke-dasharray="3,3" opacity="0.5">
                            <animateTransform attributeName="transform" type="rotate" from="360 100 100" to="0 100 100" dur="15s" repeatCount="indefinite"/>
                        </circle>
                        <text x="100" y="90" text-anchor="middle" fill="var(--text-white)" font-size="40" font-weight="bold">404</text>
                        <text x="100" y="120" text-anchor="middle" fill="var(--neon-green)" font-size="20">Not Found</text>
                    </svg>
                </div>
                
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Lost in Space?', 'groktalk' ); ?></h1>
                    <p class="error-message"><?php esc_html_e( 'Oops! That page seems to have drifted into another dimension.', 'groktalk' ); ?></p>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e( 'The page you\'re looking for doesn\'t exist. But don\'t worry, our AI can help you find what you need!', 'groktalk' ); ?></p>
                    
                    <div class="error-actions">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                            <?php esc_html_e( 'Return to Home', 'groktalk' ); ?>
                        </a>
                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <?php esc_html_e( 'Go Back', 'groktalk' ); ?>
                        </a>
                    </div>

                    <div class="search-section">
                        <h3><?php esc_html_e( 'Search for what you need:', 'groktalk' ); ?></h3>
                        <?php get_search_form(); ?>
                    </div>

                    <div class="suggested-links">
                        <h3><?php esc_html_e( 'Explore These Instead:', 'groktalk' ); ?></h3>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/ai-solutions/' ) ); ?>" class="cosmic-link">AI Solutions</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="cosmic-link">Latest AI News</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cosmic-link">Contact @grokgirl</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<style>
.error-404-page {
    padding: 5rem 0;
    background: linear-gradient(135deg, var(--midnight-black), var(--cosmic-blue));
    min-height: 70vh;
}

.error-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.error-animation {
    margin-bottom: 2rem;
}

.page-title {
    font-size: 3rem;
    color: var(--neon-green);
    margin-bottom: 1rem;
}

.error-message {
    font-size: 1.25rem;
    color: var(--text-light-grey);
    margin-bottom: 2rem;
}

.error-actions {
    margin: 2rem 0;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.search-section {
    margin: 3rem 0;
    background-color: var(--cosmic-web-grey);
    padding: 2rem;
    border-radius: 10px;
}

.search-section h3 {
    color: var(--text-white);
    margin-bottom: 1rem;
}

.suggested-links {
    margin-top: 3rem;
}

.suggested-links h3 {
    color: var(--text-white);
    margin-bottom: 1rem;
}

.suggested-links ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.cosmic-link {
    color: var(--electric-purple);
    transition: all 0.3s ease;
    text-decoration: underline;
}

.cosmic-link:hover {
    color: var(--neon-green);
}
</style>