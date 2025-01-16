<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;
$section_selector = '#' . $section_id;

//Content
$title = get_sub_field('title');
$content = get_sub_field('content');

// Settings
$type = get_sub_field('type');
$items = get_sub_field('items');
$total_posts = get_sub_field('total_posts');
$number_of_visible_items = get_sub_field('number_of_visible_items');
$pagination = get_sub_field('pagination');
$pagination_bullets = get_sub_field('pagination_bullets');
$navigation_buttons = get_sub_field('navigation_buttons');

?>

<section id="<?= $section_id; ?>" class="valued-clients">
    <div class="container">
        <div class="heading-text">
            <?php if ($title): ?>
                <h2><?= $title ?></h2>
            <?php endif; ?>
            <?php if ($content): ?>
                <p><?= $content ?></p>
            <?php endif; ?>
        </div>
        <?php if ($items) : ?>
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item): ?>
                        <?php
                        $title = $item['title'];
                        $year = $item['year'];
                        $website_link = $item['website_link'];
                        $domain = $item['domain'];
                        $category = $item['category'];
                        $what_they_said = $item['what_they_said'];
                        ?>
                        <div class="swiper-slide">
                            <div class="content-wrapper">
                                <div class="content-heading flex align-items-center justify-content-between">
                                    <div class="col-1">
                                        <?php if ($year) : ?>
                                            <p><?= $year ?></p>
                                        <?php endif; ?>
                                        <?php if ($title) : ?>
                                            <h3><?= $title ?></h3>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-2">
                                        <a href="<?= $website_link ?>" class="cta cta-secondary" target="_blank">Visit Website</a>
                                    </div>
                                </div>
                                <div class="content-middle flex align-items-start justify-content-start">
                                    <?php if ($domain): ?>
                                        <div class="domain">
                                            <p class="flex align-items-center"><span><img src="<?php echo get_template_directory_uri(); ?>/images/domain.png" alt="domain" /></span> Domain</p>
                                            <h4><?= $domain ?></h4>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($category): ?>
                                        <div class="category">
                                            <p class="flex align-items-center"><span><img src="<?php echo get_template_directory_uri(); ?>/images/category.png" alt="category" /></span> Category</p>
                                            <h4><?= $category ?></h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="content-bottom">
                                    <h4>What They Said 🤗</h4>
                                    <?php if ($what_they_said) : ?>
                                        <p> <?= $what_they_said ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <div class="swiper-navigation-wrapper flex full-width align-items-center justify-content-between m-top-20">
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
        slidesPerView: <?= $number_of_visible_items ?>,
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
                slidesPerView: 1,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicMainBullets: 3,
                    },
                <?php endif; ?>
            },
            768: {
                slidesPerView: 1,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicMainBullets: 5,
                    },
                <?php endif; ?>
            },
            1024: {
                slidesPerView: <?= $number_of_visible_items ?>,
                spaceBetween: 20,
                <?php if ($pagination_bullets) : ?>
                    pagination: {
                        dynamicBullets: false,
                    },
                <?php endif; ?>
            },
            1441: {
                slidesPerView: <?= $number_of_visible_items ?>,
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