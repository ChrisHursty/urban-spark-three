<?php

/**
 * Blog Archive
 *
 * @package US Three
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<section class="container-fw hero-title-area" style="background-image: url('<?php echo the_field('archive_bg_image', 'option'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-12 align-center text-center">
                <h1><?php the_field('archive_title', 'option'); ?></h1>
            </div>
        </div>
</section>

<section class="container content-bg">
    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-md-6 single-card">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="content">
                            <h3><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="spark-btn white-btn"><span>Read More</span></a>
                        </div>
                    </a>
                </div>
            <?php endwhile;
        else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif;
        wp_reset_postdata(); ?>

    </div><!-- .row -->
</section>

<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>

<?php get_footer(); ?>