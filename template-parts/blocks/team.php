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
            'post_type' => 'team-member',
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

<section id="<?= $section_id; ?>" class="team">
    <div class="container">
        <div class="content-wrapper flex align-items-end justify-content-between">
            <div class="heading-text">
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
                            $title = get_the_title($post->ID);
                            $url = get_the_permalink($post->ID);
                            $position = get_field('position', $post->ID);
                            $twitter_link = get_field('twitter_link', $post->ID);
                        } else {
                            $title = $post['page']['title'];
                            $url = $post['page']['url'];
                        }

                        $counter++;
                        $counter_delay = $counter * 0.2;

                    ?>

                        <div class="swiper-slide">
                            <div class="image-wrapper">
                                <?php
                                if (has_post_thumbnail($post->ID)) {
                                    echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'post-image'));
                                } else {
                                    echo '<img src="<?php' . get_template_directory_uri() . '/images/placeholder.webp" alt="placeholder" />';
                                }
                                ?>
                            </div>
                            <?php if ($twitter_link): ?>
                                <div class="twitter flex align-items-center justify-content-center">
                                    <span class="icon icon-before icon-twitter"></span>
                                </div>
                            <?php endif; ?>
                            <div class="content-wrapper">
                                <?php if ($title) : ?>
                                    <h3><?= $title ?></h3>
                                <?php endif; ?>
                                <?php if ($position) : ?>
                                    <p><?= $position ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="cta-wrapper">
                                <a href="<?= $url ?>" class="cta cta-secondary flex justify-content-between align-items-center"><span>Say Hello 👋</span>
                                    <div class="flex align-items-center justify-content-center"><img src="<?php echo get_template_directory_uri(); ?>/images/send2.png" alt="send" /></div>
                                </a>
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
        slidesPerView: 4,
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
                slidesPerView: 3,
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

            1200: {
                slidesPerView: 4,
                spaceBetween: 20,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicBullets: false,
                    },
                <?php endif; ?>
            },

            1441: {
                slidesPerView: 4,
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