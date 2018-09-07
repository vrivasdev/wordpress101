<?php get_header(); ?>

<div class="row">

	<div class="col-xs-12">
		<!-- Carousel -->
		<div id="awesome-carousel" class="carousel slide" data-ride="carousel">
		  
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		  	<?php 	
				/*
					===================================
					  Lastest post for each category
					===================================
				*/
				$categories = get_categories(
					array(
						'include' => '7, 8, 9'
					)
				);

				$count   = 0;
				$bullets = '';

				foreach($categories as $category):

					$lastBlog = new WP_Query(
						array(
							'type'             => 'post',
							'posts_per_page'   => 1,
							'category__in'     => $category->term_id,
							'category__not_in' => array( 10 ) // exclude Random category
						)
					); // New empty query post copy from the original 

					if( $lastBlog->have_posts() ):					

						while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

							<?php $isActive = ($count == 0)? 'active': '';?>

							<div class="item <?php echo $isActive?>">

						      <?php the_post_thumbnail('full');?>

						      <div class="carousel-caption">

						        <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink() ) ), '</a></h1>');?>
						        <small><?php the_category(' ');?></small>

						      </div>
						    </div>	

						    <?php $bullets .= '<li data-target="#awesome-carousel" data-slide-to="'.$count.'" class="'.$isActive.'"></li>'; ?>

						<?php endwhile;?>

					<?php endif;?>

					<?php 

					wp_reset_postdata();
					$count++;

					?><!-- Reset query post data if we're gonna use the same variable -->				
				<?php endforeach;
			?>	  

		  	<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php echo $bullets;?>
			</ol>

		  </div>
		 
		  <!-- Controls -->
		  <a class="left carousel-control" href="#awesome-carousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#awesome-carousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</div>

<div class="row">
	<hr>

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
			$lastBlog = new WP_Query( array(
				'type'           => 'post',
				'posts_per_page' => 2,
				'offset'         => 1
				)
			); // New empty query post copy from the original

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