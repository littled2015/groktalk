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

    <!-- Lead Magnet (Project Readiness) -->
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

    <!-- AI Knowledge Grid with Latest Insights -->
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
                
                <!-- Latest Insights Card (relocated) -->
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="knowledge-card">
                    <div class="icon-wrapper">📝</div>
                    <h3><?php esc_html_e( 'Latest Insights', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Fresh AI perspectives', 'groktalk' ); ?></p>
                </a>
                
                <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'new-in-ai' ) ) ); ?>" class="knowledge-card">
                    <div class="icon-wrapper">⚡</div>
                    <h3><?php esc_html_e( 'New in AI', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Latest innovations and trends', 'groktalk' ); ?></p>
                </a>
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

    <!-- Project Showcase (Innovation Spotlight) -->
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

    <!-- NEW: AI Tool Directory Section -->
    <section class="tool-directory-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'AI Tool Directory', 'groktalk' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Discover and submit the latest AI tools', 'groktalk' ); ?></p>
            
            <div class="directory-features">
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3><?php esc_html_e( 'Search Tools', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Find the perfect AI tool for your specific needs', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/ai-tool-directory/' ) ); ?>" class="btn btn-outline">Browse Directory</a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3><?php esc_html_e( 'Compare Features', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Side-by-side comparisons of leading AI tools', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/ai-tool-comparison/' ) ); ?>" class="btn btn-outline">Compare Tools</a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3><?php esc_html_e( 'Submit Your Tool', 'groktalk' ); ?></h3>
                    <p><?php esc_html_e( 'Add your AI tool to our growing directory', 'groktalk' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/submit-ai-tool/' ) ); ?>" class="btn btn-outline">Submit Now</a>
                </div>
            </div>
            
            <div class="directory-cta">
                <h3><?php esc_html_e( 'Featured in our directory', 'groktalk' ); ?></h3>
                <div class="tool-logos">
                    <!-- Tool logos would go here -->
                    <div class="tool-logo-placeholder">Tool 1</div>
                    <div class="tool-logo-placeholder">Tool 2</div>
                    <div class="tool-logo-placeholder">Tool 3</div>
                    <div class="tool-logo-placeholder">Tool 4</div>
                    <div class="tool-logo-placeholder">Tool 5</div>
                </div>
                <a href="<?php echo esc_url( home_url( '/ai-tool-directory/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Explore All Tools', 'groktalk' ); ?></a>
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

</main>

<?php get_footer(); ?>

<style>
/* Front Page Styles - Updated with more purples/blues, less green */
.front-page {
    background-color: var(--midnight-black);
}

/* Updated hero section with fixed logo support */
.hero-section {
    background: linear-gradient(135deg, var(--electric-purple), var(--cosmic-blue));
    padding: 16rem 0 8rem; /* Increased top padding to accommodate fixed header/logo */
    text-align: center;
    position: relative;
    overflow: hidden;
    margin-top: -80px; /* Negative margin to counter the site-content padding */
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 80rem;
    margin: 0 auto;
}

.hero-title {
    font-size: 6rem;
    background: linear-gradient(to right, var(--text-white), var(--starlight-silver));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
}

.hero-subtitle {
    font-size: 2.8rem;
    color: var(--text-white);
    margin-bottom: 2rem;
}

.hero-description {
    font-size: 1.8rem;
    color: var(--text-light-grey);
    margin-bottom: 3rem;
    max-width: 70ch;
    margin-left: auto;
    margin-right: auto;
}

.hero-cta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 2rem;
}

/* Admin bar adjustments */
.admin-bar .hero-section {
    margin-top: -112px; /* For admin bar on desktop */
}

/* Knowledge Grid Section with more blues and purples */
.knowledge-grid-section {
    padding: 6rem 0;
    background-color: var(--cosmic-web-grey);
    position: relative;
    overflow: hidden;
}

.knowledge-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.knowledge-card {
    background-color: var(--midnight-black);
    border-radius: 1rem;
    padding: 2.5rem;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(138, 43, 226, 0.2);
    text-decoration: none;
}

.knowledge-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3);
    border-color: var(--electric-purple);
}

.icon-wrapper {
    font-size: 3rem;
    margin-bottom: 1.5rem;
}

.knowledge-card h3 {
    color: var(--text-white);
    margin-bottom: 1rem;
    font-size: 2rem;
}

.knowledge-card p {
    color: var(--text-cosmic-grey);
    font-size: 1.6rem;
}

/* Newsletter with lighter background */
.newsletter-section {
    padding: 5rem 0;
    background-color: var(--light-bg);
    color: var(--midnight-black);
}

.newsletter-content {
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
}

.newsletter-content h2 {
    font-size: 3rem;
    color: var(--midnight-black);
    margin-bottom: 1.5rem;
}

.newsletter-content p {
    color: var(--cosmic-web-grey);
    font-size: 1.8rem;
    margin-bottom: 2.5rem;
}

.newsletter-form .form-group {
    display: flex;
    gap: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.newsletter-form input {
    flex: 1;
    padding: 1.5rem;
    border: 1px solid var(--cosmic-web-grey);
    border-radius: 0.5rem;
    font-size: 1.6rem;
    color: var(--midnight-black);
}

.form-note {
    margin-top: 1rem;
    font-size: 1.4rem;
    color: var(--cosmic-web-grey);
}

/* Lead Magnet Section */
.lead-magnet-section {
    padding: 6rem 0;
    background-color: var(--midnight-black);
    position: relative;
}

.lead-magnet-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    padding: 4rem;
    background-color: rgba(138, 43, 226, 0.1);
    border-radius: 2rem;
    border: 1px solid rgba(138, 43, 226, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.lead-magnet-content h2 {
    font-size: 3rem;
    color: var(--text-white);
    margin-bottom: 1.5rem;
}

.lead-magnet-content p {
    color: var(--text-light-grey);
    font-size: 1.8rem;
    margin-bottom: 2.5rem;
}

.lead-form .form-group {
    display: flex;
    gap: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.lead-form input {
    flex: 1;
    padding: 1.5rem;
    border-radius: 0.5rem;
    font-size: 1.6rem;
}

/* Project Showcase Section */
.project-showcase-section {
    padding: 6rem 0;
    background-color: var(--cosmic-blue);
}

.showcase-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
    margin-top: 3rem;
}

.showcase-card {
    background-color: var(--midnight-black);
    border-radius: 1rem;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.showcase-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    border-color: var(--electric-purple);
}

.card-header {
    background-color: var(--midnight-black);
    padding: 2rem;
    border-bottom: 1px solid rgba(138, 43, 226, 0.2);
}

.card-header h3 {
    color: var(--electric-purple);
    margin-bottom: 0.5rem;
    font-size: 2rem;
}

.card-header p {
    color: var(--text-cosmic-grey);
}

.card-content {
    padding: 2rem;
}

.metrics-list {
    list-style: none;
    margin-bottom: 2rem;
}

.metrics-list li {
    color: var(--text-light-grey);
    margin-bottom: 1rem;
    font-size: 1.6rem;
}

/* NEW: Tool Directory Section with white background */
.tool-directory-section {
    padding: 6rem 0;
    background-color: var(--light-bg);
    color: var(--midnight-black);
}

.tool-directory-section .section-title {
    color: var(--midnight-black);
}

.tool-directory-section .section-subtitle {
    color: var(--cosmic-web-grey);
    font-size: 1.8rem;
    max-width: 700px;
    margin: 0 auto 3rem;
    text-align: center;
}

.directory-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 3rem;
    margin-bottom: 4rem;
}

.feature-card {
    background-color: var(--starlight-silver);
    border-radius: 1rem;
    padding: 3rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    font-size: 4rem;
    margin-bottom: 1.5rem;
}

.feature-card h3 {
    color: var(--midnight-black);
    margin-bottom: 1rem;
    font-size: 2.2rem;
}

.feature-card p {
    color: var(--cosmic-web-grey);
    margin-bottom: 2rem;
    font-size: 1.6rem;
}

.btn-outline {
    background-color: transparent;
    border: 2px solid var(--electric-purple);
    color: var(--electric-purple);
    display: inline-block;
    padding: 1rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-outline:hover {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-3px);
}

.directory-cta {
    text-align: center;
    margin-top: 4rem;
    padding-top: 4rem;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.directory-cta h3 {
    color: var(--midnight-black);
    margin-bottom: 2rem;
    font-size: 2.2rem;
}

.tool-logos {
    display: flex;
    justify-content: center;
    gap: 3rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.tool-logo-placeholder {
    width: 120px;
    height: 60px;
    background-color: var(--starlight-silver);
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 0.5rem;
    color: var(--midnight-black);
    border: 1px solid rgba(0, 0, 0, 0.1);
}

/* Job Board Section */
.job-board-preview {
    padding: 6rem 0;
    background-color: var(--midnight-black);
}

.job-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
    margin-top: 3rem;
}

.job-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 1rem;
    padding: 2.5rem;
    border: 1px solid rgba(138, 43, 226, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.job-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    border-color: var(--electric-purple);
}

.job-card h3 {
    color: var(--text-white);
    margin-bottom: 1rem;
    font-size: 2rem;
}

.job-meta {
    display: flex;
    justify-content: space-between;
    color: var(--text-cosmic-grey);
    margin-bottom: 1.5rem;
    font-size: 1.4rem;
}

.job-card p {
    color: var(--text-light-grey);
    margin-bottom: 2rem;
    font-size: 1.6rem;
}

.job-card .btn {
    width: 100%;
}

/* Responsive adjustments */
@media (max-width: 782px) {
    .admin-bar .hero-section {
        margin-top: -126px; /* For admin bar on mobile */
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 12rem 0 6rem; /* Adjusted for mobile */
    }
    
    .hero-title {
        font-size: 4rem;
    }
    
    .hero-subtitle {
        font-size: 2.2rem;
    }
    
    .hero-description {
        font-size: 1.6rem;
    }
    
    .hero-cta {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-cta .btn {
        width: 100%;
    }
    
    .newsletter-form .form-group, 
    .lead-form .form-group {
        flex-direction: column;
    }
    
    .newsletter-form .form-group input, 
    .lead-form .form-group input, 
    .newsletter-form .form-group button, 
    .lead-form .form-group button {
        width: 100%;
    }
    
    .directory-features {
        grid-template-columns: 1fr;
    }
    
    .tool-logos {
        flex-direction: column;
        align-items: center;
    }
    
    .tool-logo-placeholder {
        width: 80%;
        max-width: 200px;
        margin-bottom: 1rem;
    }
    
    .job-cards {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .hero-section {
        padding: 10rem 0 5rem; /* Further reduced for smaller screens */
    }
    
    .hero-title {
        font-size: 3.2rem;
    }
    
    .hero-subtitle {
        font-size: 1.8rem;
    }
    
    .lead-magnet-content,
    .showcase-card,
    .job-card,
    .feature-card {
        padding: 2rem 1.5rem;
    }
    
    .directory-cta h3 {
        font-size: 1.8rem;
    }
    
    .knowledge-grid,
    .showcase-grid {
        grid-template-columns: 1fr;
    }
}
</style>