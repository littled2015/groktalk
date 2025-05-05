<?php
/**
 * The template for displaying Tag Archive pages
 */

get_header();
?>

<main id="primary" class="site-main tag-archive">
    <header class="archive-header">
        <div class="container">
            <div class="tag-hero">
                <span class="tag-label"><?php esc_html_e( 'Tag', 'groktalk' ); ?></span>
                <h1 class="archive-title">#<?php single_tag_title(); ?></h1>
                
                <?php if ( tag_description() ) : ?>
                    <div class="archive-description">
                        <?php echo tag_description(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="tag-meta">
                    <span class="post-count">
                        <?php 
                        $tag = get_queried_object();
                        printf( esc_html( _n( '%s Post', '%s Posts', $tag->count, 'groktalk' ) ), number_format_i18n( $tag->count ) );
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </header>

    <section class="archive-content">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="posts-grid">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('tag-post'); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                    
                                    <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) :
                                    ?>
                                        <span class="post-category">
                                            <?php echo esc_html( $categories[0]->name ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="entry-header">
                                    <div class="post-tags">
                                        <?php
                                        $tags = get_the_tags();
                                        if ( $tags ) {
                                            foreach ( $tags as $tag ) {
                                                echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="tag-link">#' . esc_html( $tag->name ) . '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <div class="post-meta">
                                        <span class="post-date">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <span class="reading-time">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                            </svg>
                                            <?php echo groktalk_get_reading_time(get_the_content()); ?> min read
                                        </span>
                                    </div>
                                </header>
                                
                                <div class="entry-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 25 ); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                                        <?php esc_html_e( 'Read Article', 'groktalk' ); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M18 8a1 1 0 0 1 2 0v13a1 1 0 0 1-2 0V8zm4 0l-7.5-7a1 1 0 0 0-1.41 0L5.5 8a1 1 0 0 0-.29.71V21a1 1 0 0 0 1 1h11.59a1 1 0 0 0 1-1V8.71a1 1 0 0 0-.29-.71z"></path>
                                        </svg>
                                    </a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => sprintf(
                        '<span class="nav-prev-text">← %s</span>',
                        esc_html__( 'Previous', 'groktalk' )
                    ),
                    'next_text' => sprintf(
                        '<span class="nav-next-text">%s →</span>',
                        esc_html__( 'Next', 'groktalk' )
                    ),
                ) ); ?>
                
            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e( 'No posts found', 'groktalk' ); ?></h2>
                    <p><?php esc_html_e( 'No content has been tagged with this tag yet.', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Browse All Posts', 'groktalk' ); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Related Tags -->
    <section class="related-tags">
        <div class="container">
            <h2><?php esc_html_e( 'Related Tags', 'groktalk' ); ?></h2>
            <div class="tags-cloud">
                <?php
                $args = array(
                    'smallest' => 0.9,
                    'largest' => 1.5,
                    'unit' => 'rem',
                    'number' => 20,
                    'format' => 'list',
                    'separator' => "",
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'exclude' => get_queried_object_id(),
                    'show_count' => 0,
                    'echo' => true
                );
                wp_tag_cloud( $args );
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<style>
.tag-archive {
    background-color: var(--midnight-black);
}

.archive-header {
    background: linear-gradient(135deg, var(--electric-purple), var(--midnight-black));
    padding: 5rem 0 3rem;
}

.tag-hero {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.tag-label {
    display: inline-block;
    background-color: var(--neon-green);
    color: var(--midnight-black);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.archive-title {
    font-size: 3rem;
    color: var(--text-white);
    margin-bottom: 1rem;
}

.archive-title::before {
    content: '';
    display: inline-block;
    width: 50px;
    height: 4px;
    background-color: var(--neon-green);
    margin-right: 1rem;
    vertical-align: middle;
}

.tag-meta {
    color: var(--starlight-silver);
}

.archive-content {
    padding: 5rem 0;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.tag-post {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.tag-post:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.post-thumbnail {
    position: relative;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.tag-post:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-category {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background-color: var(--neon-green);
    color: var(--midnight-black);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
}

.post-content {
    padding: 1.5rem;
}

.post-tags {
    margin-bottom: 1rem;
}

.tag-link {
    display: inline-block;
    background-color: var(--electric-purple);
    color: var(--text-white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.tag-link:hover {
    background-color: var(--neon-green);
    color: var(--midnight-black);
}

.entry-title {
    margin-bottom: 0.5rem;
}

.entry-title a {
    color: var(--text-white);
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: var(--neon-green);
}

.post-meta {
    display: flex;
    gap: 1rem;
    color: var(--starlight-silver);
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.post-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.entry-excerpt {
    color: var(--text-light-grey);
    margin-bottom: 1.5rem;
    line-height: 1.7;
}

.read-more-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--electric-purple);
    transition: all 0.3s ease;
}

.read-more-link:hover {
    color: var(--neon-green);
}

.no-results {
    text-align: center;
    padding: 5rem 0;
}

.no-results h2 {
    color: var(--neon-green);
    margin-bottom: 1rem;
}

.no-results p {
    color: var(--text-light-grey);
    margin-bottom: 2rem;
}

.related-tags {
    padding: 5rem 0;
    background-color: var(--cosmic-blue);
}

.related-tags h2 {
    text-align: center;
    margin-bottom: 2rem;
    color: var(--text-white);
}

.tags-cloud {
    text-align: center;
}

.tags-cloud ul {
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.tags-cloud li {
    display: inline-block;
}

.tags-cloud a {
    color: var(--text-light-grey);
    transition: color 0.3s ease;
}

.tags-cloud a:hover {
    color: var(--neon-green);
}

@media (max-width: 768px) {
    .archive-title {
        font-size: 2.5rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
    }
    
    .tags-cloud ul {
        flex-direction: column;
        align-items: center;
    }
}
</style>