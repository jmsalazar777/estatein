<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
$unlock = get_sub_field('unlock');
?>


<section id="<?= $section_id; ?>" class="property-value">
    <div class="container">
        <div class="row">
            <div class="heading-text">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>
            </div>

            <div class="items-wrapper flex flex-wrap">
                <?php if ($items): ?>
                    <?php foreach ($items as $item): ?>
                        <?php
                        $image = $item['image'];
                        $title = $item['title'];
                        $text = $item['text'];
                        ?>
                        <div class="item">
                            <div class="image-wrapper flex align-items-center justify-content-start">
                                <div class="flex align-items-center justify-content-center">
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
                <?php endif; ?>
                <?php if ($unlock): ?>
                    <?php foreach ($unlock as $unlock_item): ?>
                        <?php
                        $title = $unlock_item['title'];
                        $text = $unlock_item['text'];
                        $button = $unlock_item['button'];
                        $button_type = $unlock_item['button_type'];
                        ?>
                        <div class="item unlock">
                            <div class="content-top flex align-items-center justify-content-between">
                                <?php if ($title): ?>
                                    <h3><?= $title ?></h3>
                                <?php endif; ?>
                                <?= getButton($button, '', $button_type); ?>
                            </div>
                            <div class="content-wrapper">
                                <p><?= $text ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>