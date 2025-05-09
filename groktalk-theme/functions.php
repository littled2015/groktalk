<?php
/**
 * The template for displaying Category Archive pages
 */

get_header();

// Get current category
$category = get_queried_object();
?>

<main id="primary" class="site-main category-archive">
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">
            <h1><?php single_cat_title(); ?></h1>
            <?php if ( category_description() ) : ?>
                <p><?php echo category_description(); ?></p>
            <?php else: ?>
                <p>Stay ahead with cutting-edge insights in <?php single_cat_title(); ?></p>
            <?php endif; ?>
            
            <div class="search-filter">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" placeholder="Search <?php single_cat_title(); ?>..." name="s" class="search-input">
                    <input type="hidden" name="cat" value="<?php echo get_queried_object_id(); ?>">
                    <button type="submit" class="btn btn-primary">🔍 Search</button>
                </form>
            </div>
            
            <div class="category-tags">
                <?php
                // Get categories excluding current one
                $current_cat_id = get_queried_object_id();
                $categories = get_categories(array(
                    'exclude' => $current_cat_id,
                    'number' => 5,
                    'orderby' => 'count',
                    'order' => 'DESC',
                ));
                
                // Always show "Latest" tag first
                echo '<a href="' . esc_url(get_category_link($current_cat_id)) . '" class="tag active">Latest</a>';
                
                // Display other category tags
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="tag">' . esc_html($category->name) . '</a>';
                }
                ?>
            </div>
        </div>
    </section>

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
                
                <div class="pagination-container">
                    <?php
                    // Custom pagination with cosmic styling
                    $total_pages = $wp_query->max_num_pages;
                    
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged'));
                        
                        echo '<div class="cosmic-pagination">';
                        
                        // Previous page
                        if ($current_page > 1) {
                            echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="page-btn prev-page">';
                            echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                            echo '<line x1="19" y1="12" x2="5" y2="12"></line>';
                            echo '<polyline points="12 19 5 12 12 5"></polyline>';
                            echo '</svg>';
                            echo '<span>' . esc_html__('Newer Posts', 'groktalk') . '</span>';
                            echo '</a>';
                        }
                        
                        // Number pagination
                        echo '<div class="page-numbers-container">';
                        
                        // First page link if not near the beginning
                        if ($current_page >= 4) {
                            echo '<a href="' . get_pagenum_link(1) . '" class="page-number">1</a>';
                            
                            // Jump back arrow instead of ellipsis
                            if ($current_page > 4) {
                                echo '<a href="' . get_pagenum_link($current_page - 3) . '" class="page-arrow jump-arrow">';
                                echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                                echo '<line x1="17" y1="12" x2="7" y2="12"></line>';
                                echo '<polyline points="12 17 7 12 12 7"></polyline>';
                                echo '</svg>';
                                echo '</a>';
                            }
                        }
                        
                        // Page numbers
                        for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $total_pages); $i++) {
                            if ($i == $current_page) {
                                echo '<span class="page-number current">' . $i . '</span>';
                            } else {
                                echo '<a href="' . get_pagenum_link($i) . '" class="page-number">' . $i . '</a>';
                            }
                        }
                        
                        // Last page link if not near the end
                        if ($current_page <= ($total_pages - 3)) {
                            // Jump forward arrow instead of ellipsis
                            if ($current_page < ($total_pages - 3)) {
                                echo '<a href="' . get_pagenum_link($current_page + 3) . '" class="page-arrow jump-arrow">';
                                echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                                echo '<line x1="7" y1="12" x2="17" y2="12"></line>';
                                echo '<polyline points="12 7 17 12 12 17"></polyline>';
                                echo '</svg>';
                                echo '</a>';
                            }
                            
                            echo '<a href="' . get_pagenum_link($total_pages) . '" class="page-number">' . $total_pages . '</a>';
                        }
                        
                        echo '</div>'; // End .page-numbers-container
                        
                        // Next page
                        if ($current_page < $total_pages) {
                            echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="page-btn next-page">';
                            echo '<span>' . esc_html__('Older Posts', 'groktalk') . '</span>';
                            echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                            echo '<line x1="5" y1="12" x2="19" y2="12"></line>';
                            echo '<polyline points="12 5 19 12 12 19"></polyline>';
                            echo '</svg>';
                            echo '</a>';
                        }
                        
                        echo '</div>'; // End .cosmic-pagination
                    }
                    ?>
                </div>
                
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
/* Hero Section Styles - Matching AI Intelligence Hub */
.hero-section {
    position: relative;
    background: linear-gradient(135deg, var(--cosmic-blue), var(--midnight-black));
    padding: 5rem 0 3rem;
    text-align: center;
    color: var(--text-white);
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(12, 30, 77, 0.7), rgba(5, 5, 16, 0.9));
    z-index: 1;
}

.hero-section .container {
    position: relative;
    z-index: 2;
}

.hero-section h1 {
    font-size: 4.5rem;
    color: var(--text-white);
    margin-bottom: 1.5rem;
    background: linear-gradient(to right, var(--neon-green), var(--electric-purple));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 0 20px rgba(57, 255, 20, 0.5);
}

.hero-section p {
    font-size: 2rem;
    color: var(--text-light-grey);
    margin-bottom: 3rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.search-filter {
    max-width: 600px;
    margin: 0 auto 2.5rem;
}

.search-form {
    display: flex;
}

.search-input {
    flex: 1;
    padding: 1.2rem 2rem;
    border: none;
    border-radius: 3rem 0 0 3rem;
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-white);
    font-size: 1.6rem;
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-filter .btn {
    padding: 1.2rem 2rem;
    border: none;
    border-radius: 0 3rem 3rem 0;
    cursor: pointer;
    font-weight: 600;
    font-size: 1.6rem;
}

.search-filter .btn-primary {
    background-color: var(--neon-green);
    color: var(--midnight-black);
}

.category-tags {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.tag {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    border-radius: 3rem;
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-white);
    font-size: 1.4rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.tag:hover, .tag.active {
    background-color: var(--neon-green);
    color: var(--midnight-black);
    transform: translateY(-2px);
}

/* Hide original archive header */
.archive-header {
    display: none;
}

/* Keep existing post grid styles */
.category-archive {
    background-color: var(--midnight-black);
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

/* Enhanced Pagination Styles */
.pagination-container {
    margin-top: 5rem;
    margin-bottom: 3rem;
    text-align: center;
}

.cosmic-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.page-numbers-container {
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.page-number {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-white);
    font-size: 1.6rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-number.current {
    background-color: var(--neon-green);
    color: var(--midnight-black);
    font-weight: 600;
    box-shadow: 0 0 15px rgba(57, 255, 20, 0.5);
    position: relative;
}

.page-number:not(.current):hover {
    background-color: var(--electric-purple);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(121, 40, 202, 0.4);
}

/* Arrow Buttons in Pagination */
.page-arrow {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 3.6rem;
    height: 3.6rem;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-white);
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-arrow.jump-arrow {
    background-color: rgba(121, 40, 202, 0.2);
}

.page-arrow:hover {
    background-color: var(--electric-purple);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 5px 15px rgba(121, 40, 202, 0.4);
}

.page-arrow.jump-arrow:hover {
    color: var(--neon-green);
}

.page-btn {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    background-color: rgba(255, 255, 255, 0.1);
    padding: 1rem 2rem;
    border-radius: 3rem;
    color: var(--text-white);
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-btn:hover {
    background-color: var(--electric-purple);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(121, 40, 202, 0.4);
}

.page-btn.prev-page svg,
.page-btn.next-page svg {
    transition: transform 0.3s ease;
}

.page-btn.prev-page:hover svg {
    transform: translateX(-5px);
}

.page-btn.next-page:hover svg {
    transform: translateX(5px);
}

/* Responsive styles */
@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 3.5rem;
    }
    
    .hero-section p {
        font-size: 1.6rem;
    }
    
    .search-input,
    .search-filter .btn {
        padding: 1rem 1.5rem;
        font-size: 1.4rem;
    }
    
    .cosmic-pagination {
        flex-direction: column;
        gap: 2rem;
    }
    
    .page-number {
        width: 3.5rem;
        height: 3.5rem;
        font-size: 1.4rem;
    }
    
    .page-arrow {
        width: 3.2rem;
        height: 3.2rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .hero-section h1 {
        font-size: 2.8rem;
    }
    
    .hero-section p {
        font-size: 1.4rem;
    }
    
    .tag {
        padding: 0.6rem 1.2rem;
        font-size: 1.2rem;
    }
    
    .page-btn span {
        display: none;
    }
    
    .page-btn {
        padding: 1rem;
    }
}
</style>