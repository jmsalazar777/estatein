<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$icon = get_sub_field('icon');
?>

<section id="<?= $section_id; ?>" class="icons">
    <div class="container">
        <div class="row">
            <div class="content-wrapper">
                <?php if ($icon): ?>
                    <div class="item-wrapper flex">
                        <?php foreach ($icon as $item): ?>
                            <?php
                            $image = $item['image'];
                            $text = $item['text'];
                            $link = $item['link'];
                            ?>
                            <a href="<?= $link['url'] ?>">
                                <div class="item flex flex-column align-items-center">
                                    <div class="image-wrapper flex align-items-center justify-content-center">
                                        <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                                    </div>
                                    <div class="content-wrapper">
                                        <p><?= $text ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>