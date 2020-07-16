<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dmh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!--<meta name="format-detection" content="telephone=no">-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<div class="page-wrap">

		<?php $header = get_field('header'); ?>
		<header id="header" class="section" >
			<img src="<?= $header['background_image']; ?>" alt="" class="parallax" />
			<div class="container navigation">
				<div class="logo">
					<a href="/">
						<img src="<?= $header['logo']; ?>" alt="Data Made Human" />
					</a>
				</div>
				<a href="#modal-contact" class="button"><?= $header['contact_form_button_text']; ?></a>
				<a href="#modal-contact" class="message-icon"><span class="visuallyhidden"><?= $header['contact_form_button_text']; ?></span></a>
			</div>
			<div class="container intro">
				<?= $header['intro_copy']; ?>
				<?= $header['heading']; ?>
			</div>
		</header>
