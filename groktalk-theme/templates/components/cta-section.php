<?php
$cta_title = isset($args['title']) ? $args['title'] : 'Ready to Get Started?';
$cta_subtitle = isset($args['subtitle']) ? $args['subtitle'] : '';
$cta_form = isset($args['form']) ? $args['form'] : true;
?>

<section class="cta-section">
    <div class="container">
        <h2><?php echo esc_html($cta_title); ?></h2>
        <?php if ($cta_subtitle) : ?>
            <p><?php echo esc_html($cta_subtitle); ?></p>
        <?php endif; ?>
        
        <?php if ($cta_form) : ?>
            <form id="cta-form" class="cta-form">
                <div class="form-group">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary">Get Started</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</section>