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
                <div class="hero-section">
                    <div class="container">
                        <?php
                        // Check if page has a custom hero background
                        if ( has_post_thumbnail() ) {
                            echo '<div class="hero-background" style="background-image: url(' . get_the_post_thumbnail_url() . ');">';
                        } else {
                            echo '<div class="hero-background">';
                        }
                        ?>
                            <h1 class="entry-title hero-title"><?php the_title(); ?></h1>
                            
                            <?php
                            // Check for optional subtitle/excerpt
                            $excerpt = get_the_excerpt();
                            if ( ! empty( $excerpt ) ) :
                            ?>
                                <p class="hero-subtitle"><?php echo esc_html( $excerpt ); ?></p>
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
                comments_template();
            endif;
            ?>

        </article><!-- #post-<?php the_ID(); ?> -->

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

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
// Check for sidebar
$has_sidebar = is_active_sidebar( 'sidebar-1' );
if ( $has_sidebar ) :
    get_sidebar();
endif;

get_footer();