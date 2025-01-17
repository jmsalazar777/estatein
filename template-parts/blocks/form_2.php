<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$form_shortcode = get_sub_field('form_shortcode');
?>

<section id="<?= $section_id; ?>" class="form form-2">
    <div class="container">
        <div class="row flex align-items-start justify-content-between">
            <div class="heading-text">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>
            </div>
            <div class="form">
                <?php if ($form_shortcode): ?>
                    <div class="content-wrapper">
                        <?= do_shortcode($form_shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>