<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Estatein
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php

$logo = get_field('logo', 'options');
$banner_text = get_field('banner_text', 'options');
$header_button = get_field('header_button', 'options');
$header_button_type = get_field('header_button_type', 'options');

?>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'estatein'); ?></a>

		<header id="masthead" class="site-header">
			<?php if ($banner_text): ?>
				<div id="banner-section">
					<div class="container">
						<?= $banner_text; ?>
					</div>
					<div class="close">
						<img src="<?php echo get_template_directory_uri(); ?>/images/close.png" alt="close" />
					</div>
				</div>
			<?php endif; ?>

			<div class="site-branding">
				<div class="container">
					<div class="row flex align-items-center justify-content-between">
						<div class="site-branding-left">
							<?php if ($logo): ?>
								<div class="logo">
									<a href="home"><img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"></a>
								</div>
							<?php else: ?>
								<div class="site-name">
									<a href="home"><?php echo get_bloginfo('name'); ?></a>
								</div>
							<?php endif; ?>
						</div>
						<div class="site-branding-right">
							<nav id="site-navigation" class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							</nav><!-- #site-navigation -->
						</div>
						<div class="cta-wrapper">
							<?php if ('buttons'): ?>
								<div class="cta-wrapper">
									<?= getButton($header_button, '', $header_button_type); ?>
								</div>
							<?php endif; ?>
							<a class="menu-toggle" href="">
								<img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="menu icon" />
							</a>
						</div>
					</div>
				</div>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->