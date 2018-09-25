<!-- SINGLE BLOG POST PAGE -->
<?php get_header(); ?>

<div class="row">
	<div class="col-xs-12 col-sm-8">

		<?php if( have_posts()):?>

			<?php while( have_posts()): the_post();?>					
				
				<article id="post-<?php the_ID();?>" <?php post_class();?>>	

					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

					<?php if ( has_post_thumbnail() ): ?>

						<div class="pull-right"><?php the_post_thumbnail('thumbnail'); ?></div>

					<?php endif;?>

					<small>

					<?php foreach( wp_get_post_terms( $post->ID, 'field' ) as $i => $term ):?>				
						<?php echo ( $i > 0 )? ', ' . $term->name : $term->name;?>
					<?php endforeach;?>
					 || 
					<?php foreach( wp_get_post_terms( $post->ID, 'software' ) as $i => $term ):?>				
						<?php echo ( $i > 0 )? ', ' . $term->name : $term->name;?>
					<?php endforeach;?> 
					 || <?php edit_post_link();?>
					 					 	
					 </small>
					
					<?php the_content(); ?>

					<hr>

					<div class="row">
						<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
						<div class="col-xs-6 text-left"><?php next_post_link(); ?></div>
					</div>
					
				</article>											

			<?php endwhile;?>

		<?php endif;?>
	</div>
	
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>