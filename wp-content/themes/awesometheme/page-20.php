<?php get_header(); ?>

	<?php if( have_posts()):?>

		<?php while( have_posts()):?>	

			<?php the_post();?>			

			<p><?php the_content(); ?></p>
			
			<h3><?php the_title(); ?></h3>

			<hr>

		<?php endwhile;?>

	<?php endif;?>

<?php get_footer(); ?>