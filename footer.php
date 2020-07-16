<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dmh
 */

 $footer = get_field('footer', 'option');

?>



	<footer id="footer" class="section">
		<div class="container">
			<div class="left">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/dmh_logo_black.svg" alt="Data Made Human" />	
				<h3><?= $footer['heading']; ?></h3>
				<?= $footer['subheading']; ?>

				<p class="contact-links">
					<a href="mailto:<?= $footer['email']; ?>"><?= $footer['email']; ?></a><br>
					<a href="tel:<?= $footer['phone_number']; ?>"><?= $footer['phone_number']; ?></a>
				</p>

				<?php
					wp_nav_menu( array(
						'menu'              => "footer-menu",
						'menu_id'           => "",
						'container'         => false,
						'theme_location'    => "footer-menu",
					));				
				?>

				<em><?= $footer['location']; ?></em>
				<span class="copyright">© Copyright <?= date('Y'); ?> Data Made Human Digital Inc.</span>
			</div>

			<div class="right">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/dmh_logo_black.svg" alt="Data Made Human" />	
				<?php
					wp_nav_menu( array(
						'menu'              => "footer-menu",
						'menu_id'           => "",
						'container'         => false,
						'theme_location'    => "footer-menu",
					));				
				?>
			</div>
		</div>
	</footer>
</div>	<!-- end .home-sections -->

</div> <!-- end .page-wrap -->

<?php include(get_template_directory() . '/template-parts/modal-register.php'); ?>
<?php include(get_template_directory() . '/template-parts/modal-privacy.php'); ?>
<?php include(get_template_directory() . '/template-parts/modal-terms.php'); ?>

<?php wp_footer(); ?>

</body>

</html>