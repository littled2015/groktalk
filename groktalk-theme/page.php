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
                    <div class="container">
                        <?php
                        // Check if page has a custom hero background
                        if ( has_post_thumbnail() ) :
                            ?>
                            <div class="page-hero-background" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
                        <?php else : ?>
                            <div class="page-hero-background">
                        <?php endif; ?>
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

<style>
/* Styles for Page Template */
.single-page {
    background-color: var(--midnight-black);
}

/* Hero Section */
.page-hero-section {
    position: relative;
    padding: 8rem 0 4rem;
    text-align: center;
    overflow: hidden;
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

.page-title {
    color: var(--text-white);
    font-size: 4.5rem;
    margin-bottom: 2rem;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

.page-subtitle {
    color: var(--text-light-grey);
    font-size: 2rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.5;
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

.page-links-title {
    color: var(--text-white);
    margin-right: 1rem;
    font-weight: 600;
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