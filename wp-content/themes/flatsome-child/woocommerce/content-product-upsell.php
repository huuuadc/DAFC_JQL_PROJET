<?php global $product; ?>
<li>
	<a class="product-img" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">	
		<?php echo $product->get_image( array('250', '300') ); ?>
	</a>
	<div class="right-content">
		<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			
			<div class="brands">
				<?php
					$terms = get_the_terms( $product->get_id(), 'brand' );
					$brands = array();

					foreach ($terms as $term) {
						$brands[] .= $term->name;
					}

					echo implode(', ', $brands);
				?>
			</div>
			<span class="product-title"><?php echo $product->get_title(); ?></span>
		</a>
		<?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
		<div class="price">
		<?php echo $product->get_price_html(); ?>
		</div>
	</div>
</li>