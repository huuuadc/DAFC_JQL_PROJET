<?php

/*

Template name: Customize - Accountant Admin

This templates add Accountant Admin to the sidebar.

*/



get_header(); ?>



<?php do_action( 'flatsome_before_page' ); ?>



<?php //wc_get_template('accountantadmin/header.php'); ?>



<div class="page-wrapper my-account mb">

    <div class="container" role="main">



        <?php if(is_user_logged_in()){?>


            <div class="row vertical-tabs">

                <div class="large-12 col">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; // end of the loop. ?>

                </div>

            </div>



        <?php } else { ?>



            <?php while ( have_posts() ) : the_post(); ?>



                <?php the_content(); ?>



            <?php endwhile; // end of the loop. ?>



        <?php } ?>



    </div>

</div>

<?php //do_action( 'flatsome_after_page' ); ?>

<?php //get_footer(); ?>

