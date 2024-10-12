<?php

/**
 * Template Name: Home Page
 *
 * @package US Three
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<section class="container home-hero">
    <div class="row">
        <div class="col-md-6 hero-content">
            <h1 class="site-tagline"><?php echo esc_html(get_bloginfo('description')); ?></h1>
            <h2><?php echo wp_kses_post(get_field('hero_heading')); ?></h2>
            <div class="intro">
                <?php 
                $hero_intro = get_field('hero_intro');
                if ($hero_intro) {
                    echo wp_kses_post($hero_intro);
                }
                ?>
            </div>
            <div class="button-box">
                <!-- Calendly link widget begin -->
                <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
                <a href="" class="spark-btn" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/chrishurst'});return false;"><span>BOOK MY DISCOVERY CALL</span></a>
                <!-- Calendly link widget end -->
            </div>
        </div>
        <div class="col-md-6 hero-image">
        <?php 
        $hero_image = get_field('hero_image');
        if ($hero_image) {
            $image_url = $hero_image['url'];
            $alt_text = !empty($hero_image['alt']) ? $hero_image['alt'] : 'Chris Hurst, Marketing and Web Development'; // Fallback alt text if none is provided
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '">';
        }
        ?>
        </div>
    </div><!-- .row -->
</section>
<!-- Problem -->
<section class="container-fw problem-container dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 problem-image">
                <?php 
                $problem_image = get_field('problem_image');
                if ($problem_image) {
                    $image_url = $problem_image['url'];
                    $alt_text = !empty($problem_image['alt']) ? $problem_image['alt'] : 'Chris Hurst, Marketing and Web Development'; // Fallback alt text if none is provided
                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '">';
                }
                ?>
            </div>
            <div class="col-md-9 problem-content">
                <?php 
                    $problem_content = get_field('problem_content');
                    if ($hero_intro) {
                        echo wp_kses_post($problem_content);
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Solution -->
<section class="container-fw solution-container iso-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-7 solution-content">
                <?php 
                    $solution_content = get_field('solution_content');
                    if ($hero_intro) {
                        echo wp_kses_post($solution_content);
                    }
                ?>
            </div>
            <div class="col-md-5 solution-image">
                <?php 
                $solution_image = get_field('solution_image');
                if ($solution_image) {
                    $image_url = $solution_image['url'];
                    $alt_text = !empty($solution_image['alt']) ? $solution_image['alt'] : 'Chris Hurst, Marketing and Web Development'; // Fallback alt text if none is provided
                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '">';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section class="container-fw services-container">
    <div class="container">
        <div class="row">
            <?php if (have_rows('services')) : ?>
                <?php while (have_rows('services')) : the_row();
                    // Your sub fields go here
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $button_text = get_sub_field('button_text');
                    $button_url = get_sub_field('button_url');
                ?>
                    <div class="service-item" style="background-image: url('<?php echo esc_url($icon); ?>');">
                        <div class="service-content">
                            <h2 class="service-title"><?php echo esc_html($title); ?></h2>
                            <p class="service-description"><?php echo esc_html($description); ?></p>
                            <?php if ($button_url && $button_text) : ?>
                                <a href="<?php echo esc_url($button_url); ?>" class="learn-more-link"><span><?php echo esc_html($button_text); ?></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>
<section class="company-ticker">
    <?php get_template_part('template-parts/company-ticker'); ?>
</section>
<?php
get_footer();
