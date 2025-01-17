<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Estatein
 */

$footer_logo = get_field('footer_logo', 'options');
$facebook_link = get_field('facebook_link', 'options');
$linkedin_link = get_field('linkedin_link', 'options');
$twitter_link = get_field('twitter_link', 'options');
$youtube_link = get_field('youtube_link', 'options');
?>

<footer id="colophon" class="site-footer">
	<div class="footer-top">
		<div class="container">
			<div class="row flex align-items-start justify-content-between">
				<div class="footer-top-left">
					<div class="logo">
						<?php if ($footer_logo): ?>
							<div class="logo">
								<img src="<?= $footer_logo['url'] ?>" alt="<?= $footer_logo['alt'] ?>">
							</div>
						<?php else: ?>
							<div class="site-name">
								<?php echo get_bloginfo('name'); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="newletter">
						<?= do_shortcode('[contact-form-7 id="6debdaf" title="Newsletter"]'); ?>
					</div>
				</div>
				<div class="footer-top-right">
					<nav id="site-navigation" class="main-navigation">

						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row flex align-items-center justify-content-between">
				<div class="site-info-left">
					<span>&copy; <?= date('Y') . ' ' . get_bloginfo('name'); ?>. All Rights Reserved. <a href="#">Terms & Conditions</a>
				</div>
				<div class="socials flex">
					<?php if ($facebook_link): ?>
						<a href="<?= $facebook_link ?>" target="_blank" class="social-item">
							<span class="icon icon-before icon-facebook"></span>
						</a>
					<?php endif; ?>
					<?php if ($linkedin_link): ?>
						<a href="<?= $linkedin_link ?>" target="_blank" class="social-item">
							<span class="icon icon-before icon-linkedin"></span>
						</a>
					<?php endif; ?>
					<?php if ($twitter_link): ?>
						<a href="<?= $twitter_link ?>" target="_blank" class="social-item">
							<span class="icon icon-before icon-twitter"></span>
						</a>
					<?php endif; ?>
					<?php if ($youtube_link): ?>
						<a href="<?= $youtube_link ?>" target="_blank" class="social-item">
							<span class="icon icon-before icon-youtube"></span>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
<?php edit_post_link('', '', '', get_the_ID(), 'edit-page-link'); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>