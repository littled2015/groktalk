<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main error-404-page">
    <div class="cosmic-background"></div>
    <div class="neon-grid"></div>
    <div class="stars"></div>
    <div class="particles">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>
    <div class="grid-lines"></div>
    
    <section class="error-404 not-found">
        <div class="container">
            <div class="error-content">
                <div class="cosmic-decoration top-left"></div>
                <div class="cosmic-decoration bottom-right"></div>
                
                <div class="error-animation">
                    <!-- Cosmic 404 Animation -->
                    <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="error-svg">
                        <circle cx="100" cy="100" r="90" class="error-circle-outer">
                            <animateTransform attributeName="transform" type="rotate" from="0 100 100" to="360 100 100" dur="20s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="100" cy="100" r="70" class="error-circle-inner">
                            <animateTransform attributeName="transform" type="rotate" from="360 100 100" to="0 100 100" dur="15s" repeatCount="indefinite"/>
                        </circle>
                        <text x="100" y="90" text-anchor="middle" class="error-text-main">404</text>
                        <text x="100" y="120" text-anchor="middle" class="error-text-sub">Not Found</text>
                    </svg>
                    
                    <div class="orbit-text">404</div>
                    <div class="orbit-text">ERR</div>
                    <div class="orbit-text">LOST</div>
                </div>
                
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Lost in Space?', 'groktalk' ); ?></h1>
                    <p class="error-message"><?php esc_html_e( 'Oops! That page seems to have drifted into another dimension.', 'groktalk' ); ?></p>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e( 'The page you\'re looking for doesn\'t exist. But don\'t worry, our AI can help you find what you need!', 'groktalk' ); ?></p>
                    
                    <div class="error-actions">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary interactive-element">
                            <?php esc_html_e( 'Return to Home', 'groktalk' ); ?>
                        </a>
                        <a href="javascript:history.back()" class="btn btn-secondary interactive-element">
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
    
    <!-- Add space shuttle element -->
    <div class="space-shuttle">
        <svg width="100" height="60" viewBox="0 0 100 60" xmlns="http://www.w3.org/2000/svg" class="shuttle-svg">
            <path d="M95,30 L80,15 C75,10 70,10 65,10 L20,10 C15,10 10,15 5,20 L0,30 L5,40 C10,45 15,50 20,50 L65,50 C70,50 75,50 80,45 L95,30 Z" class="shuttle-path"/>
        </svg>
    </div>
</main>

<!-- Add custom styles specifically for 404 SVG elements -->
<style>
/* SVG Styles for the 404 page that don't rely on CSS variables directly in inline attributes */
.error-svg .error-circle-outer {
    fill: none;
    stroke: #7928CA; /* electric-purple */
    stroke-width: 2;
    stroke-dasharray: 5,5;
    opacity: 0.3;
}

.error-svg .error-circle-inner {
    fill: none;
    stroke: #9046CF; /* soft-purple */
    stroke-width: 2;
    stroke-dasharray: 3,3;
    opacity: 0.5;
}

.error-svg .error-text-main {
    fill: #FFFFFF; /* text-white */
    font-size: 40px;
    font-weight: bold;
}

.error-svg .error-text-sub {
    fill: #7928CA; /* electric-purple */
    font-size: 20px;
}

.shuttle-svg .shuttle-path {
    fill: url(#shuttleGradient);
}

/* Add the gradient definition inside a new defs element */
.shuttle-svg {
    position: relative;
}

.shuttle-svg:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: linear-gradient(90deg, #39FF14, #7928CA);
    clip-path: path('M95,30 L80,15 C75,10 70,10 65,10 L20,10 C15,10 10,15 5,20 L0,30 L5,40 C10,45 15,50 20,50 L65,50 C70,50 75,50 80,45 L95,30 Z');
}
</style>

<?php get_footer(); ?>