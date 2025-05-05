<?php
/**
 * The template for displaying Category Archive pages
 */

get_header();
?>

<main id="primary" class="site-main category-archive">
    <header class="archive-header">
        <div class="container">
            <div class="category-hero">
                <span class="category-label"><?php esc_html_e( 'Category', 'groktalk' ); ?></span>
                <h1 class="archive-title"><?php single_cat_title(); ?></h1>
                
                <?php if ( category_description() ) : ?>
                    <div class="archive-description">
                        <?php echo category_description(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="category-meta">
                    <span class="post-count">
                        <?php 
                        $category = get_queried_object();
                        printf( esc_html( _n( '%s Article', '%s Articles', $category->count, 'groktalk' ) ), number_format_i18n( $category->count ) );
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
                        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-post'); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                    <span class="reading-time">
                                        <?php echo groktalk_get_reading_time(get_the_content()); ?> min read
                                    </span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="entry-header">
                                    <div class="post-meta">
                                        <span class="post-date">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <span class="post-author">
                                            <?php esc_html_e( 'By', 'groktalk' ); ?> <?php the_author(); ?>
                                        </span>
                                    </div>
                                    
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                </header>
                                
                                <div class="entry-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                                        <?php esc_html_e( 'Continue Reading', 'groktalk' ); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
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
                        '<span class="nav-prev-text">%s</span>',
                        esc_html__( 'Newer Posts', 'groktalk' )
                    ),
                    'next_text' => sprintf(
                        '<span class="nav-next-text">%s</span>',
                        esc_html__( 'Older Posts', 'groktalk' )
                    ),
                ) ); ?>
                
            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e( 'Nothing found', 'groktalk' ); ?></h2>
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try searching with different keywords.', 'groktalk' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>

<style>
.category-archive {
    background-color: var(--midnight-black);
}

.archive-header {
    background: linear-gradient(135deg, var(--cosmic-blue), var(--midnight-black));
    padding: 5rem 0 3rem;
}

.category-hero {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.category-label {
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

.archive-description {
    color: var(--text-light-grey);
    font-size: 1.125rem;
    margin-bottom: 1.5rem;
}

.category-meta {
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

.archive-post {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.archive-post:hover {
    transform: translateY(-5px);
    border-color: var(--neon-green);
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

.archive-post:hover .post-thumbnail img {
    transform: scale(1.05);
}

.reading-time {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background-color: rgba(26, 26, 29, 0.8);
    color: var(--text-white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
}

.post-content {
    padding: 1.5rem;
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

.entry-title {
    margin-bottom: 1rem;
}

.entry-title a {
    color: var(--text-white);
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: var(--neon-green);
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

.pagination {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 3rem;
}

.page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 5px;
    background-color: var(--cosmic-web-grey);
    color: var(--text-white);
    transition: all 0.3s ease;
}

.page-numbers:hover,
.page-numbers.current {
    background-color: var(--neon-green);
    color: var(--midnight-black);
}

.page-numbers.prev,
.page-numbers.next {
    width: auto;
    padding: 0 1rem;
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
}

@media (max-width: 768px) {
    .archive-title {
        font-size: 2.5rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
    }
}
</style>