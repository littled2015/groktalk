<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package GrokTalk
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('single-page'); ?>>
            
            <!-- Page Header -->
            <header class="entry-header">
                <div class="page-hero-section">
                    <div class="neon-grid"></div>
                    <div class="stars"></div>
                    <div class="particles">
                        <div class="particle particle-1"></div>
                        <div class="particle particle-2"></div>
                        <div class="particle particle-3"></div>
                        <div class="particle particle-4"></div>
                        <div class="particle particle-5"></div>
                    </div>
                    <div class="container">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="page-hero-background" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
                        <?php else : ?>
                            <div class="page-hero-background">
                        <?php endif; ?>
                                <!-- Category Badge (if applicable) -->
                                <?php
                                if (is_singular('post')) :
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) :
                                        echo '<span class="category-badge">' . esc_html( $categories[0]->name ) . '</span>';
                                    endif;
                                endif;
                                ?>
                                
                                <h1 class="entry-title page-title"><?php the_title(); ?></h1>
                                
                                <?php
                                // Check for optional subtitle/excerpt
                                $excerpt = get_the_excerpt();
                                if ( ! empty( $excerpt ) ) :
                                ?>
                                    <p class="page-subtitle"><?php echo esc_html( $excerpt ); ?></p>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
            </header><!-- .entry-header -->

            <!-- Page Content -->
            <div class="entry-content">
                <div class="container">
                    <?php
                    the_content();

                    // Display page links for multipage content
                    wp_link_pages(
                        array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'groktalk' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'groktalk' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        )
                    );
                    ?>
                </div>
            </div><!-- .entry-content -->

            <?php
            // Check if comments are enabled
            if ( comments_open() || get_comments_number() ) :
                echo '<div class="comments-section">';
                echo '<div class="container">';
                comments_template();
                echo '</div>';
                echo '</div>';
            endif;
            ?>

            <!-- Page Footer -->
            <footer class="entry-footer">
                <div class="container">
                    <?php
                    // Display edit link for users with permissions
                    if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) :
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'groktalk' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<div class="edit-link">',
                            '</div>'
                        );
                    endif;
                    ?>
                </div>
            </footer>

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
// Check for sidebar
$has_sidebar = is_active_sidebar( 'sidebar-1' );
if ( $has_sidebar ) :
    get_sidebar();
endif;

get_footer();
?>

<!-- Custom JavaScript for page animations and light/dark mode toggling -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create stars for the hero section
        createStarField();
        
        // Initialize scroll animations
        initScrollAnimations();
        
        // Update theme mode if needed
        initThemeMode();
        
        function createStarField() {
            const stars = document.querySelector('.stars');
            if (!stars) return;
            
            const starCount = Math.floor(window.innerWidth / 3);
            
            for (let i = 0; i < starCount; i++) {
                const size = Math.random() * 3 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const opacity = Math.random() * 0.5 + 0.3;
                const animationDelay = Math.random() * 3;
                const animationDuration = Math.random() * 2 + 2;
                
                const star = document.createElement('div');
                star.className = 'star';
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                star.style.left = posX + '%';
                star.style.top = posY + '%';
                star.style.opacity = opacity;
                star.style.animationDelay = animationDelay + 's';
                star.style.animationDuration = animationDuration + 's';
                
                stars.appendChild(star);
            }
        }
        
        function initScrollAnimations() {
            // Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            // Observe elements with animation class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        }
        
        function initThemeMode() {
            // Check if light mode is active
            const urlParams = new URLSearchParams(window.location.search);
            const themeParam = urlParams.get('theme');
            
            if (themeParam === 'light') {
                document.body.classList.add('light-theme');
            }
            
            // Handle theme toggle clicks
            const themeToggles = document.querySelectorAll('.theme-toggle');
            themeToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (document.body.classList.contains('light-theme')) {
                        document.body.classList.remove('light-theme');
                    } else {
                        document.body.classList.add('light-theme');
                    }
                });
            });
        }
    });
</script>

<style>
/* Updated Styles for Page Template - Light Theme Support */
.single-page {
    background-color: var(--midnight-black);
}

/* Light Theme Overrides */
body.light-theme .single-page {
    background-color: var(--light-bg);
    color: var(--text-dark);
}

body.light-theme .entry-content {
    color: var(--text-dark);
}

body.light-theme .entry-content h2,
body.light-theme .entry-content h3 {
    color: var(--midnight-black);
}

body.light-theme .page-title {
    color: var(--midnight-black);
    text-shadow: none;
}

body.light-theme .page-subtitle {
    color: var(--cosmic-web-grey);
}

body.light-theme .author-bio-section {
    background-color: var(--starlight-silver);
}

body.light-theme .page-hero-section {
    background: linear-gradient(135deg, var(--light-bg), #e8e8ff);
}

body.light-theme .page-hero-background::before {
    background: linear-gradient(135deg, rgba(121, 40, 202, 0.4), rgba(247, 247, 255, 0.8));
}

/* Hero Section */
.page-hero-section {
    position: relative;
    padding: 8rem 0 4rem;
    text-align: center;
    overflow: hidden;
    background: linear-gradient(135deg, var(--cosmic-blue), var(--midnight-black));
}

.page-hero-background {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 20rem;
    padding: 4rem 2rem;
    z-index: 1;
}

.page-hero-background::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(121, 40, 202, 0.7), rgba(12, 14, 48, 0.9));
    z-index: -1;
}

/* Stars and cosmic elements */
.neon-grid {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        linear-gradient(rgba(121, 40, 202, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(121, 40, 202, 0.05) 1px, transparent 1px);
    background-size: 5rem 5rem;
    pointer-events: none;
    opacity: 0.3;
    animation: gridFloat 20s linear infinite;
    z-index: 0;
}

@keyframes gridFloat {
    0% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.05);
    }
    100% {
        transform: translateY(0) scale(1);
    }
}

.stars {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.star {
    position: absolute;
    background-color: #fff;
    border-radius: 50%;
    animation: twinkle 3s infinite ease-in-out;
}

@keyframes twinkle {
    0%, 100% {
        opacity: 0.5;
        transform: scale(1);
    }
    50% {
        opacity: 1;
        transform: scale(1.2);
    }
}

/* Particles */
.particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.particle {
    position: absolute;
    border-radius: 50%;
    filter: blur(5px);
    animation: floatParticle 15s infinite ease-in-out;
}

.particle-1 {
    width: 100px;
    height: 100px;
    background: radial-gradient(circle at center, rgba(121, 40, 202, 0.3) 0%, transparent 70%);
    top: 15%;
    left: 10%;
    animation-duration: 25s;
}

.particle-2 {
    width: 150px;
    height: 150px;
    background: radial-gradient(circle at center, rgba(144, 70, 207, 0.3) 0%, transparent 70%);
    top: 70%;
    left: 80%;
    animation-duration: 20s;
    animation-delay: -5s;
}

.particle-3 {
    width: 80px;
    height: 80px;
    background: radial-gradient(circle at center, rgba(121, 40, 202, 0.2) 0%, transparent 70%);
    top: 40%;
    left: 75%;
    animation-duration: 18s;
    animation-delay: -8s;
}

.particle-4 {
    width: 120px;
    height: 120px;
    background: radial-gradient(circle at center, rgba(144, 70, 207, 0.2) 0%, transparent 70%);
    top: 80%;
    left: 20%;
    animation-duration: 22s;
    animation-delay: -12s;
}

.particle-5 {
    width: 200px;
    height: 200px;
    background: radial-gradient(circle at center, rgba(121, 40, 202, 0.15) 0%, transparent 70%);
    top: 20%;
    left: 60%;
    animation-duration: 30s;
    animation-delay: -15s;
}

@keyframes floatParticle {
    0%, 100% {
        transform: translate(0, 0);
    }
    25% {
        transform: translate(50px, -30px);
    }
    50% {
        transform: translate(20px, 50px);
    }
    75% {
        transform: translate(-30px, 20px);
    }
}

.category-badge {
    display: inline-block;
    background-color: var(--electric-purple);
    color: var(--text-white);
    padding: 0.5rem 1.5rem;
    border-radius: 3rem;
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    position: relative;
    z-index: 2;
}

.page-title {
    color: var(--text-white);
    font-size: 4.2rem;
    margin-bottom: 2rem;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    z-index: 2;
    text-shadow: 0 0 15px rgba(121, 40, 202, 0.5);
}

.page-subtitle {
    color: var(--text-light-grey);
    font-size: 2rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.5;
    position: relative;
    z-index: 2;
}

/* Content Styling */
.entry-content {
    padding: 6rem 0;
    color: var(--text-light-grey);
    font-size: 1.8rem;
    line-height: 1.8;
}

.entry-content h2 {
    color: var(--text-white);
    font-size: 3.2rem;
    margin-top: 4rem;
    margin-bottom: 2rem;
    position: relative;
    padding-bottom: 1rem;
}

.entry-content h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 6rem;
    height: 0.3rem;
    background: var(--electric-purple);
    border-radius: 0.2rem;
}

.entry-content h3 {
    color: var(--text-white);
    font-size: 2.6rem;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
}

.entry-content p {
    margin-bottom: 2rem;
}

.entry-content a {
    color: var(--electric-purple);
    text-decoration: none;
    transition: color 0.3s ease;
    border-bottom: 1px dotted var(--electric-purple);
}

.entry-content a:hover {
    color: var(--soft-purple);
    border-bottom-color: var(--soft-purple);
}

.entry-content ul, 
.entry-content ol {
    margin: 2rem 0;
    padding-left: 4rem;
}

.entry-content ul li, 
.entry-content ol li {
    margin-bottom: 1rem;
}

/* Blockquote styling */
.entry-content blockquote {
    margin: 3rem 0;
    padding: 2rem 2rem 2rem 4rem;
    border-left: 4px solid var(--electric-purple);
    background-color: rgba(121, 40, 202, 0.1);
    position: relative;
    border-radius: 0.5rem;
}

.entry-content blockquote::before {
    content: '"';
    position: absolute;
    left: 1rem;
    top: 1rem;
    font-size: 5rem;
    line-height: 1;
    color: var(--electric-purple);
    font-family: Georgia, serif;
    opacity: 0.3;
}

.entry-content blockquote p {
    font-style: italic;
    font-size: 2rem;
    color: var(--text-white);
}

.entry-content blockquote cite {
    display: block;
    margin-top: 1rem;
    color: var(--text-light-grey);
    font-style: normal;
    font-size: 1.6rem;
}

/* Table styling */
.entry-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 2.5rem 0;
    border: 1px solid rgba(121, 40, 202, 0.2);
    border-radius: 0.5rem;
    overflow: hidden;
}

.entry-content table th {
    background-color: var(--cosmic-web-grey);
    color: var(--text-white);
    font-weight: 600;
    padding: 1.5rem;
    text-align: left;
    border-bottom: 2px solid var(--electric-purple);
}

.entry-content table td {
    padding: 1.2rem 1.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    color: var(--text-light-grey);
}

.entry-content table tr:nth-child(even) {
    background-color: rgba(121, 40, 202, 0.05);
}

.entry-content table tr:hover {
    background-color: rgba(121, 40, 202, 0.1);
}

/* Light mode adjustments for tables */
body.light-theme .entry-content table th {
    background-color: var(--electric-purple);
    color: var(--text-white);
}

body.light-theme .entry-content table td {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    color: var(--text-dark);
}

body.light-theme .entry-content table tr:nth-child(even) {
    background-color: rgba(121, 40, 202, 0.05);
}

body.light-theme .entry-content table tr:hover {
    background-color: rgba(121, 40, 202, 0.1);
}

/* Code styling */
.entry-content pre {
    background-color: var(--cosmic-web-grey);
    padding: 2rem;
    margin: 2.5rem 0;
    border-radius: 0.5rem;
    overflow-x: auto;
    border: 1px solid rgba(121, 40, 202, 0.2);
}

.entry-content code {
    font-family: var(--font-family-mono);
    font-size: 1.5rem;
    color: var(--electric-purple);
}

/* Light mode adjustments for code */
body.light-theme .entry-content pre {
    background-color: #f5f5f5;
    border: 1px solid rgba(121, 40, 202, 0.2);
}

/* Images styling */
.entry-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 2rem 0;
}

.entry-content figure {
    margin: 2.5rem 0;
}

.entry-content figcaption {
    font-size: 1.4rem;
    color: var(--text-cosmic-grey);
    text-align: center;
    margin-top: 1rem;
}

/* Page links styling */
.page-links {
    margin: 2rem 0;
    padding: 1.5rem;
    background-color: var(--cosmic-web-grey);
    border-radius: 0.5rem;
    text-align: center;
}

body.light-theme .page-links {
    background-color: rgba(121, 40, 202, 0.1);
}

.page-links-title {
    color: var(--text-white);
    margin-right: 1rem;
    font-weight: 600;
}

body.light-theme .page-links-title {
    color: var(--text-dark);
}

.page-links a,
.page-links span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 3.5rem;
    height: 3.5rem;
    margin: 0 0.5rem;
    border-radius: 50%;
    background-color: rgba(5, 5, 16, 0.5);
    color: var(--text-light-grey);
    text-decoration: none;
    transition: all 0.3s ease;
}

body.light-theme .page-links a,
body.light-theme .page-links span {
    background-color: rgba(121, 40, 202, 0.1);
    color: var(--text-dark);
}

.page-links a:hover {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-3px);
}

.page-links span:not(.page-links-title) {
    background-color: var(--electric-purple);
    color: var(--text-white);
}

/* Comments section */
.comments-section {
    padding: 4rem 0;
    background-color: var(--cosmic-web-grey);
    margin-top: 2rem;
}

body.light-theme .comments-section {
    background-color: #f0f0f5;
}

/* Edit link styling */
.edit-link {
    display: inline-block;
    margin-top: 2rem;
    padding: 1rem 1.5rem;
    background-color: rgba(121, 40, 202, 0.1);
    border-radius: 0.5rem;
    border: 1px solid rgba(121, 40, 202, 0.2);
    font-size: 1.4rem;
    transition: all 0.3s ease;
}

.edit-link:hover {
    background-color: rgba(121, 40, 202, 0.2);
    transform: translateY(-3px);
}

.edit-link a {
    color: var(--electric-purple);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.edit-link a::before {
    content: '✏️';
    font-size: 1.6rem;
}

/* Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.animate-on-scroll.animate {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive Styles */
@media (max-width: 768px) {
    .page-title {
        font-size: 3.6rem;
    }
    
    .page-subtitle {
        font-size: 1.8rem;
    }
    
    .entry-content {
        font-size: 1.6rem;
    }
    
    .entry-content h2 {
        font-size: 2.8rem;
    }
    
    .entry-content h3 {
        font-size: 2.2rem;
    }
    
    .entry-content blockquote {
        padding: 1.5rem 1.5rem 1.5rem 3rem;
    }
    
    .entry-content blockquote p {
        font-size: 1.8rem;
    }
    
    .entry-content table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
    
    .particle {
        display: none;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 3rem;
    }
    
    .page-subtitle {
        font-size: 1.6rem;
    }
    
    .entry-content {
        padding: 4rem 0;
    }
    
    .entry-content h2 {
        font-size: 2.4rem;
    }
    
    .entry-content h3 {
        font-size: 2rem;
    }
    
    .entry-content ul, 
    .entry-content ol {
        padding-left: 2.5rem;
    }
    
    .entry-content pre {
        padding: 1.5rem;
    }
    
    .entry-content code {
        font-size: 1.4rem;
    }
}
</style>