<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Awesome Theme</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">		
		<?php wp_head();?> <!-- It calls all header included files -->
	</head>
	
	<?php 

		if ( is_front_page()):
			$awesome_classes = array('awesome-class', 'my-class');
		else:
			$awesome_classes = array('no-awesome-class');
		endif;
	?>

	<body <?php body_class($awesome_classes);?>>

		<div class="container">

			<div class="row">
				<div class="col-xs-12">
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="#">Awesome Theme</a>
					    </div>	
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					    	<?php wp_nav_menu(array( 
									'theme_location' => 'primary', 
									'container'      => false, // Container disabled
									'menu_class'     => 'nav navbar-nav navbar-right', // Inserts content inside classes
									'walker'         => new Walker_Nav_Primary()
					    	));?>
						</div>
					  </div><!-- /.container-fluid -->
					</nav>		
				</div>

				<!-- Search field -->
				<div class="search-form-container">
					<?php get_search_form(); ?>
				</div>
			</div>
		
			<img src="<?php header_image();?>" height="<?php echo get_custom_header()->height;?>" width="<?php echo get_custom_header()->width;?>" alt="" />