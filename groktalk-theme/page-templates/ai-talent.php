<?php
/*
Template Name: AI Talent Page
*/
get_header(); ?>

<main class="ai-talent-page">
    <section class="hero-section">
        <div class="hero-content">
            <h1>Meet Your AI Navigator</h1>
            <h2>@grokgirl</h2>
            <p>Curious innovator solving complex AI challenges with practical, business-ready solutions</p>
            <div class="quick-stats">
                <div class="stat-box">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">AI Projects Analyzed</span>
                </div>
                <!-- Add more stats -->
            </div>
            <div class="cta-buttons">
                <a href="#consultation" class="btn btn-primary">Schedule Consultation</a>
                <a href="#resume" class="btn btn-secondary">View Resume</a>
            </div>
        </div>
    </section>
    
    <section class="about-section">
        <div class="content-wrapper">
            <h2>My Story</h2>
            <?php the_content(); ?>
        </div>
    </section>
    
    <section class="expertise-section">
        <h2>Areas of Expertise</h2>
        <div class="expertise-grid">
            <!-- Add expertise cards -->
        </div>
    </section>
    
    <section class="contact-section">
        <h2>Ready to Transform Your Business?</h2>
        <!-- Add contact form -->
    </section>
</main>

<?php get_footer(); ?>