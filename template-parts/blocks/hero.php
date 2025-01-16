<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$link = get_sub_field('link');
$image = get_sub_field('image');
$buttons = get_sub_field('buttons');
$items = get_sub_field('items');
?>


<section id="<?= $section_id; ?>" class="hero">
    <div class="container">
        <div class="row flex align-items-center">
            <div class="col-1">
                <div class="content-wrapper">
                    <?php if ($title): ?>
                        <h1><?= $title ?></h1>
                    <?php endif; ?>
                    <?php if ($content): ?>
                        <p><?= $content ?></p>
                    <?php endif; ?>
                    <?php if (have_rows('buttons')): ?>
                        <div class="cta-wrapper flex">
                            <?php while (have_rows('buttons')) : the_row(); ?>
                                <?php $button = get_sub_field('button');
                                $button_type = get_sub_field('button_type'); ?>
                                <?= getButton($button, '', $button_type); ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($items): ?>
                        <div class="item-wrapper flex">
                            <?php foreach ($items as $item): ?>
                                <?php
                                $number = $item['number'];
                                $text = $item['text'];
                                ?>

                                <div class="item">
                                    <h3><?= $number ?></h3>
                                    <p><?= $text ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-2">
                <div class="image-wrapper">
                    <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                </div>
                <div class="arrow">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" />
                </div>
            </div>
        </div>
    </div>
</section>