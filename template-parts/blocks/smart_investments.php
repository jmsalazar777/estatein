<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');

$unlock_title = get_sub_field('unlock_title');
$unlock_text = get_sub_field('unlock_text');
$unlock_link = get_sub_field('unlock_link');
?>

<section id="<?= $section_id; ?>" class="smart-investments">
    <div class="container">
        <div class="row flex justify-content-between align-items-center">
            <div class="heading-text">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>
                <div class="unlock">
                    <?php if ($unlock_title): ?>
                        <h3><?= $unlock_title ?></h3>
                    <?php endif; ?>
                    <?php if ($unlock_text): ?>
                        <p><?= $unlock_text ?></p>
                    <?php endif; ?>
                    <a href="<?= $unlock_link['url'] ?>" class="cta cta-secondary"><?= $unlock_link['title'] ?></a>
                </div>
            </div>
            <div class="content-wrapper">
                <?php if ($items): ?>
                    <div class="item-wrapper flex flex-wrap justify-content-between">
                        <?php foreach ($items as $item): ?>
                            <?php
                            $image = $item['image'];
                            $text = $item['text'];
                            $title = $item['title'];
                            ?>
                            <div class="item flex flex-column">
                                <div class="image-wrapper flex align-items-center justify-content-start">
                                    <div class="image flex align-items-center justify-content-center">
                                        <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                                    </div>
                                    <?php if ($title): ?>
                                        <h3><?= $title ?></h3>
                                    <?php endif; ?>
                                </div>
                                <div class="content-wrapper">
                                    <p><?= $text ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>