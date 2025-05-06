<?php
/*
Template Name: Cosmic Home
*/
get_header();
?>

<!-- Hero Section -->
<section class="hero-section cosmic-hero">
    <div class="cosmic-background"></div>
    <div class="neon-grid"></div>
    <div class="stars"></div>
    <div class="particles">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title animate-on-scroll">Innovative AI Solutions</h1>
            <h2 class="hero-subtitle animate-on-scroll">for American Innovation</h2>
            <p class="hero-description animate-on-scroll">Meet @grokgirl - Your AI Navigator. Curious problem-solver, practical innovator, coffee enthusiast</p>
            
            <div class="hero-cta animate-on-scroll">
                <a href="#contact" class="btn btn-primary glow-animation">Ask a Question</a>
                <a href="#checklist" class="btn btn-secondary">Download Free Checklist</a>
            </div>
            
            <div class="hero-scroll-indicator">
                <a href="#about" class="scroll-down">
                    <span class="mouse">
                        <span class="mouse-wheel"></span>
                    </span>
                    <span class="scroll-text">Scroll Down</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Snapshot -->
<section id="about" class="about-snapshot">
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
                    <article class="featured-post content-card animate-on-scroll">
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
                            <a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e( 'Read More', 'groktalk' ); ?> →</a>
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
            <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-implementations' ) ) ); ?>" class="knowledge-card animate-on-scroll">
                <div class="icon-wrapper">🚀</div>
                <h3><?php esc_html_e( 'AI Implementations', 'groktalk' ); ?></h3>
                <p><?php esc_html_e( 'Real-world projects', 'groktalk' ); ?></p>
            </a>
            
            <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-safety-security' ) ) ); ?>" class="knowledge-card animate-on-scroll">
                <div class="icon-wrapper">🛡️</div>
                <h3><?php esc_html_e( 'AI Safety & Security', 'groktalk' ); ?></h3>
                <p><?php esc_html_e( 'Secure AI protocols', 'groktalk' ); ?></p>
            </a>
            
            <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-prompting' ) ) ); ?>" class="knowledge-card animate-on-scroll">
                <div class="icon-wrapper">💭</div>
                <h3><?php esc_html_e( 'AI Prompting', 'groktalk' ); ?></h3>
                <p><?php esc_html_e( 'Master AI communication', 'groktalk' ); ?></p>
            </a>
            
            <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'ai-tools' ) ) ); ?>" class="knowledge-card animate-on-scroll">
                <div class="icon-wrapper">🛠️</div>
                <h3><?php esc_html_e( 'AI Tools', 'groktalk' ); ?></h3>
                <p><?php esc_html_e( 'Honest evaluations', 'groktalk' ); ?></p>
            </a>
            
            <a href="<?php echo esc_url( get_page_link( get_page_by_path( 'new-in-ai' ) ) ); ?>" class="knowledge-card large animate-on-scroll">
                <div class="icon-wrapper">⚡</div>
                <h3><?php esc_html_e( 'New in AI', 'groktalk' ); ?></h3>
                <p><?php esc_html_e( 'Latest innovations and trends', 'groktalk' ); ?></p>
            </a>
        </div>
    </div>
</section>

<!-- Lead Magnet -->
<section id="checklist" class="lead-magnet-section">
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
            <div class="showcase-card animate-on-scroll">
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
            
            <div class="showcase-card animate-on-scroll">
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
            
            <div class="showcase-card animate-on-scroll">
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

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e( 'Get in Touch', 'groktalk' ); ?></h2>
        <p class="section-subtitle"><?php esc_html_e( 'Have questions about AI implementation or want to collaborate? Reach out!', 'groktalk' ); ?></p>
        
        <div class="contact-form-container">
            <form class="contact-form" id="contact-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name"><?php esc_html_e( 'Your Name', 'groktalk' ); ?></label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><?php esc_html_e( 'Your Email', 'groktalk' ); ?></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject"><?php esc_html_e( 'Subject', 'groktalk' ); ?></label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message"><?php esc_html_e( 'Message', 'groktalk' ); ?></label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Send Message', 'groktalk' ); ?></button>
                </div>
            </form>
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

<!-- Custom Hero CSS -->
<style>
.cosmic-hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--hero-gradient);
    overflow: hidden;
    padding: 8rem 0;
}

.cosmic-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center, rgba(12, 30, 77, 0.5) 0%, rgba(5, 5, 16, 0.8) 100%);
    z-index: 1;
}

.stars {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
}

.star {
    position: absolute;
    background-color: #fff;
    border-radius: 50%;
    animation: twinkle 3s infinite ease-in-out;
}

@keyframes twinkle {
    0%, 100% {
        opacity: 0.5;
        transform: scale(1);
    }
    50% {
        opacity: 1;
        transform: scale(1.2);
    }
}

.neon-grid {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        linear-gradient(rgba(57, 255, 20, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(57, 255, 20, 0.05) 1px, transparent 1px);
    background-size: 50px 50px;
    z-index: 3;
    animation: gridFloat 20s linear infinite;
}

@keyframes gridFloat {
    0% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.05);
    }
    100% {
        transform: translateY(0) scale(1);
    }
}

.particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 4;
}

.particle {
    position: absolute;
    border-radius: 50%;
    filter: blur(5px);
    animation: floatParticle 15s infinite ease-in-out;
}

.particle-1 {
    width: 100px;
    height: 100px;
    background: radial-gradient(circle at center, rgba(57, 255, 20, 0.3) 0%, transparent 70%);
    top: 15%;
    left: 10%;
    animation-duration: 25s;
}

.particle-2 {
    width: 150px;
    height: 150px;
    background: radial-gradient(circle at center, rgba(138, 43, 226, 0.3) 0%, transparent 70%);
    top: 70%;
    left: 80%;
    animation-duration: 20s;
    animation-delay: -5s;
}

.particle-3 {
    width: 80px;
    height: 80px;
    background: radial-gradient(circle at center, rgba(57, 255, 20, 0.2) 0%, transparent 70%);
    top: 40%;
    left: 75%;
    animation-duration: 18s;
    animation-delay: -8s;
}

.particle-4 {
    width: 120px;
    height: 120px;
    background: radial-gradient(circle at center, rgba(138, 43, 226, 0.2) 0%, transparent 70%);
    top: 80%;
    left: 20%;
    animation-duration: 22s;
    animation-delay: -12s;
}

.particle-5 {
    width: 200px;
    height: 200px;
    background: radial-gradient(circle at center, rgba(57, 255, 20, 0.15) 0%, transparent 70%);
    top: 20%;
    left: 60%;
    animation-duration: 30s;
    animation-delay: -15s;
}

@keyframes floatParticle {
    0%, 100% {
        transform: translate(0, 0);
    }
    25% {
        transform: translate(50px, -30px);
    }
    50% {
        transform: translate(20px, 50px);
    }
    75% {
        transform: translate(-30px, 20px);
    }
}

.hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.hero-title {
    font-size: 7.2rem;
    margin-bottom: 1.5rem;
    background: linear-gradient(to right, var(--neon-green), var(--electric-purple));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 0 20px rgba(57, 255, 20, 0.5);
    animation: glowPulse 3s infinite alternate;
}

@keyframes glowPulse {
    0% {
        text-shadow: 0 0 20px rgba(57, 255, 20, 0.5);
    }
    100% {
        text-shadow: 0 0 40px rgba(57, 255, 20, 0.8);
    }
}

.hero-subtitle {
    font-size: 3.2rem;
    color: var(--neon-green);
    margin-bottom: 2.5rem;
    font-weight: 500;
}

.hero-description {
    font-size: 2rem;
    color: var(--text-light-grey);
    margin-bottom: 4rem;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.hero-cta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 5rem;
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 3rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
}

.scroll-down {
    display: flex;
    flex-direction: column;
    align-items: center;
    animation: float 2s infinite ease-in-out;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.mouse {
    width: 30px;
    height: 50px;
    border: 2px solid var(--neon-green);
    border-radius: 20px;
    display: flex;
    justify-content: center;
    padding-top: 10px;
}

.mouse-wheel {
    width: 6px;
    height: 10px;
    background-color: var(--neon-green);
    border-radius: 3px;
    animation: scroll 1.5s infinite;
}

@keyframes scroll {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(10px);
    }
    100% {
        transform: translateY(0);
    }
}

.scroll-text {
    color: var(--text-light-grey);
    margin-top: 1rem;
    font-size: 1.4rem;
}

/* Additional Section Styles */
.contact-section {
    padding: 8rem 0;
    background-color: var(--cosmic-web-grey);
}

.contact-form-container {
    max-width: 80rem;
    margin: 0 auto;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.form-submit {
    text-align: center;
    margin-top: 3rem;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .hero-title {
        font-size: 5rem;
    }
    
    .hero-subtitle {
        font-size: 2.4rem;
    }
    
    .hero-description {
        font-size: 1.8rem;
    }
    
    .hero-cta {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-cta .btn {
        width: 100%;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
}

/* Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.animate-on-scroll.animate {
    opacity: 1;
    transform: translateY(0);
}

.glow-animation {
    animation: buttonGlow 3s infinite alternate;
}

@keyframes buttonGlow {
    0% {
        box-shadow: 0 0 15px rgba(57, 255, 20, 0.5);
    }
    100% {
        box-shadow: 0 0 30px rgba(57, 255, 20, 0.8);
    }
}
</style>

<!-- Hero section initialization script -->
<script>
    // This script will be loaded when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Create stars
        createStarField();
        
        // Initialize animations
        initHeroAnimations();
        
        // Add parallax effect
        initParallax();
        
        function createStarField() {
            const stars = document.querySelector('.stars');
            if (!stars) return;
            
            const starCount = Math.floor(window.innerWidth / 3);
            
            for (let i = 0; i < starCount; i++) {
                const size = Math.random() * 3 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const opacity = Math.random() * 0.5 + 0.3;
                const animationDelay = Math.random() * 3;
                const animationDuration = Math.random() * 2 + 2;
                
                const star = document.createElement('div');
                star.className = 'star';
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                star.style.left = posX + '%';
                star.style.top = posY + '%';
                star.style.opacity = opacity;
                star.style.animationDelay = animationDelay + 's';
                star.style.animationDuration = animationDuration + 's';
                
                stars.appendChild(star);
            }
        }
        
        function initHeroAnimations() {
            // Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            // Observe elements with animation class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
            
            // Add animation class to hero elements with delay
            const heroElements = document.querySelectorAll('.hero-content > *');
            heroElements.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('animate');
                }, 300 * index);
            });
        }
        
        function initParallax() {
            document.addEventListener('mousemove', function(e) {
                const width = window.innerWidth;
                const height = window.innerHeight;
                const mouseX = e.clientX;
                const mouseY = e.clientY;
                
                const moveX = (mouseX - width/2) / width * 30;
                const moveY = (mouseY - height/2) / height * 30;
                
                const particles = document.querySelectorAll('.particle');
                particles.forEach((particle, index) => {
                    const speed = index * 0.1 + 0.3;
                    particle.style.transform = `translate(${moveX * speed}px, ${moveY * speed}px)`;
                });
                
                const neonGrid = document.querySelector('.neon-grid');
                if (neonGrid) {
                    neonGrid.style.transform = `translate(${moveX * 0.05}px, ${moveY * 0.05}px) scale(1.05)`;
                }
            });
        }
    });
</script>

<?php
// Add function to enqueue hero scripts
function groktalk_enqueue_hero_scripts() {
    // You can add additional scripts here if needed
    wp_add_inline_script('jquery', '
        // Smooth scroll for anchor links
        jQuery(document).ready(function($) {
            $("a[href^=\'#\']").on(\'click\', function(e) {
                var target = $(this.getAttribute(\'href\'));
                
                if (target.length) {
                    e.preventDefault();
                    $(\'html, body\').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 800, \'swing\');
                }
            });
            
            // Form submission handlers
            $(".contact-form, .newsletter-form, .lead-form").on(\'submit\', function(e) {
                e.preventDefault();
                
                var $form = $(this);
                var $button = $form.find(\'button[type="submit"]\');
                var originalText = $button.text();
                
                // Disable button and show loading state
                $button.prop(\'disabled\', true).text(\'Processing...\');
                
                // Simulate form submission (replace with actual AJAX request)
                setTimeout(function() {
                    $button.prop(\'disabled\', false).text(originalText);
                    
                    // Show success message
                    var notification = $(\'<div>\')
                        .addClass(\'notification notification-success\')
                        .text(\'Form submitted successfully!\');
                    
                    $(\'body\').append(notification);
                    
                    setTimeout(() => {
                        notification.addClass(\'show\');
                    }, 10);
                    
                    setTimeout(() => {
                        notification.removeClass(\'show\');
                        setTimeout(() => {
                            notification.remove();
                        }, 300);
                    }, 3000);
                    
                    // Optional: clear form
                    $form.get(0).reset();
                }, 1500);
            });
        });
    ');
}
add_action('wp_footer', 'groktalk_enqueue_hero_scripts', 20);

// Get footer
get_footer();
?>