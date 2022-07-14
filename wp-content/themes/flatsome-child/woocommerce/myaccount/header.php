<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$is_facebook_login = is_nextend_facebook_login();
$is_google_login   = is_nextend_google_login();

$login_text     = get_theme_mod( 'facebook_login_text' );
$login_bg_image = $image[0];
$login_bg_color = get_theme_mod( 'my_account_title_bg_color', '' );

if ( $login_bg_image ) $css_login_bg_args[] = array(
	'attribute' => 'background-image',
	'value'     => 'url(' . do_shortcode( $login_bg_image ) . ')',
);
if ( $login_bg_color ) $css_login_bg_args[] = array(
	'attribute' => 'background-color',
	'value'     => $login_bg_color,
);

global $wp;
$endpoint_label = '';
$current_url    = home_url( $wp->request );

// Collect current WC endpoint label.
if ( function_exists( 'wc_get_account_menu_items' ) && get_theme_mod( 'wc_account_links', 1 ) ) {
	foreach ( wc_get_account_menu_items() as $endpoint => $label ) {
		if ( untrailingslashit( wc_get_account_endpoint_url( $endpoint ) ) === $current_url ) {
			$endpoint_label = $label;
			break;
		}
	}
}
?>

<div class="my-account-header page-title normal-title
	<?php if ( get_theme_mod( 'my_account_title_text_color', 'dark' ) == 'light' ) echo 'dark'; ?>
	<?php if ( $login_bg_image ) echo ' featured-title'; ?>">

	<?php if ( $login_bg_image || $login_bg_color ) : ?>
		<div class="page-title-bg fill bg-fill" <?php echo get_shortcode_inline_css( $css_login_bg_args ); ?>>
			<div class="page-title-bg-overlay fill"></div>
		</div>
	<?php endif; ?>

	<div class="page-title-inner flex-row container
	<?php echo ' text-' . get_theme_mod( 'my_account_title_align', 'left' ); ?>">
		<div class="flex-col flex-grow text-left">
			<?php if ( is_user_logged_in() ) : ?>
				<?php
				/* This sets the $time variable to the current hour in the 24 hour clock format */
				$time = date("H");
				/* Set the $timezone variable to become the current timezone */
				$timezone = date("e");
				/* If the time is less than 1200 hours, show good morning */
				if ($time < "12") {
					$hi_text = "Good morning";
				} else
				/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
				if ($time >= "12" && $time < "17") {
					$hi_text = "Good afternoon";
				} else
				/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
				if ($time >= "17" && $time < "19") {
					$hi_text = "Good evening";
				} else
				/* Finally, show good night if the time is greater than or equal to 1900 hours */
				if ($time >= "19") {
					$hi_text = "Good night";
				}
				?>
				<?php $first_name = get_user_meta( get_current_user_id(), 'first_name', true ); ?>
				<?php if ( $endpoint_label == 'Dashboard' ) echo '<small class="uppercase">' . __( 'Welcome to your Account', 'glamoutlet' ) . '</small>'; ?>
				<h1 class="uppercase mb-0"><?php echo $hi_text; ?>, <?php echo $first_name; ?></h1>

			<?php else : ?>

				

			<?php endif; ?>
		</div>
	</div>
</div>
