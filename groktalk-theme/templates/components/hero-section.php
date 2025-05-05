<?php
$hero_title = isset($args['title']) ? $args['title'] : get_the_title();
$hero_subtitle = isset($args['subtitle']) ? $args['subtitle'] : '';
$hero_bg = isset($args['background']) ? $args['background'] : '';
?>

<section class="hero-section" <?php if ($hero_bg) echo 'style="background-image: url(' . esc_url($hero_bg) . ');"'; ?>>
    <div class="container">
        <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
        <?php if ($hero_subtitle) : ?>
            <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
        <?php endif; ?>
        <?php if (isset($args['cta_buttons'])) : ?>
            <div class="hero-cta">
                <?php foreach ($args['cta_buttons'] as $button) : ?>
                    <a href="<?php echo esc_url($button['url']); ?>" class="btn <?php echo esc_attr($button['class']); ?>">
                        <?php echo esc_html($button['text']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>