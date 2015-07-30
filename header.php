<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div id="container">

		<div class="skip-link">
			<a href="#content" class="screen-reader-text"><?php _e( 'Skip to content', 'hybrid-base' ); ?></a>
		</div><!-- .skip-link -->

		<a href="#menu-primary" class="menu-toggle" id="primary-menu-toggle"><?php _e( 'Menu', 'bonnen' ); ?><i class="fa fa-bars"></i></a><!-- #primary-menu-toggle -->

		<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

		<header <?php hybrid_attr( 'header' ); ?>>

			<?php if ( display_header_text() ) : // If user chooses to display header text. ?>

				<div <?php hybrid_attr( 'branding' ); ?>>
					<?php hybrid_site_title(); ?>
					<?php hybrid_site_description(); ?>
				</div><!-- #branding -->

			<?php endif; // End check for header text. ?>

		</header><!-- #header -->

		<?php hybrid_get_menu( 'secondary' ); // Loads the menu/secondary.php template. ?>

		<?php if ( get_header_image() && !display_header_text() ) : // If there's a header image but no header text. ?>

			<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

		<?php elseif ( get_header_image() ) : // If there's a header image. ?>

			<img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />

		<?php endif; // End check for header image. ?>

		<div id="main" class="main">

			<?php hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. ?>
