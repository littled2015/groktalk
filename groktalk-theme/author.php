<?php
/**
 * The template for displaying Author Archive pages
 */

get_header();
?>

<main id="primary" class="site-main author-archive">
    <header class="archive-header">
        <div class="container">
            <div class="author-hero">
                <div class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
                </div>
                
                <div class="author-info">
                    <span class="author-label"><?php esc_html_e( 'Author', 'groktalk' ); ?></span>
                    <h1 class="author-name"><?php echo get_the_author(); ?></h1>
                    
                    <?php if ( get_the_author_meta( 'description' ) ) : ?>
                        <div class="author-bio">
                            <?php echo nl2br( get_the_author_meta( 'description' ) ); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="author-meta">
                        <span class="post-count">
                            <?php 
                            $author_id = get_the_author_meta( 'ID' );
                            $post_count = count_user_posts( $author_id );
                            printf( esc_html( _n( '%s Article', '%s Articles', $post_count, 'groktalk' ) ), number_format_i18n( $post_count ) );
                            ?>
                        </span>
                        <span class="author-since">
                            <?php 
                            $first_post = get_posts( array(
                                'author' => $author_id,
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'posts_per_page' => 1
                            ) );
                            if ( $first_post ) {
                                printf( 
                                    esc_html__( 'Writing since %s', 'groktalk' ), 
                                    get_the_date( 'M Y', $first_post[0] ) 
                                );
                            }
                            ?>
                        </span>
                    </div>
                    
                    <div class="author-social">
                        <?php if ( get_the_author_meta( 'url' ) ) : ?>
                            <a href="<?php echo esc_url( get_the_author_meta( 'url' ) ); ?>" target="_blank" class="social-link website">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                                <?php esc_html_e( 'Website', 'groktalk' ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                            <a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank" class="social-link twitter">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                                <?php esc_html_e( 'Twitter', 'groktalk' ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
                            <a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank" class="social-link linkedin">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                                <?php esc_html_e( 'LinkedIn', 'groktalk' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="archive-content">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="posts-filter">
                    <h2><?php esc_html_e( 'Articles', 'groktalk' ); ?></h2>
                    
                    <!-- Post Categories Filter -->
                    <div class="category-filter">
                        <?php
                        $categories = get_categories( array(
                            'hide_empty' => true,
                            'author' => $author_id
                        ) );
                        
                        if ( ! empty( $categories ) ) :
                        ?>
                            <a href="<?php echo get_author_posts_url( $author_id ); ?>" class="filter-btn active">
                                <?php esc_html_e( 'All', 'groktalk' ); ?>
                            </a>
                            <?php foreach ( $categories as $category ) : ?>
                                <a href="<?php echo add_query_arg( 'category_name', $category->slug, get_author_posts_url( $author_id ) ); ?>" class="filter-btn">
                                    <?php echo esc_html( $category->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="posts-grid">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('author-post'); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                    
                                    <div class="post-overlay">
                                        <span class="post-category">
                                            <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo esc_html( $categories[0]->name );
                                            }
                                            ?>
                                        </span>
                                        <span class="post-date"><?php echo get_the_date('M d, Y'); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                </header>
                                
                                <div class="entry-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <div class="post-meta">
                                        <span class="reading-time">
                                            <?php echo groktalk_get_reading_time(get_the_content()); ?> min read
                                        </span>
                                        <?php if ( get_comments_number() > 0 ) : ?>
                                            <span class="comment-count">
                                                <?php
                                                printf(
                                                    _n( '%s comment', '%s comments', get_comments_number(), 'groktalk' ),
                                                    number_format_i18n( get_comments_number() )
                                                );
                                                ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                                        <?php esc_html_e( 'Read Full Article', 'groktalk' ); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M9 18l6-6-6-6"></path>
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
                        esc_html__( 'Previous', 'groktalk' )
                    ),
                    'next_text' => sprintf(
                        '<span class="nav-next-text">%s</span>',
                        esc_html__( 'Next', 'groktalk' )
                    ),
                ) ); ?>
                
            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e( 'No posts found', 'groktalk' ); ?></h2>
                    <p><?php esc_html_e( 'This author hasn\'t published any posts yet.', 'groktalk' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<style>
.author-archive {
    background-color: var(--midnight-black);
}

.archive-header {
    background: linear-gradient(135deg, var(--cosmic-blue), var(--midnight-black));
    padding: 5rem 0 3rem;
}

.author-hero {
    display: flex;
    align-items: center;
    gap: 3rem;
    max-width: 1000px;
    margin: 0 auto;
}

.author-avatar {
    flex-shrink: 0;
}

.author-avatar img {
    border-radius: 50%;
    border: 4px solid var(--neon-green);
    box-shadow: 0 0 0 2px var(--midnight-black);
}

.author-info {
    flex: 1;
}

.author-label {
    display: inline-block;
    background-color: var(--neon-green);
    color: var(--midnight-black);
    padding: 0.25rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.author-name {
    font-size: 3rem;
    color: var(--text-white);
    margin-bottom: 1rem;
}

.author-bio {
    color: var(--text-light-grey);
    font-size: 1.125rem;
    line-height: 1.7;
    margin-bottom: 1rem;
}

.author-meta {
    display: flex;
    gap: 2rem;
    color: var(--starlight-silver);
    margin-bottom: 1.5rem;
}

.author-social {
    display: flex;
    gap: 1rem;
}

.social-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--electric-purple);
    transition: all 0.3s ease;
}

.social-link:hover {
    color: var(--neon-green);
}

.archive-content {
    padding: 5rem 0;
}

.posts-filter {
    margin-bottom: 3rem;
}

.posts-filter h2 {
    color: var(--text-white);
    margin-bottom: 1rem;
}

.category-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.filter-btn {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    background-color: var(--cosmic-web-grey);
    color: var(--text-white);
    transition: all 0.3s ease;
    text-decoration: none;
}

.filter-btn:hover,
.filter-btn.active {
    background-color: var(--neon-green);
    color: var(--midnight-black);
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.author-post {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.author-post:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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

.author-post:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3), transparent);
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.post-category {
    background-color: var(--electric-purple);
    color: var(--text-white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
}

.post-date {
    color: var(--text-white);
    font-size: 0.9rem;
}

.post-content {
    padding: 1.5rem;
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

.entry-excerpt {
    color: var(--text-light-grey);
    margin-bottom: 1.5rem;
    line-height: 1.7;
}

.entry-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.post-meta {
    display: flex;
    gap: 1rem;
    color: var(--starlight-silver);
    font-size: 0.9rem;
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
}

@media (max-width: 968px) {
    .author-hero {
        flex-direction: column;
        text-align: center;
    }
    
    .author-social {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .author-name {
        font-size: 2.5rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
    }
    
    .category-filter {
        flex-direction: column;
        align-items: center;
    }
}
</style>