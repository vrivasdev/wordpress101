<?php get_header(); ?>

<div class="row">
	
	<div class="col-xs-12">
		<?php 
			/*
				========================
				  Print the first post
				========================
			*/
			$lastBlog = new WP_Query('type=post&posts_per_page=1'); // New empty query post copy from the original

			if( $lastBlog->have_posts() ):

				while( $lastBlog->have_posts()):

					$lastBlog->the_post();

					get_template_part('content', get_post_format()); 

				endwhile;
			endif;

			wp_reset_postdata(); // Reset query post data if we're gonna use the same variable

		 ?>	
	</div>

	<div class="col-xs-12 col-sm-8">

		<?php if( have_posts()):?>

			<?php while( have_posts()):?>

				<?php the_post();?>

				<?php get_template_part('content', get_post_format()); ?>			

			<?php endwhile;?>

		<?php endif;?>

		<?php 
			/*
				=========================================
				  Print other 2 posts not the first one
				=========================================
			*/
			$args = array(
				'type'           => 'post',
				'posts_per_page' => 2,
				'offset'         => 1
			);

			$lastBlog = new WP_Query($args); // New empty query post copy from the original

			if( $lastBlog->have_posts() ):

				while( $lastBlog->have_posts()):

					$lastBlog->the_post();

					get_template_part('content', get_post_format()); 

				endwhile;
			endif;

			wp_reset_postdata(); // Reset query post data if we're gonna use the same variable

		 ?>	

		 <hr>

		 <?php 
			/*
				=======================
				  Print only tutorials
				=======================
			*/
			// posts_per_page=-1 => No limit
			$lastBlog = new WP_Query('type=post&posts_per_page=-1&category_name=tutorials'); // New empty query post copy from the original

			if( $lastBlog->have_posts() ):

				while( $lastBlog->have_posts()):

					$lastBlog->the_post();

					get_template_part('content', get_post_format()); 

				endwhile;
			endif;

			wp_reset_postdata(); // Reset query post data if we're gonna use the same variable

		 ?>	

	</div>

	<div class="col-xs-12 col-sm-4">		
		<?php get_sidebar();?>
	</div>
</div>

<?php get_footer(); ?>