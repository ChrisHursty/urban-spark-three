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

<!-- Problem -->
<section class="container-fw results-container dark-bg">
    <div class="container">
        <div class="row">
            <h2><?php echo the_field('results_heading'); ?></h2>
        </div>
    </div>
    <div class="container">
    <?php if( have_rows('results_columns') ): ?>
        <div class="row">
            <?php 
            // Get total number of rows (columns)
            $column_count = count(get_field('results_columns'));

            // Set column class based on the count
            if ($column_count == 1) {
                $column_class = 'col-md-8 align-center';
            } elseif ($column_count == 2) {
                $column_class = 'col-md-6';
            } else {
                $column_class = 'col-md-4';
            }

            // Loop through repeater
            while ( have_rows('results_columns') ) : the_row(); ?>
                <div class="<?php echo esc_attr($column_class); ?>">
                    <?php 
                    $icon = get_sub_field('icon');
                    $heading = get_sub_field('heading');
                    $content = get_sub_field('content');
                    ?>
                    <div class="result-icon">
                        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                    </div>
                    <div class="result-heading">
                        <h3><?php echo esc_html($heading); ?></h3>
                    </div>
                    <div class="result-content">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    </div>
</section>

<!-- Action Plan -->
<section class="container-fw action-plan-container iso-bg">
    <div class="container">
        <div class="row center-title">
            <h2><?php echo the_field('action_plan_heading'); ?></h2>
        </div>
    </div>
    <div class="container">
        <?php if( have_rows('action_plan_steps') ): ?>
        <div class="action-plan-steps">
            <?php 
            $row_number = 0;
            while ( have_rows('action_plan_steps') ) : the_row(); 
                $row_number++; // Increment the row number
                $icon = get_sub_field('icon');
                $heading = get_sub_field('heading');
                $content = get_sub_field('content');
                $image = get_sub_field('image'); // Using ACF image field
            ?>

            <?php if ($row_number % 2 != 0): // Odd rows ?>
                <div class="row step-<?php echo esc_attr($row_number); ?>">
                    <div class="col-md-6 step-content-left">
                        <div class="step-icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                        </div>
                        <div class="step-heading">
                            <div class="step-number"><?php echo esc_html($row_number); ?></div>
                            <h2><?php echo esc_html($heading); ?></h2>
                        </div>
                        <div class="step-content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    </div>
                    <div class="col-md-6 step-image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="Step Image" />
                    </div>
                </div>

            <?php else: // Even rows ?>
                <div class="row step-<?php echo esc_attr($row_number); ?>">
                    <div class="col-md-6 step-image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="Step Image" />
                    </div>
                    <div class="col-md-6 step-content-right">
                        <div class="step-icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                        </div>
                        <div class="step-heading">
                        <div class="step-number"><?php echo esc_html($row_number); ?></div>
                            <h2><?php echo esc_html($heading); ?></h2>
                        </div>
                        <div class="step-content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

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
