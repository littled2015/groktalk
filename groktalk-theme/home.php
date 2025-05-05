<?php
/**
 * The template for displaying the blog posts index
 */

get_header();
?>

<main id="primary" class="site-main blog-index">
    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'AI Intelligence Hub', 'groktalk' ); ?></h1>
            <p class="page-description"><?php esc_html_e( 'Latest insights and analysis on artificial intelligence', 'groktalk' ); ?></p>
            
            <!-- Filter Tags -->
            <div class="filter-tags">
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="filter-tag active"><?php esc_html_e( 'All', 'groktalk' ); ?></a>
                <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'AI Safety' ) ) ); ?>" class="filter-tag"><?php esc_html_e( 'AI Safety', 'groktalk' ); ?></a>
                <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'Prompt Engineering' ) ) ); ?>" class="filter-tag"><?php esc_html_e( 'Prompt Engineering', 'groktalk' ); ?></a>
                <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'AI Tools' ) ) ); ?>" class="filter-tag"><?php esc_html_e( 'AI Tools', 'groktalk' ); ?></a>
                <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'AI Governance' ) ) ); ?>" class="filter-tag"><?php esc_html_e( 'AI Governance', 'groktalk' ); ?></a>
            </div>
        </div>
    </header>

    <section class="blog-content">
        <div class="container">
            <div class="content-wrapper">
                <div class="main-content">
                    <?php if ( have_posts() ) : ?>
                        
                        <!-- Featured Post -->
                        <?php 
                        // Query for the latest featured post
                        $featured_args = array(
                            'posts_per_page' => 1,
                            'meta_key' => 'featured',
                            'meta_value' => '1'
                        );
                        $featured_query = new WP_Query($featured_args);
                        
                        if ($featured_query->have_posts()) :
                            while ($featured_query->have_posts()) : $featured_query->the_post();
                        ?>
                                <article class="featured-post-large">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="featured-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                            <span class="featured-badge"><?php esc_html_e( 'Featured', 'groktalk' ); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="featured-content">
                                        <div class="post-meta">
                                            <span class="post-category">
                                                <?php 
                                                $categories = get_the_category();
                                                if ( ! empty( $categories ) ) {
                                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                }
                                                ?>
                                            </span>
                                            <span class="post-date"><?php echo get_the_date(); ?></span>
                                        </div>
                                        
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        
                                        <div class="entry-excerpt">
                                            <?php echo wp_trim_words( get_the_excerpt(), 40 ); ?>
                                        </div>
                                        
                                        <footer class="post-footer">
                                            <div class="author-info">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                                                <div class="author-details">
                                                    <span class="author-name"><?php the_author(); ?></span>
                                                    <span class="read-time"><?php echo groktalk_get_reading_time(get_the_content()); ?> min read</span>
                                                </div>
                                            </div>
                                            
                                            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                                <?php esc_html_e( 'Read Full Article', 'groktalk' ); ?>
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </footer>
                                    </div>
                                </article>
                        <?php 
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                        
                        <!-- Blog Grid -->
                        <div class="blog-grid">
                            <?php 
                            // Reset main query
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                    // Skip if this is the featured post
                                    if (!get_post_meta(get_the_ID(), 'featured', true)) :
                        ?>
                                        <article <?php post_class('blog-post-item'); ?>>
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <div class="post-thumbnail">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('medium'); ?>
                                                    </a>
                                                    <span class="read-time-badge"><?php echo groktalk_get_reading_time(get_the_content()); ?> min</span>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="post-content">
                                                <div class="post-meta">
                                                    <span class="post-category">
                                                        <?php 
                                                        $categories = get_the_category();
                                                        if ( ! empty( $categories ) ) {
                                                            echo esc_html( $categories[0]->name );
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="post-date"><?php echo get_the_date(); ?></span>
                                                </div>
                                                
                                                <h3 class="entry-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                
                                                <div class="entry-excerpt">
                                                    <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                                                </div>
                                                
                                                <a href="<?php the_permalink(); ?>" class="read-more-link">
                                                    <?php esc_html_e( 'Continue Reading', 'groktalk' ); ?>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </a>
                                            </div>
                                        </article>
                            <?php 
                                    endif;
                                endwhile; 
                            endif;
                            ?>
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
                        
                        <div class="no-posts">
                            <h2><?php esc_html_e( 'No posts found', 'groktalk' ); ?></h2>
                            <p><?php esc_html_e( 'Start publishing to see your content here.', 'groktalk' ); ?></p>
                        </div>
                        
                    <?php endif; ?>
                </div>
                
                <!-- Sidebar -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2><?php esc_html_e( 'Stay Updated', 'groktalk' ); ?></h2>
                <p><?php esc_html_e( 'Get weekly AI intelligence delivered to your inbox', 'groktalk' ); ?></p>
                
                <form class="newsletter-form" method="post" action="#">
                    <div class="form-group">
                        <input type="email" placeholder="<?php esc_attr_e( 'Enter your email', 'groktalk' ); ?>" required>
                        <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Subscribe', 'groktalk' ); ?></button>
                    </div>
                    <p class="form-note"><?php esc_html_e( 'No spam. Unsubscribe anytime.', 'groktalk' ); ?></p>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<style>
.blog-index {
    background-color: var(--midnight-black);
}

.page-header {
    background: linear-gradient(135deg, var(--cosmic-blue), var(--midnight-black));
    padding: 5rem 0 3rem;
    text-align: center;
}

.page-title {
    font-size: 3rem;
    color: var(--text-white);
    margin-bottom: 0.5rem;
}

.page-description {
    color: var(--text-light-grey);
    font-size: 1.25rem;
    margin-bottom: 2rem;
}

.filter-tags {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.filter-tag {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    background-color: var(--cosmic-web-grey);
    color: var(--text-white);
    text-decoration: none;
    transition: all 0.3s ease;
}

.filter-tag:hover,
.filter-tag.active {
    background-color: var(--neon-green);
    color: var(--midnight-black);
}

.blog-content {
    padding: 5rem 0;
}

.content-wrapper {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 3rem;
}

.main-content {
    min-width: 0;
}

.featured-post-large {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 4rem;
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 2rem;
}

.featured-thumbnail {
    position: relative;
}

.featured-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.featured-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background-color: var(--neon-green);
    color: var(--midnight-black);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: bold;
}

.featured-content {
    padding: 2rem;
}

.post-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.post-category a {
    color: var(--electric-purple);
    text-decoration: none;
}

.post-date {
    color: var(--starlight-silver);
}

.entry-title {
    margin-bottom: 1rem;
}

.entry-title a {
    color: var(--text-white);
    text-decoration: none;
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: var(--neon-green);
}

.entry-excerpt {
    color: var(--text-light-grey);
    line-height: 1.7;
    margin-bottom: 2rem;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.author-details {
    display: flex;
    flex-direction: column;
}

.author-name {
    color: var(--text-white);
    font-weight: bold;
}

.read-time {
    color: var(--starlight-silver);
    font-size: 0.9rem;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: var(--neon-green);
    color: var(--midnight-black);
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(57, 255, 20, 0.3);
}

.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.blog-post-item {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.blog-post-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.post-thumbnail {
    position: relative;
}

.post-thumbnail img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.read-time-badge {
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

.read-more-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--electric-purple);
    text-decoration: none;
    transition: all 0.3s ease;
}

.read-more-link:hover {
    color: var(--neon-green);
}

.no-posts {
    text-align: center;
    padding: 5rem 0;
}

.newsletter-section {
    padding: 5rem 0;
    background-color: var(--cosmic-blue);
}

.newsletter-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.newsletter-content h2 {
    color: var(--text-white);
    margin-bottom: 1rem;
}

.newsletter-content p {
    color: var(--text-light-grey);
    margin-bottom: 2rem;
}

.newsletter-form .form-group {
    display: flex;
    gap: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.newsletter-form input {
    flex: 1;
    padding: 1rem;
    border-radius: 30px;
    border: none;
    background-color: var(--cosmic-web-grey);
    color: var(--text-white);
}

.form-note {
    color: var(--starlight-silver);
    font-size: 0.9rem;
    margin-top: 1rem;
}

@media (max-width: 1024px) {
    .content-wrapper {
        grid-template-columns: 1fr;
    }
    
    .featured-post-large {
        grid-template-columns: 1fr;
    }
    
    .featured-thumbnail img {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2.5rem;
    }
    
    .filter-tags {
        flex-direction: column;
        align-items: center;
    }
    
    .newsletter-form .form-group {
        flex-direction: column;
    }
}
</style>