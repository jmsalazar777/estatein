<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;
$section_selector = '#' . $section_id;

//Content
$title = get_sub_field('title');
$content = get_sub_field('content');

// Settings
$type = get_sub_field('type');
$post_type = get_sub_field('post_type');
$total_posts = get_sub_field('total_posts');
$num_visible_posts = get_sub_field('num_visible_posts');
$pagination = get_sub_field('pagination');
$pagination_bullets = get_sub_field('pagination_bullets');
$navigation_buttons = get_sub_field('navigation_buttons');
$show_all_posts = get_sub_field('show_all_posts');
$posts_link = get_sub_field('all_post_link');



$args = array(
    'post_type' => 'event',
    'post_status' => 'publish'
);

$query = new WP_Query($args);

// Posts
$select_posts = get_sub_field('select_posts');
$select_pages = get_sub_field('select_pages');

switch ($type) {
    case 'blogs':
        $args = array(
            'post_type' => 'review',
            'post_status' => 'publish',
            'posts_per_page' => $total_posts,
        );
        $posts = get_posts($args);
        break;
    case 'custom':
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => $total_posts,

        );
        $posts = get_posts($args);
        break;
    case 'select':
        $posts = $select_posts;

        break;
}
?>

<section id="<?= $section_id; ?>" class="reviews">
    <div class="container">
        <div class="content-wrapper flex align-items-end justify-content-between">
            <div class="content-left">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>
            </div>

            <?php if ($show_all_posts && $posts_link) : ?>
                <div class="cta-wrapper mobile-hide">
                    <a href="<?= $posts_link['url'] ?>" class="cta cta-secondary"><?= $posts_link['title'] ?></a>
                </div>
            <?php endif; ?>

        </div>
        <?php if (!empty($posts)) : ?>
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    $counter = 0;
                    foreach ($posts as $post):
                        if ($type == 'blogs' || $type == 'custom' || $type == 'select') {
                            $image = get_field('image', $post->ID);
                            $title = get_the_title($post->ID);
                            $content = get_field('content', $post->ID);
                            $url = get_the_permalink($post->ID);
                            $name = get_field('name', $post->ID);
                            $location = get_field('location', $post->ID);
                            $rating = get_field('rating', $post->ID);
                        } else {
                            $title = $post['page']['title'];
                            $url = $post['page']['url'];
                        }

                        $counter++;
                        $counter_delay = $counter * 0.2;

                    ?>

                        <div class="swiper-slide">
                            <div class="content-wrapper">
                                <div class="rating flex">
                                    <?php
                                    if ($rating) {
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<div class="star-item flex align-items-center justify-content-center"><img src="' . get_template_directory_uri() . '/images/star.png" alt="' . $i . ' stars" /></div>';
                                            } else {
                                                echo '';
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <?php if ($title) : ?>
                                    <h3><?= $title ?></h3>
                                <?php endif; ?>
                                <?php if ($content): ?>
                                    <?php
                                    $excerpt_length = 160;
                                    $content_text = strip_tags($content);
                                    $truncated_content = (strlen($content_text) > $excerpt_length) ? substr($content_text, 0, $excerpt_length) : $content_text;
                                    ?>
                                <?php endif; ?>


                                <p> <?= esc_html($truncated_content) ?></p>
                            </div>
                            <div class="review-bottom flex align-items-center">
                                <div class="image-wrapper">
                                    <?php if ($image): ?>
                                        <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.webp" alt="placeholder" />
                                    <?php endif; ?>
                                </div>
                                <div class="review-info">
                                    <?php if ($name): ?>
                                        <h4><?= $name ?></h4>
                                    <?php else: ?>
                                        <h4>Anonyous</h4>
                                    <?php endif; ?>
                                    <?php if ($location): ?>
                                        <p><?= $location ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach;
                    wp_reset_postdata(); ?>

                </div>
                <div class="swiper-navigation-wrapper flex full-width align-items-center justify-content-between m-top-20">
                    <?php if ($show_all_posts && $posts_link) : ?>
                        <div class="cta-wrapper desktop-hide">
                            <a href="<?= $posts_link['url'] ?>" class="cta cta-secondary"><?= $posts_link['title'] ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if ($pagination) : ?>
                        <?php if ($pagination_bullets) : ?>
                            <div class="swiper-pagination"></div>
                        <?php else: ?>
                            <div class="swiper-scrollbar full-width"></div>
                        <?php endif; ?>

                    <?php endif; ?>

                    <div class="button-wrapper flex">
                        <?php if ($navigation_buttons) : ?>
                            <div class="swiper-button swiper-button-prev icon icon-arrow-left icon-before noma"></div>
                        <?php endif; ?>
                        <?php if ($navigation_buttons) : ?>
                            <div class="swiper-button swiper-button-next icon icon-arrow-right icon-after noma"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<script>
    var swiper_<?= $row_index ?> = new Swiper("<?= $section_selector ?> .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 20,
        <?php if ($navigation_buttons) : ?>
            navigation: {
                nextEl: '<?= $section_selector  ?> .swiper-button-next',
                prevEl: '<?= $section_selector  ?> .swiper-button-prev',
            },
        <?php endif; ?>
        <?php if ($pagination_bullets) : ?>
            pagination: {
                el: '<?= $section_selector  ?> .swiper-pagination',
                dynamicBullets: true,
                dynamicMainBullets: 5,
            },
        <?php else: ?>
            scrollbar: {
                el: '<?= $section_selector  ?> .swiper-scrollbar',
                draggable: true,
            },
        <?php endif; ?>
        breakpoints: {
            0: {
                slidesPerView: 1,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicMainBullets: 1,
                    },
                <?php endif; ?>
            },
            550: {
                slidesPerView: 2,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicMainBullets: 3,
                    },
                <?php endif; ?>
            },
            768: {
                slidesPerView: 2,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicMainBullets: 5,
                    },
                <?php endif; ?>
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicBullets: false,
                    },
                <?php endif; ?>
            },

            1441: {
                slidesPerView: 3,
                spaceBetween: 30,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicBullets: false,
                    },
                <?php endif; ?>
            }
        }
    });
</script>