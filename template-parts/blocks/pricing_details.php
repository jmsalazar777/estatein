<?php
$row_index = get_row_index();
$section_id = 'section-' . $row_index;

$title = get_sub_field('title');
$content = get_sub_field('content');
$note = get_sub_field('note');
$listing_price = get_sub_field('listing_price');

$additional_fees = get_sub_field('additional_fees');
$additional_fees_link = get_sub_field('additional_fees_link');

$monthly_costs = get_sub_field('monthly_costs');
$monthly_costs_link = get_sub_field('monthly_costs_link');

$total_initial_costs = get_sub_field('total_initial_costs');
$total_initial_costs_link = get_sub_field('total_initial_costs_link');

$monthly_expenses = get_sub_field('monthly_expenses');
$monthly_expenses_link = get_sub_field('monthly_expenses_link');
?>

<section id="<?= $section_id; ?>" class="pricing-details">
    <div class="container">
        <div class="row">
            <div class="heading-text">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>

                <?php if ($note): ?>
                    <div class="note flex align-items-center">
                        <h4>Note</h4>
                        <p><?= $note ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="content-wrapper flex align-items-start justify-content-between">
                <div class="price">
                    <p>Listing Price
                        <strong>
                            <?= $listing_price ?>
                        </strong>
                    </p>
                </div>
                <div class="property-details">
                    <div class="property-wrapper">
                        <div class="property-heading flex align-items-center justify-content-between">
                            <h3>Additional Fees</h3>
                            <a href="<?= $additional_fees_link['url'] ?>" class="cta cta-secondary"><?= $additional_fees_link['title'] ?></a>
                        </div>
                        <div class="property-content flex align-items-center justify-content-start flex-wrap">
                            <?php if ($additional_fees): ?>
                                <?php foreach ($additional_fees as $fee): ?>
                                    <?php
                                    $title = $fee['title'];
                                    $text = $fee['text'];
                                    $price = $fee['price'];
                                    ?>
                                    <div class="item">
                                        <h4><?= $fee['title'] ?></h4>
                                        <div class="flex align-items-center justify-content-start">
                                            <?php if ($price): ?>
                                                <div class="price">
                                                    <p><?= $price ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($text): ?>
                                                <div class="text">
                                                    <p><?= $text ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="property-wrapper monthly-costs">
                        <div class="property-heading flex align-items-center justify-content-between">
                            <h3>Monthly Costs</h3>
                            <a href="<?= $monthly_costs_link['url'] ?>" class="cta cta-secondary"><?= $monthly_costs_link['title'] ?></a>
                        </div>
                        <div class="property-content flex align-items-center justify-content-start flex-wrap">
                            <?php if ($monthly_costs): ?>
                                <?php foreach ($monthly_costs as $fee): ?>
                                    <?php
                                    $title = $fee['title'];
                                    $text = $fee['text'];
                                    $price = $fee['price'];
                                    ?>
                                    <div class="item">
                                        <h4><?= $fee['title'] ?></h4>
                                        <div class="flex align-items-center justify-content-start">
                                            <?php if ($price): ?>
                                                <div class="price">
                                                    <p><?= $price ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($text): ?>
                                                <div class="text">
                                                    <p><?= $text ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="property-wrapper">
                        <div class="property-heading flex align-items-center justify-content-between">
                            <h3>Additional Fees</h3>
                            <a href="<?= $total_initial_costs_link['url'] ?>" class="cta cta-secondary"><?= $total_initial_costs_link['title'] ?></a>
                        </div>
                        <div class="property-content flex align-items-center justify-content-start flex-wrap">
                            <?php if ($total_initial_costs): ?>
                                <?php foreach ($total_initial_costs as $fee): ?>
                                    <?php
                                    $title = $fee['title'];
                                    $text = $fee['text'];
                                    $price = $fee['price'];
                                    ?>
                                    <div class="item">
                                        <h4><?= $fee['title'] ?></h4>
                                        <div class="flex align-items-center justify-content-start">
                                            <?php if ($price): ?>
                                                <div class="price">
                                                    <p><?= $price ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($text): ?>
                                                <div class="text">
                                                    <p><?= $text ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="property-wrapper">
                        <div class="property-heading flex align-items-center justify-content-between">
                            <h3>Additional Fees</h3>
                            <a href="<?= $monthly_expenses_link['url'] ?>" class="cta cta-secondary"><?= $monthly_expenses_link['title'] ?></a>
                        </div>
                        <div class="property-content flex align-items-center justify-content-start flex-wrap">
                            <?php if ($monthly_expenses): ?>
                                <?php foreach ($monthly_expenses as $fee): ?>
                                    <?php
                                    $title = $fee['title'];
                                    $text = $fee['text'];
                                    $price = $fee['price'];
                                    ?>
                                    <div class="item">
                                        <h4><?= $fee['title'] ?></h4>
                                        <div class="flex align-items-center justify-content-start">
                                            <?php if ($price): ?>
                                                <div class="price">
                                                    <p><?= $price ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($text): ?>
                                                <div class="text">
                                                    <p><?= $text ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>