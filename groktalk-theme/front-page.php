<?php
/**
 * The front page template
 */

get_header();
?>

<main id="primary" class="site-main front-page">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php esc_html_e( 'Innovative AI Solutions', 'groktalk' ); ?></h1>
                <h2 class="hero-subtitle"><?php esc_html_e( 'for American Innovation', 'groktalk' ); ?></h2>
                <p class="hero-description"><?php esc_html_e( 'Meet @grokgirl - Your AI Navigator. Curious problem-solver, practical innovator, coffee enthusiast', 'groktalk' ); ?></p>
                
                <div class="hero-cta">
                    <a href="#contact" class="btn btn-primary"><?php esc_html_e( 'Ask a Question', 'groktalk' ); ?></a>
                    <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-project-readiness-checklist' ) ) ); ?>" class="btn btn-secondary">
                        <?php esc_html_e( 'Download Free Checklist', 'groktalk' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Snapshot -->
    <section class="about-snapshot">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/profile.jpg" alt="@grokgirl" class="profile-img">
                </div>
                <div class="about-text">
                    <blockquote>
                        <p><?php esc_html_e( '"Curious and quirky innovator who pushes boundaries but provides practical solutions"', 'groktalk' ); ?></p>
                    </blockquote>
                    <p class="credentials"><?php esc_html_e( 'AI Consultant | Prompt Engineer | American Tech Advocate', 'groktalk' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Content -->
    <section class="featured-content">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'Latest Insights', 'groktalk' ); ?></h2>
            
            <?php
            $featured_posts = new WP_Query( array(
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            ) );
            
            if ( $featured_posts->have_posts() ) : ?>
                <div class="featured-grid">
                    <?php while ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>
                        <article class="featured-post">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="post-category"><?php echo get_the_category_list( ', ' ); ?></span>
                                    <span class="post-date"><?php echo get_the_date(); ?></span>
                                </div>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="post-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'groktalk' ); ?> →</a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- AI Knowledge Grid -->
    <section class="knowledge-grid-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'Explore AI Knowledge', 'groktalk' ); ?></h2>
            
            <div class="knowledge-grid">
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-implementations' ) ) ); ?>" class="knowledge-card">
                    <div class="icon-wrapper">🚀</div>
                    <h3><?php esc_html_e( 'AI Implementations', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Real-world projects', 'groktalk' ); ?></p>
                </a>
                
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-safety-security' ) ) ); ?>" class="knowledge-card">
                    <div class="icon-wrapper">🛡️</div>
                    <h3><?php esc_html_e( 'AI Safety & Security', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Secure AI protocols', 'groktalk' ); ?></p>
                </a>
                
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-prompting' ) ) ); ?>" class="knowledge-card">
                    <div class="icon-wrapper">💭</div>
                    <h3><?php esc_html_e( 'AI Prompting', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Master AI communication', 'groktalk' ); ?></p>
                </a>
                
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-tools' ) ) ); ?>" class="knowledge-card">
                    <div class="icon-wrapper">🛠️</div>
                    <h3><?php esc_html_e( 'AI Tools', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Honest evaluations', 'groktalk' ); ?></p>
                </a>
                
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'new-in-ai' ) ) ); ?>" class="knowledge-card large">
                    <div class="icon-wrapper">⚡</div>
                    <h3><?php esc_html_e( 'New in AI', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Latest innovations and trends', 'groktalk' ); ?></p>
                </a>
            </div>
        </div>
    </section>

    <!-- Lead Magnet -->
    <section class="lead-magnet-section">
        <div class="container">
            <div class="lead-magnet-content">
                <h2><?php esc_html_e( 'Get Your Free AI Project Readiness Checklist', 'groktalk' ); ?></h2>
                <p><?php esc_html_e( 'Evaluate your organization\'s AI readiness in minutes', 'groktalk' ); ?></p>
                
                <form class="lead-form" id="lead-form">
                    <div class="form-group">
                        <input type="email" placeholder="<?php esc_attr_e( 'Enter your email', 'groktalk' ); ?>" required>
                        <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Download Now', 'groktalk' ); ?></button>
                    </div>
                    <p class="form-note"><?php esc_html_e( 'No spam. Unsubscribe anytime.', 'groktalk' ); ?></p>
                </form>
            </div>
        </div>
    </section>

    <!-- Project Showcase -->
    <section class="project-showcase-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'Innovation Spotlight', 'groktalk' ); ?></h2>
            
            <div class="showcase-grid">
                <div class="showcase-card">
                    <div class="card-header">
                        <h3><?php esc_html_e( 'Live AI Application', 'groktalk' ); ?></h3>
                        <p><?php esc_html_e( 'Real-time demo running', 'groktalk' ); ?></p>
                    </div>
                    <div class="card-content">
                        <ul class="metrics-list">
                            <li><?php esc_html_e( '• 95% accuracy', 'groktalk' ); ?></li>
                            <li><?php esc_html_e( '• 200ms response', 'groktalk' ); ?></li>
                            <li><?php esc_html_e( '• Multi-model support', 'groktalk' ); ?></li>
                        </ul>
                        <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'innovation-spotlight' ) ) ); ?>" class="btn btn-secondary">
                            <?php esc_html_e( 'Try Demo', 'groktalk' ); ?>
                        </a>
                    </div>
                </div>
                
                <div class="showcase-card">
                    <div class="card-header">
                        <h3><?php esc_html_e( 'Prompt Hacking Lab', 'groktalk' ); ?></h3>
                        <p><?php esc_html_e( 'Testing boundaries', 'groktalk' ); ?></p>
                    </div>
                    <div class="card-content">
                        <ul class="metrics-list">
                            <li><?php esc_html_e( '• Bypass techniques', 'groktalk' ); ?></li>
                            <li><?php esc_html_e( '• Safety loopholes', 'groktalk' ); ?></li>
                            <li><?php esc_html_e( '• Novel approaches', 'groktalk' ); ?></li>
                        </ul>
                        <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'innovation-spotlight' ) ) ); ?>" class="btn btn-purple">
                            <?php esc_html_e( 'View Tests', 'groktalk' ); ?>
                        </a>
                    </div>
                </div>
                
                <div class="showcase-card">
                    <div class="card-header">
                        <h3><?php esc_html_e( 'Code Repository', 'groktalk' ); ?></h3>
                        <p><?php esc_html_e( 'Open source tools', 'groktalk' ); ?></p>
                    </div>
                    <div class="card-content">
                        <ul class="metrics-list">
                            <li><?php esc_html_e( '• Prompt templates', 'groktalk' ); ?></li>
                            <li><?php esc_html_e( '• API integrations', 'groktalk' ); ?></li>
                            <li><?php esc_html_e( '• Tool evaluations', 'groktalk' ); ?></li>
                        </ul>
                        <a href="https://github.com/grokgirl" class="btn btn-secondary" target="_blank">
                            <?php esc_html_e( 'View GitHub', 'groktalk' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Job Board Preview -->
    <section class="job-board-preview">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'AI Job Board Preview', 'groktalk' ); ?></h2>
            
            <div class="job-cards">
                <div class="job-card">
                    <h3><?php esc_html_e( 'Senior Prompt Engineer', 'groktalk' ); ?></h3>
                    <div class="job-meta">
                        <span><?php esc_html_e( 'RemoteTech Inc. • Remote', 'groktalk' ); ?></span>
                        <span><?php esc_html_e( '$120k-180k', 'groktalk' ); ?></span>
                    </div>
                    <p><?php esc_html_e( '5+ years experience • LLM expertise required', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-jobs' ) ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Apply Now', 'groktalk' ); ?>
                    </a>
                </div>
                
                <div class="job-card">
                    <h3><?php esc_html_e( 'AI Product Manager', 'groktalk' ); ?></h3>
                    <div class="job-meta">
                        <span><?php esc_html_e( 'TechGiant Corp • Hybrid', 'groktalk' ); ?></span>
                        <span><?php esc_html_e( '$140k-200k', 'groktalk' ); ?></span>
                    </div>
                    <p><?php esc_html_e( 'Agile experience • AI product strategy', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-jobs' ) ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Apply Now', 'groktalk' ); ?>
                    </a>
                </div>
                
                <div class="job-card browse-all">
                    <h3><?php esc_html_e( 'View All AI Jobs', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( '200+ Opportunities', 'groktalk' ); ?></p>
                    <p><?php esc_html_e( 'Remote • Hybrid • Onsite', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-jobs' ) ) ); ?>" class="btn btn-purple">
                        <?php esc_html_e( 'Browse All Jobs', 'groktalk' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2><?php esc_html_e( 'Join the cosmic crew newsletter', 'groktalk' ); ?></h2>
                <p><?php esc_html_e( 'Get weekly AI intelligence delivered to your inbox', 'groktalk' ); ?></p>
                
                <form class="newsletter-form" id="newsletter-form">
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
/* Front Page Styles */
.front-page {
    background-color: var(--midnight-black);
}

.about-snapshot {
    padding: 5rem 0;
    background-color: var(--cosmic-web-grey);
}

.about-content {
    display: flex;
    align-items: center;
    gap: 3rem;
    max-width: 900px;
    margin: 0 auto;
}

.profile-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 3px solid var(--neon-green);
}

.about-text blockquote {
    font-size: 1.5rem;
    font-style: italic;
    margin-bottom: 1rem;
}

.credentials {
    color: var(--text-light-grey);
}

.featured-content {
    padding: 5rem 0;
}

.featured-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.featured-post {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.featured-post:hover {
    transform: translateY(-10px);
}

.post-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.post-content {
    padding: 1.5rem;
}

.post-meta {
    font-size: 0.9rem;
    color: var(--text-light-grey);
    margin-bottom: 1rem;
}

.post-title a {
    color: var(--text-white);
    transition: color 0.3s ease;
}

.post-title a:hover {
    color: var(--neon-green);
}

.read-more {
    color: var(--electric-purple);
    display: inline-block;
    margin-top: 1rem;
}

.knowledge-grid-section {
    padding: 5rem 0;
    background-color: var(--cosmic-blue);
}

.knowledge-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.knowledge-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.knowledge-card:hover {
    transform: translateY(-5px);
    border-color: var(--neon-green);
}

.knowledge-card.large {
    grid-column: span 2;
}

.icon-wrapper {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.knowledge-card h3 {
    color: var(--text-white);
    margin-bottom: 0.5rem;
}

.knowledge-card p {
    color: var(--text-light-grey);
}

.lead-magnet-section {
    padding: 5rem 0;
    background-color: var(--cosmic-blue);
}

.lead-magnet-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.lead-form .form-group {
    display: flex;
    gap: 1rem;
    max-width: 600px;
    margin: 2rem auto;
}

.lead-form input {
    flex: 1;
}

.showcase-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.showcase-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    background-color: var(--cosmic-blue);
    padding: 1.5rem;
}

.card-content {
    padding: 1.5rem;
}

.metrics-list {
    list-style: none;
    margin-bottom: 1.5rem;
}

.metrics-list li {
    color: var(--text-light-grey);
    margin-bottom: 0.5rem;
}

.job-board-preview {
    padding: 5rem 0;
    background-color: var(--cosmic-blue);
}

.job-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.job-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    padding: 1.5rem;
}

.job-card h3 {
    color: var(--neon-green);
    margin-bottom: 0.5rem;
}

.job-meta {
    color: var(--text-light-grey);
    margin-bottom: 1rem;
}

.job-card p {
    color: var(--text-light-grey);
    margin-bottom: 1rem;
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

.newsletter-form .form-group {
    display: flex;
    gap: 1rem;
    max-width: 600px;
    margin: 2rem auto;
}

.newsletter-form input {
    flex: 1;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--text-white);
}

@media (max-width: 768px) {
    .about-content {
        flex-direction: column;
        text-align: center;
    }
    
    .lead-form .form-group,
    .newsletter-form .form-group {
        flex-direction: column;
    }
    
    .knowledge-card.large {
        grid-column: span 1;
    }
}
</style>