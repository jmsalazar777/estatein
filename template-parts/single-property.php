<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Estatein
 */

$title = get_the_title($post->ID);
$image = get_field('image', $post->ID);
$url = get_the_permalink($post->ID);
$bedroom = get_field('bedroom', $post->ID);
$bathroom = get_field('bathroom', $post->ID);
$unit_type = get_field('unit_type', $post->ID);
$price = get_field('price', $post->ID);
$details = get_field('details', $post->ID);
$location = get_field('location', $post->ID);
$features = get_field('features', $post->ID);
$images = get_field('images', $post->ID);
$description = get_field('description', $post->ID);
$area = get_field('area', $post->ID);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header ">
        <div class="container flex align-items-center justify-content-between">
            <div class="header-left flex align-items-center">
                <?php if (is_singular()) : ?>
                    <h1 class="entry-title"><?= $title; ?></h1>
                <?php else : ?>
                    <h2 class="entry-title">
                        <a href="<?= $url; ?>" rel="bookmark"><?= $title; ?></a>
                    </h2>
                <?php endif; ?>
                <?php if ($location): ?>
                    <p class="location icon icon-before icon-location"><?= $location; ?></p>
                <?php endif; ?>
            </div>
            <div class="header-right">
                <div class="price">
                    <p>Price <strong>$<?= $price; ?></strong></p>
                </div>
            </div>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php
                    estatein_posted_on();
                    estatein_posted_by();
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="container">
            <section class="gallery-wrapper gallery-images">
                <div class="swiper thumbnail-gallery swiper-container">
                    <div class="swiper-wrapper">
                        <?php if ($images): ?>
                            <?php foreach ($images as $image): ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image['image']['url']; ?>" alt="<?= $image['image']['title']; ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="swiper main-gallery swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($images as $image): ?>
                            <?php if (!empty($image['image'])): ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image['image']['url']; ?>" alt="<?= $image['image']['title']; ?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-navigation-wrapper flex full-width align-items-center justify-content-between m-top-20">
                        <div class="swiper-button swiper-button-prev icon icon-arrow-left icon-before noma"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button swiper-button-next icon icon-arrow-right icon-after noma"></div>
                    </div>
                </div>
            </section>

            <section class="key-details">
                <div class="row flex">
                    <div class="description">
                        <h3>Description</h3>
                        <?= $description; ?>

                        <div class="description-bottom flex align-items-center justify-content-between">
                            <?php if ($bedroom): ?>
                                <div>
                                    <p class="flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/bed.png" alt="bed" />Bedrooms</p>
                                    <span><?= $bedroom ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($bathroom): ?>
                                <div>
                                    <p class="flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/bath.png" alt="arrow" />Bathrooms</p>
                                    <span><?= $bathroom ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($area): ?>
                                <div>
                                    <p class="flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/area.png" alt="area" />Area</p>
                                    <span><?= $area ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="features">
                        <h3>Key Features and Amenities</h3>
                        <?php if ($features): ?>
                            <div class="features-wrapper">
                                <?php foreach ($features as $item): ?>
                                    <?php
                                    $feature = $item['feature'];
                                    ?>
                                    <div class="feature-item">
                                        <p class="flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/feature.png" alt="feature" /><?= $item['feature']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
        <?php
        if (have_rows('flexible_content')):
            while (have_rows('flexible_content')) : the_row();
                get_template_part('template-parts/blocks/' . get_row_layout());
            endwhile;
        endif;
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php estatein_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->