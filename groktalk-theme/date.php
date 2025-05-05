<?php
/**
 * The template for displaying Date Archive pages
 */

get_header();
?>

<main id="primary" class="site-main date-archive">
    <header class="archive-header">
        <div class="container">
            <div class="date-hero">
                <span class="date-label"><?php esc_html_e( 'Archive', 'groktalk' ); ?></span>
                <h1 class="archive-title">
                    <?php
                    if ( is_year() ) {
                        printf( esc_html__( 'Year: %s', 'groktalk' ), get_the_date( _x( 'Y', 'yearly archives date format', 'groktalk' ) ) );
                    } elseif ( is_month() ) {
                        printf( esc_html__( '%s', 'groktalk' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'groktalk' ) ) );
                    } elseif ( is_day() ) {
                        printf( esc_html__( '%s', 'groktalk' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'groktalk' ) ) );
                    }
                    ?>
                </h1>
                
                <div class="date-description">
                    <?php
                    $post_count = $wp_query->found_posts;
                    printf( _n( '%s article', '%s articles', $post_count, 'groktalk' ), number_format_i18n( $post_count ) );
                    ?>
                </div>
                
                <!-- Date Navigation -->
                <div class="date-navigation">
                    <?php
                    $next_year = date('Y', strtotime('+1 year', strtotime(get_the_date('Y-m-d'))));
                    $next_month = date('Y-m', strtotime('+1 month', strtotime(get_the_date('Y-m-d'))));
                    $prev_year = date('Y', strtotime('-1 year', strtotime(get_the_date('Y-m-d'))));
                    $prev_month = date('Y-m', strtotime('-1 month', strtotime(get_the_date('Y-m-d'))));
                    
                    if (is_year()) :
                        $current_year = get_the_date('Y');
                        ?>
                        <a href="<?php echo get_year_link($prev_year); ?>" class="nav-link prev">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            <?php echo $prev_year; ?>
                        </a>
                        <a href="<?php echo get_year_link($next_year); ?>" class="nav-link next">
                            <?php echo $next_year; ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    <?php elseif (is_month()) :
                        $month_parts = explode('-', $prev_month);
                        $next_parts = explode('-', $next_month);
                        ?>
                        <a href="<?php echo get_month_link($month_parts[0], $month_parts[1]); ?>" class="nav-link prev">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            <?php echo date('F Y', strtotime($prev_month . '-01')); ?>
                        </a>
                        <a href="<?php echo get_month_link($next_parts[0], $next_parts[1]); ?>" class="nav-link next">
                            <?php echo date('F Y', strtotime($next_month . '-01')); ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <section class="archive-content">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="posts-timeline">
                    <?php 
                    $current_month = '';
                    while ( have_posts() ) : the_post();
                        $post_month = get_the_date('F Y');
                        
                        if ($post_month !== $current_month && is_year()) :
                            if ($current_month !== '') :
                                echo '</div>'; // Close previous month group
                            endif;
                            echo '<div class="month-group">';
                            echo '<h2 class="month-heading">' . $post_month . '</h2>';
                            $current_month = $post_month;
                        endif;
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('timeline-post'); ?>>
                            <div class="post-marker">
                                <div class="marker-dot"></div>
                                <div class="marker-date">
                                    <span class="day"><?php echo get_the_date('d'); ?></span>
                                    <span class="month-abbr"><?php echo get_the_date('M'); ?></span>
                                </div>
                            </div>
                            
                            <div class="post-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <header class="entry-header">
                                        <div class="post-meta">
                                            <span class="post-category">
                                                <?php 
                                                $categories = get_the_category();
                                                if ( ! empty( $categories ) ) {
                                                    echo esc_html( $categories[0]->name );
                                                }
                                                ?>
                                            </span>
                                            <span class="post-time">
                                                <?php echo get_the_time('g:i A'); ?>
                                            </span>
                                        </div>
                                        
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                    </header>
                                    
                                    <div class="entry-excerpt">
                                        <?php echo wp_trim_words( get_the_excerpt(), 25 ); ?>
                                    </div>
                                    
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more-link">
                                            <?php esc_html_e( 'Read Article', 'groktalk' ); ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    <?php 
                    endwhile;
                    if (is_year() && $current_month !== '') :
                        echo '</div>'; // Close last month group
                    endif;
                    ?>
                </div>
                
                <?php the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => sprintf(
                        '<span class="nav-prev-text">%s</span>',
                        esc_html__( 'Previous Page', 'groktalk' )
                    ),
                    'next_text' => sprintf(
                        '<span class="nav-next-text">%s</span>',
                        esc_html__( 'Next Page', 'groktalk' )
                    ),
                ) ); ?>
                
            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e( 'No posts found', 'groktalk' ); ?></h2>
                    <p><?php esc_html_e( 'No content was published during this period.', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Browse All Posts', 'groktalk' ); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<style>
.date-archive {
    background-color: var(--midnight-black);
}

.archive-header {
    background: linear-gradient(135deg, var(--cosmic-blue), var(--midnight-black));
    padding: 5rem 0 3rem;
}

.date-hero {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.date-label {
    display: inline-block;
    background-color: var(--electric-purple);
    color: var(--text-white);
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

.date-description {
    color: var(--text-light-grey);
    margin-bottom: 2rem;
}

.date-navigation {
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.nav-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--neon-green);
    transition: all 0.3s ease;
    text-decoration: none;
}

.nav-link:hover {
    color: var(--electric-purple);
}

.archive-content {
    padding: 5rem 0;
}

.posts-timeline {
    position: relative;
    padding-left: 3rem;
}

.posts-timeline::before {
    content: '';
    position: absolute;
    left: 1rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background-color: var(--cosmic-web-grey);
}

.month-group {
    margin-bottom: 4rem;
}

.month-heading {
    color: var(--neon-green);
    font-size: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
    left: -2rem;
}

.timeline-post {
    position: relative;
    margin-bottom: 3rem;
}

.post-marker {
    position: absolute;
    left: -3rem;
    width: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.marker-dot {
    width: 12px;
    height: 12px;
    background-color: var(--neon-green);
    border-radius: 50%;
    position: relative;
    z-index: 2;
    border: 3px solid var(--midnight-black);
}

.marker-date {
    margin-top: 0.5rem;
    text-align: center;
}

.day {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--neon-green);
    display: block;
}

.month-abbr {
    font-size: 0.9rem;
    color: var(--starlight-silver);
}

.post-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    gap: 1.5rem;
    transition: all 0.3s ease;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.post-thumbnail {
    width: 300px;
    flex-shrink: 0;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-content {
    padding: 1.5rem;
    flex: 1;
}

.post-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 0.5rem;
}

.post-category {
    background-color: var(--electric-purple);
    color: var(--text-white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
}

.post-time {
    color: var(--starlight-silver);
    font-size: 0.9rem;
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
    margin-bottom: 1rem;
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

@media (max-width: 768px) {
    .posts-timeline {
        padding-left: 2rem;
    }
    
    .post-marker {
        left: -2rem;
    }
    
    .post-card {
        flex-direction: column;
    }
    
    .post-thumbnail {
        width: 100%;
        height: 200px;
    }
    
    .month-heading {
        left: -1rem;
    }
}
</style>