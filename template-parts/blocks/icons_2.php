<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$icon = get_sub_field('icon');
$icon_2 = get_sub_field('icon_2');
?>

<section id="<?= $section_id; ?>" class="icons icons-2">
    <div class="container">
        <div class="row">
            <div class="content-wrapper">
                <div class="item-wrapper flex">
                    <?php if ($icon): ?>
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
                    <?php endif; ?>
                    <?php foreach ($icon_2 as $item): ?>
                        <?php
                        $image = $item['image'];
                        $socials = $item['socials'];
                        ?>
                        <div class="item flex flex-column align-items-center">
                            <div class="image-wrapper flex align-items-center justify-content-center">
                                <?php if ($image): ?>
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                                <?php endif; ?>
                            </div>
                            <div class="content-wrapper">
                                <div class="socials flex justify-content-between">
                                    <?php foreach ($socials as $social): ?>
                                        <?php
                                        $link = $social['link'] ?? '#';
                                        $title = $social['title'] ?? 'Untitled';
                                        ?>
                                        <div class="social-item">
                                            <a href="<?= $link ?>" title="<?= $title ?>">
                                                <?= $title ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>