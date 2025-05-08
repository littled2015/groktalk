<?php
/**
 * Pricing Table Section Template
 * templates/sections/pricing-table.php
 */

$pricing_plans = array(
    array(
        'name' => 'AI Assessment',
        'description' => 'Perfect for getting started',
        'price' => '$2,500',
        'duration' => 'one-time',
        'features' => array(
            'Comprehensive AI readiness evaluation',
            'Risk assessment matrix',
            'Implementation roadmap',
            'Priority recommendations',
            '2-hour strategy session',
            'Written report with findings'
        ),
        'button_text' => 'Schedule Assessment',
        'button_link' => '#contact',
        'highlighted' => false
    ),
    array(
        'name' => 'Pilot Project',
        'description' => 'Test AI in your environment',
        'price' => '$10,000',
        'duration' => 'per project',
        'features' => array(
            'Everything in AI Assessment',
            'Proof of concept development',
            'Performance metrics analysis',
            'Integration testing',
            'Team training (4 hours)',
            '30-day support included'
        ),
        'button_text' => 'Start Pilot',
        'button_link' => '#contact',
        'highlighted' => true
    ),
    array(
        'name' => 'Full Implementation',
        'description' => 'Complete AI transformation',
        'price' => 'Custom',
        'duration' => 'pricing',
        'features' => array(
            'Everything in Pilot Project',
            'Full-scale deployment',
            'Advanced team training',
            'Ongoing support program',
            'Success monitoring dashboard',
            'Quarterly strategy reviews'
        ),
        'button_text' => 'Request Proposal',
        'button_link' => '#contact',
        'highlighted' => false
    )
);

// Allow customization through filter
$pricing_plans = apply_filters('groktalk_pricing_plans', $pricing_plans);
?>

<section class="pricing-section">
    <div class="container">
        <h2 class="section-title">Investment in AI Innovation</h2>
        <p class="section-subtitle">Choose the right path for your AI journey</p>
        
        <div class="pricing-grid">
            <?php foreach ($pricing_plans as $plan) : ?>
                <div class="pricing-card <?php echo $plan['highlighted'] ? 'highlighted' : ''; ?>">
                    <?php if ($plan['highlighted']) : ?>
                        <div class="popular-badge">Most Popular</div>
                    <?php endif; ?>
                    
                    <div class="pricing-header">
                        <h3 class="plan-name"><?php echo esc_html($plan['name']); ?></h3>
                        <p class="plan-description"><?php echo esc_html($plan['description']); ?></p>
                        <div class="price-container">
                            <span class="price"><?php echo esc_html($plan['price']); ?></span>
                            <span class="duration"><?php echo esc_html($plan['duration']); ?></span>
                        </div>
                    </div>
                    
                    <div class="pricing-body">
                        <ul class="features-list">
                            <?php foreach ($plan['features'] as $feature) : ?>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--electric-purple)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <?php echo esc_html($feature); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="pricing-footer">
                        <a href="<?php echo esc_url($plan['button_link']); ?>" 
                           class="btn <?php echo $plan['highlighted'] ? 'btn-primary' : 'btn-secondary'; ?>">
                            <?php echo esc_html($plan['button_text']); ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="pricing-note">
            <p>All plans include a 30-day satisfaction guarantee. Contact us for custom enterprise solutions.</p>
        </div>
    </div>
</section>

<style>
/* Pricing Section Styles */
.pricing-section {
    padding: 5rem 0;
    background-color: var(--midnight-black);
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.pricing-card {
    background-color: var(--cosmic-web-grey);
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    position: relative;
}

.pricing-card:hover {
    transform: translateY(-10px);
    border-color: var(--electric-purple);
}

.pricing-card.highlighted {
    border-color: var(--electric-purple);
    transform: scale(1.05);
}

.pricing-card.highlighted:hover {
    transform: scale(1.08);
}

.popular-badge {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--electric-purple);
    color: var(--text-white);
    padding: 0.25rem 1rem;
    border-radius: 20px;
    font-weight: bold;
    font-size: 0.9rem;
}

.pricing-header {
    margin-bottom: 2rem;
}

.plan-name {
    font-size: 1.5rem;
    color: var(--electric-purple);
    margin-bottom: 0.5rem;
}

.plan-description {
    color: var(--text-light-grey);
    margin-bottom: 1rem;
}

.price-container {
    margin-bottom: 1rem;
}

.price {
    font-size: 2.5rem;
    font-weight: bold;
    color: var(--text-white);
}

.duration {
    color: var(--starlight-silver);
    font-size: 1rem;
    display: block;
}

.pricing-body {
    margin-bottom: 2rem;
}

.features-list {
    list-style: none;
    text-align: left;
}

.features-list li {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    color: var(--text-light-grey);
}

.features-list li svg {
    margin-right: 0.75rem;
    flex-shrink: 0;
}

.pricing-note {
    text-align: center;
    color: var(--text-light-grey);
    font-size: 0.9rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(121, 40, 202, 0.2);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .pricing-card.highlighted {
        transform: none;
    }
    
    .pricing-card.highlighted:hover {
        transform: translateY(-10px);
    }
}
</style>