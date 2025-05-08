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
                            <div class="hero-background" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
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
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="read-time">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    <?php echo groktalk_get_reading_time( get_the_content() ); ?> min read
                                </span>
                                <span class="author">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
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
            <div class="author-bio-section">
                <div class="container">
                    <div class="author-box">
                        <div class="author-avatar">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
                        </div>
                        <div class="author-details">
                            <h3 class="author-name"><?php echo get_the_author(); ?></h3>
                            <p class="author-bio"><?php echo get_the_author_meta( 'description' ); ?></p>
                            <div class="author-links">
                                <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                                    <a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank" rel="noopener noreferrer" class="author-social twitter">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                        </svg>
                                        <span><?php esc_html_e( 'Twitter', 'groktalk' ); ?></span>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
                                    <a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer" class="author-social linkedin">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path>
                                            <rect x="2" y="9" width="4" height="12"></rect>
                                            <circle cx="4" cy="4" r="2"></circle>
                                        </svg>
                                        <span><?php esc_html_e( 'LinkedIn', 'groktalk' ); ?></span>
                                    </a>
                                <?php endif; ?>
                                
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-social articles">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                    <span><?php esc_html_e( 'All Articles', 'groktalk' ); ?></span>
                                </a>
                            </div>
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
                            <div class="tags-list">
                                <?php foreach ( $tags as $tag ) : ?>
                                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tag-link">
                                        <?php echo esc_html( $tag->name ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Share Buttons -->
                    <div class="share-section">
                        <span class="share-label"><?php esc_html_e( 'Share:', 'groktalk' ); ?></span>
                        <div class="share-buttons">
                            <a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?url=' . urlencode( get_permalink() ) . '&text=' . urlencode( get_the_title() ) ); ?>" 
                               target="_blank" rel="noopener noreferrer" class="share-button twitter" aria-label="<?php esc_attr_e( 'Share on Twitter', 'groktalk' ); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                                <span><?php esc_html_e( 'Twitter', 'groktalk' ); ?></span>
                            </a>
                            
                            <a href="<?php echo esc_url( 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode( get_permalink() ) ); ?>" 
                               target="_blank" rel="noopener noreferrer" class="share-button linkedin" aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'groktalk' ); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                                <span><?php esc_html_e( 'LinkedIn', 'groktalk' ); ?></span>
                            </a>
                            
                            <a href="mailto:?subject=<?php echo rawurlencode( get_the_title() ); ?>&body=<?php echo rawurlencode( get_the_title() . ' - ' . get_permalink() ); ?>" 
                               class="share-button email" aria-label="<?php esc_attr_e( 'Share via Email', 'groktalk' ); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span><?php esc_html_e( 'Email', 'groktalk' ); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </footer><!-- .entry-footer -->

            <!-- Post Navigation -->
            <nav class="post-navigation">
                <div class="container">
                    <div class="nav-links">
                        <?php
                        $prev_post = get_previous_post();
                        if ( ! empty( $prev_post ) ) :
                            ?>
                            <div class="nav-previous">
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
                                    <span class="nav-direction">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="19" y1="12" x2="5" y2="12"></line>
                                            <polyline points="12 19 5 12 12 5"></polyline>
                                        </svg>
                                        <?php esc_html_e( 'Previous Article', 'groktalk' ); ?>
                                    </span>
                                    <span class="nav-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php
                        $next_post = get_next_post();
                        if ( ! empty( $next_post ) ) :
                            ?>
                            <div class="nav-next">
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
                                    <span class="nav-direction">
                                        <?php esc_html_e( 'Next Article', 'groktalk' ); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </span>
                                    <span class="nav-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>

            <!-- Related Posts -->
            <?php
            $related_posts = groktalk_get_related_posts( get_the_ID(), 3 );
            if ( $related_posts->have_posts() ) :
            ?>
                <section class="related-posts-section">
                    <div class="container">
                        <h2 class="section-title"><?php esc_html_e( 'Related Articles', 'groktalk' ); ?></h2>
                        
                        <div class="related-posts-grid">
                            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                                <article class="related-post">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="related-post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail( 'medium' ); ?>
                                            </a>
                                            <div class="post-overlay">
                                                <span class="reading-time"><?php echo groktalk_get_reading_time( get_the_content() ); ?> min read</span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="related-post-content">
                                        <div class="post-meta">
                                            <span class="post-date"><?php echo get_the_date(); ?></span>
                                            <?php
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) :
                                                echo '<span class="post-category">' . esc_html( $categories[0]->name ) . '</span>';
                                            endif;
                                            ?>
                                        </div>
                                        
                                        <h3 class="related-post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        
                                        <div class="related-post-excerpt">
                                            <?php echo wp_trim_words( get_the_excerpt(), 15 ); ?>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>" class="read-more-link">
                                            <?php esc_html_e( 'Read More', 'groktalk' ); ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
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
                echo '<div class="comments-section">';
                echo '<div class="container">';
                comments_template();
                echo '</div>';
                echo '</div>';
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
?>

<style>
/* Styles for Single Post Template */
.single-post {
    background-color: var(--midnight-black);
}

/* Hero Section */
.hero-section {
    position: relative;
    padding: 10rem 0 6rem;
    text-align: center;
    overflow: hidden;
}

.hero-background {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 30rem;
    padding: 4rem 2rem;
    z-index: 1;
}

.hero-background::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(121, 40, 202, 0.7), rgba(12, 14, 48, 0.9));
    z-index: -1;
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
}

.hero-title {
    color: var(--text-white);
    font-size: 4.2rem;
    margin-bottom: 2rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.entry-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
    color: var(--text-light-grey);
    font-size: 1.5rem;
}

.entry-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Content Styling */
.entry-content {
    padding: 6rem 0;
    color: var(--text-light-grey);
    font-size: 1.8rem;
    line-height: 1.8;
}

.entry-content .container {
    max-width: 800px;
}

.entry-content h2 {
    color: var(--text-white);
    font-size: 3rem;
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
    font-size: 2.4rem;
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

/* Author Bio Section */
.author-bio-section {
    padding: 4rem 0;
    background-color: var(--cosmic-web-grey);
}

.author-box {
    display: flex;
    gap: 3rem;
    align-items: center;
}

.author-avatar img {
    border-radius: 50%;
    border: 3px solid var(--electric-purple);
    width: 100px;
    height: 100px;
}

.author-details {
    flex: 1;
}

.author-name {
    font-size: 2.4rem;
    color: var(--text-white);
    margin-bottom: 1rem;
}

.author-bio {
    color: var(--text-light-grey);
    font-size: 1.6rem;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.author-links {
    display: flex;
    gap: 1.5rem;
}

.author-social {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    color: var(--text-light-grey);
    transition: color 0.3s ease;
    font-size: 1.4rem;
}

.author-social:hover {
    color: var(--electric-purple);
}

/* Post Footer */
.entry-footer {
    padding: 4rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.post-tags {
    margin-bottom: 3rem;
}

.tags-label {
    font-size: 1.6rem;
    color: var(--text-white);
    margin-right: 1rem;
    font-weight: 600;
}

.tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 1rem;
}

.tag-link {
    display: inline-block;
    padding: 0.5rem 1.5rem;
    background-color: rgba(121, 40, 202, 0.1);
    border: 1px solid rgba(121, 40, 202, 0.2);
    border-radius: 3rem;
    color: var(--text-light-grey);
    font-size: 1.4rem;
    transition: all 0.3s ease;
}

.tag-link:hover {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-2px);
}

.share-section {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.share-label {
    font-size: 1.6rem;
    color: var(--text-white);
    font-weight: 600;
}

.share-buttons {
    display: flex;
    gap: 1rem;
}

.share-button {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    padding: 0.8rem 1.5rem;
    background-color: var(--cosmic-web-grey);
    border-radius: 3rem;
    color: var(--text-light-grey);
    font-size: 1.4rem;
    transition: all 0.3s ease;
}

.share-button:hover {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-2px);
}

/* Post Navigation */
.post-navigation {
    padding: 4rem 0;
    background-color: var(--cosmic-web-grey);
}

.nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.nav-previous,
.nav-next {
    padding: 2rem;
    background-color: rgba(5, 5, 16, 0.5);
    border-radius: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.nav-previous:hover,
.nav-next:hover {
    background-color: rgba(121, 40, 202, 0.1);
    border-color: rgba(121, 40, 202, 0.3);
    transform: translat