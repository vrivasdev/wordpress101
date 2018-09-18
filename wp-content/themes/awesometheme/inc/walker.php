<?php 
/* Collection of Walker Classes 

wp_nav_menu()

<div class="menu-container">
	<ul> // start_lvl()
		
		<li><a><span> // start_el()
			</a></span>
			<ul>
			</li> // end_el()

		<li><a>Link</a></li>
		<li><a>Link</a></li>
		<li><a>Link</a></li>

	</ul>// end_lvl()
</div> 

*/

class Walker_Nav_Primary extends Walker_Nav_menu {

	function start_lvl( &$output, $depth = 0, $args = array() ){ // ul

		$indent  = str_repeat("\t", $depth); // "\t" is the tab that goes before ul element
		$submenu = ($depth > 0)? 'sub-menu' : '';

		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	/*
	function start_el(){ // li a span

	}
	
	function end_el(){// closing li a span

	}

	function end_lvl(){// closing ul

	}*/
}

?>