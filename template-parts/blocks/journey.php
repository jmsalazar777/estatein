<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;
$section_selector = '#' . $section_id;

//Content
$title = get_sub_field('title');
$content = get_sub_field('content');
$button = get_sub_field('button');
?>

<section id="<?= $section_id; ?>" class="journey">
    <div class="container">
        <div class="content-wrapper flex align-items-center justify-content-between">
            <div class="content-left">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>
            </div>
            <?php if ($button): ?>
                <div class="cta-wrapper">
                    <a href="<?= $button['url'] ?>" class="cta"><?= $button['title'] ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>