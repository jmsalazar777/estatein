<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$images = get_sub_field('images');
$image_item = get_sub_field('image_item');
?>

<section id="<?= $section_id; ?>" class="explore">
    <div class="container">
        <div class="row">
            <?php if ($images): ?>
                <div class="images-wrapper flex justify-content-between flex-wrap">
                    <?php foreach ($images as $image): ?>
                        <?php
                        $image = $image['image'];
                        ?>
                        <div class="item">
                            <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="heading-text flex justify-content-center align-items-center">
                <div class="content-wrapper">
                    <?php if ($title): ?>
                        <h2><?= $title ?></h2>
                    <?php endif; ?>
                    <?php if ($content): ?>
                        <p><?= $content ?></p>
                    <?php endif; ?>
                </div>
                <div class="image-wrapper">
                    <?php if ($image_item): ?>
                        <img src="<?= $image_item['url'] ?>" alt="<?= $image_item['title'] ?>">
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>