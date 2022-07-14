<?php

/*

Template name: WooCommerce - My Account

This templates add My account to the sidebar.

*/



get_header(); ?>



<?php do_action( 'flatsome_before_page' ); ?>



<?php wc_get_template('myaccount/header.php'); ?>



<div class="page-wrapper my-account mb">

<div class="container" role="main">



    <?php if(is_user_logged_in()){?>



<div class="row vertical-tabs">

	<?php if (is_account_page() && !is_wc_endpoint_url()) : ?>

		<div class="large-12 col">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		</div>

	<?php else : ?>

		<div class="large-2 col col-border">

			<?php //wc_get_template('myaccount/account-user.php'); ?>

			<ul id="my-account-nav" class="account-nav nav nav-line nav-uppercase nav-vertical mt-half">

				<?php wc_get_template('myaccount/account-links.php'); ?>

			</ul>

		</div>



		<div class="large-10 col">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		</div>

	<?php endif; ?>

</div>



<?php } else { ?>



	<?php while ( have_posts() ) : the_post(); ?>



		<?php the_content(); ?>



	<?php endwhile; // end of the loop. ?>



<?php } ?>



</div>

</div>



<?php do_action( 'flatsome_after_page' ); ?>



<?php get_footer(); ?>

