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
                <?php
                $categories = array(
                    array('slug' => 'ai-safety', 'name' => 'AI Safety'),
                    array('slug' => 'prompt-engineering', 'name' => 'Prompt Engineering'),
                    array('slug' => 'ai-tools', 'name' => 'AI Tools'),
                    array('slug' => 'ai-governance', 'name' => 'AI Governance')
                );
                
                foreach ($categories as $cat) :
                    $category_id = groktalk_get_category_id_by_slug($cat['slug']);
                    if ($category_id) :
                ?>
                    <a href="<?php echo esc_url( get_category_link( $category_id ) ); ?>" class="filter-tag">
                        <?php echo esc_html($cat['name']); ?>
                    </a>
                <?php
                    endif;
                endforeach;
                ?>
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