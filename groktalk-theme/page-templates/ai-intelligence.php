<?php
/*
Template Name: AI Intelligence Hub
*/
get_header(); ?>

<main class="ai-intelligence-page">
    <section class="hero-section">
        <div class="container">
            <h1>AI Intelligence Hub</h1>
            <p>Stay ahead with cutting-edge AI insights</p>
            
            <div class="search-filter">
                <input type="text" placeholder="Search AI Intelligence...">
                <button class="btn btn-primary">🔍 Search</button>
            </div>
            
            <div class="category-tags">
                <a href="#" class="tag active">Latest</a>
                <a href="#" class="tag">Safety</a>
                <a href="#" class="tag">Prompting</a>
                <a href="#" class="tag">Tools</a>
                <a href="#" class="tag">Trends</a>
            </div>
        </div>
    </section>

    <section class="featured-content">
        <div class="container">
            <h2>Featured Intelligence</h2>
            <?php
            // Query for featured posts
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'meta_key' => 'featured',
                'meta_value' => '1'
            );
            $featured_query = new WP_Query($args);
            
            if ($featured_query->have_posts()) :
                echo '<div class="featured-grid">';
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    ?>
                    <article class="featured-card">
                        <h3><?php the_title(); ?></h3>
                        <div class="post-meta">
                            <span>Published: <?php the_date(); ?></span>
                            <span><?php echo groktalk_get_reading_time(get_the_content()); ?> min read</span>
                        </div>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                    </article>
                    <?php
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <!-- Add more sections as per wireframe -->
</main>

<?php get_footer(); ?>