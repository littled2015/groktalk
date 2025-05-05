<?php
/**
 * Testimonials Section Template
 * templates/sections/testimonials.php
 */

$testimonials = array(
    array(
        'name' => 'Sarah Chen',
        'company' => 'TechVision Inc.',
        'position' => 'CTO',
        'content' => '@grokgirl transformed our AI implementation from a confusing maze to a clear roadmap. Her hands-on approach and practical solutions delivered 60% efficiency gains in just 90 days.',
        'rating' => 5,
        'image' => get_template_directory_uri() . '/assets/images/testimonial-1.jpg'
    ),
    array(
        'name' => 'Michael Rodriguez',
        'company' => 'FinanceForward',
        'position' => 'AI Director',
        'content' => 'What sets @grokgirl apart is her ability to cut through the AI hype and deliver real business value. She helped us avoid costly mistakes and achieve ROI faster than expected.',
        'rating' => 5,
        'image' => get_template_directory_uri() . '/assets/images/testimonial-2.jpg'
    ),
    array(
        'name' => 'Emily Watson',
        'company' => 'DataSmart Solutions',
        'position' => 'Product Manager',
        'content' => 'Her prompt engineering expertise alone saved us $50k annually in API costs. The security protocols she implemented are now our company standard.',
        'rating' => 5,
        'image' => get_template_directory_uri() . '/assets/images/testimonial-3.jpg'
    )
);

// Allow customization through filter
$testimonials = apply_filters( 'groktalk_testimonials', $testimonials );
?>

<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title">What Clients Say</h2>
        <p class="section-subtitle">Real results from real partnerships</p>
        
        <div class="testimonials-grid">
            <?php foreach ( $testimonials as $testimonial ) : ?>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="quote-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="var(--neon-green)">
                                <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/>
                            </svg>
                        </div>
                        <p class="testimonial-text"><?php echo esc_html( $testimonial['content'] ); ?></p>
                        <div class="testimonial-rating">
                            <?php for ( $i = 0; $i < $testimonial['rating']; $i++ ) : ?>
                                <span class="star">★</span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="testimonial-footer">
                        <div class="testimonial-avatar">
                            <img src="<?php echo esc_url( $testimonial['image'] ); ?>" 
                                 alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
                        </div>
                        <div class="testimonial-info">
                            <h4 class="testimonial-name"><?php echo esc_html( $testimonial['name'] ); ?></h4>
                            <p class="testimonial-position">
                                <?php echo esc_html( $testimonial['position'] ); ?> at 
                                <?php echo esc_html( $testimonial['company'] ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="testimonials-cta">
            <h3>Ready to Transform Your Business?</h3>
            <a href="#contact" class="btn btn-primary">Schedule a Consultation</a>
        </div>
    </div>
</section>

<style>
/* Testimonials Section Styles */
.testimonials-section {
    padding: 5rem 0;
    background-color: var(--cosmic-blue);
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--text-white);
}

.section-subtitle {
    text-align: center;
    color: var(--text-light-grey);
    margin-bottom: 3rem;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.testimonial-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    padding: 2rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.quote-icon {
    margin-bottom: 1rem;
}

.testimonial-text {
    font-size: 1.125rem;
    line-height: 1.7;
    margin-bottom: 1rem;
    color: var(--text-light-grey);
}

.testimonial-rating {
    margin-bottom: 1rem;
}

.star {
    color: var(--neon-green);
    font-size: 1.25rem;
}

.testimonial-footer {
    display: flex;
    align-items: center;
    gap: 1rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 1rem;
}

.testimonial-avatar img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}

.testimonial-name {
    color: var(--neon-green);
    margin-bottom: 0.25rem;
}

.testimonial-position {
    color: var(--starlight-silver);
    font-size: 0.9rem;
}

.testimonials-cta {
    text-align: center;
    padding-top: 2rem;
    border-top: 2px solid rgba(255, 255, 255, 0.1);
}

.testimonials-cta h3 {
    margin-bottom: 1rem;
    color: var(--text-white);
}
</style>