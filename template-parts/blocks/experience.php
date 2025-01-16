<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
?>

<section id="<?= $section_id; ?>" class="experience">
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
            <div class="content-wrapper">
                <?php if ($items): ?>
                    <div class="item-wrapper flex flex-wrap justify-content-between">
                        <?php
                        $step_number = 1;
                        foreach ($items as $item):
                            $text = $item['text'];
                            $title = $item['title'];
                        ?>
                            <div class="item flex flex-column">
                                <div class="item-heading">
                                    <h4>Step <?= $step_number ?></h4>
                                </div>
                                <div class="content-wrapper">
                                    <?php if ($title): ?>
                                        <h3><?= $title ?></h3>
                                    <?php endif; ?>
                                    <p><?= $text ?></p>
                                </div>
                            </div>
                            <?php $step_number++; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>