<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
?>

<section id="<?= $section_id; ?>" class="location">
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

            <div class="tab flex">
                <a class="cta cta-secondary tablinks active" onclick="filterItems('all')">All</a>
                <a class="cta cta-secondary tablinks" onclick="filterItems('regional')">Regional</a>
                <a class="cta cta-secondary tablinks" onclick="filterItems('international')">International</a>
            </div>

            <?php if ($items): ?>
                <div class="items-wrapper flex">
                    <?php foreach ($items as $item): ?>
                        <?php
                        $title = $item['title'];
                        $sub_title = $item['sub_title'];
                        $text = $item['text'];
                        $email = $item['email'];
                        $phone = $item['phone'];
                        $location = $item['location'];
                        $direction_link = $item['direction_link'];
                        $category = strtolower($item['category']); // Convert category to lowercase for consistency
                        ?>

                        <div class="item" data-category="<?= $category ?>">
                            <?php if ($sub_title): ?>
                                <h4><?= $sub_title ?></h4>
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <h3><?= $title ?></h3>
                            <?php endif; ?>
                            <?php if ($text): ?>
                                <p><?= $text ?></p>
                            <?php endif; ?>
                            <div class="item-info flex">
                                <?php if ($email): ?>
                                    <div class="email">
                                        <a href="mailto:<?= $email ?>">
                                            <p class="icon icon-before icon-envelope"><?= $email ?></p>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($phone): ?>
                                    <div class="phone">
                                        <a href="tel:<?= $phone ?>">
                                            <p class="icon icon-before icon-phone"><?= $phone ?></p>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($location): ?>
                                    <div class="address">
                                        <p class="icon icon-before icon-location"><?= $location ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if ($direction_link): ?>
                                <a href="<?= $direction_link['url'] ?>" class="cta"><?= $direction_link['title'] ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>