<?php
/**
 * The template for displaying all single posts
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

        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
            
            <!-- Post Header -->
            <header class="entry-header">
                <div class="hero-section">
                    <div class="container">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="hero-background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                        <?php else : ?>
                            <div class="hero-background">
                        <?php endif; ?>
                            
                            <!-- Category Badge -->
                            <?php
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) :
                                echo '<span class="category-badge">' . esc_html( $categories[0]->name ) . '</span>';
                            endif;
                            ?>
                            
                            <h1 class="entry-title hero-title"><?php the_title(); ?></h1>
                            
                            <!-- Post Meta -->
                            <div class="entry-meta">
                                <span class="posted-date">
                                    <i class="icon-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="read-time">
                                    <i class="icon-clock"></i>
                                    <?php echo groktalk_get_reading_time( get_the_content() ); ?> min read
                                </span>
                                <span class="author">
                                    <i class="icon-user"></i>
                                    <?php echo get_the_author(); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </header><!-- .entry-header -->

            <!-- Post Content -->
            <div class="entry-content">
                <div class="container">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'groktalk' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        )
                    );

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

            <!-- Author Bio -->
            <div class="author-info">
                <div class="container">
                    <div class="author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
                    </div>
                    <div class="author-details">
                        <h3 class="author-name"><?php echo get_the_author(); ?></h3>
                        <p class="author-bio"><?php echo get_the_author_meta( 'description' ); ?></p>
                        <div class="author-links">
                            <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                                <a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank">
                                    <i class="icon-twitter"></i> Twitter
                                </a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
                                <a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank">
                                    <i class="icon-linkedin"></i> LinkedIn
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Post Footer -->
            <footer class="entry-footer">
                <div class="container">
                    <?php
                    // Display tags if they exist
                    $tags = get_the_tags();
                    if ( $tags ) :
                    ?>
                        <div class="post-tags">
                            <span class="tags-label"><?php esc_html_e( 'Tags:', 'groktalk' ); ?></span>
                            <?php foreach ( $tags as $tag ) : ?>
                                <a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="tag-link">
                                    <?php echo esc_html( $tag->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Share Buttons -->
                    <div class="share-buttons">
                        <span class="share-label"><?php esc_html_e( 'Share:', 'groktalk' ); ?></span>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" 
                           target="_blank" class="share-button twitter">
                            <i class="icon-twitter"></i> Twitter
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>" 
                           target="_blank" class="share-button linkedin">
                            <i class="icon-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </footer><!-- .entry-footer -->

            <!-- Navigation -->
            <nav class="post-navigation">
                <div class="container">
                    <div class="nav-previous">
                        <?php
                        $prev_post = get_previous_post();
                        if ( $prev_post ) :
                            ?>
                            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                                <span class="nav-label">&larr; <?php esc_html_e( 'Previous Article', 'groktalk' ); ?></span>
                                <span class="nav-title"><?php echo get_the_title( $prev_post->ID ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="nav-next">
                        <?php
                        $next_post = get_next_post();
                        if ( $next_post ) :
                            ?>
                            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                                <span class="nav-label"><?php esc_html_e( 'Next Article', 'groktalk' ); ?> &rarr;</span>
                                <span class="nav-title"><?php echo get_the_title( $next_post->ID ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>

            <!-- Related Posts -->
            <?php
            $related_posts = groktalk_get_related_posts( get_the_ID(), 3 );
            if ( $related_posts->have_posts() ) :
            ?>
                <section class="related-posts">
                    <div class="container">
                        <h2><?php esc_html_e( 'Related Articles', 'groktalk' ); ?></h2>
                        <div class="related-posts-grid">
                            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                                <article class="related-post-item">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="related-post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail( 'medium' ); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="related-post-content">
                                        <h3 class="related-post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="related-post-meta">
                                            <span class="related-post-date"><?php echo get_the_date(); ?></span>
                                            <span class="related-post-read-time"><?php echo groktalk_get_reading_time( get_the_content() ); ?> min read</span>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Comments -->
            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

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