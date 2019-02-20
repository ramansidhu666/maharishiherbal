<?php
/**
 * The template for displaying the footer
 */

?>

		
		  <div class="container">
					  <div class="">
						<div class="inner_sect">
						  <div class="futer_section">
						 <div class="col-md-12 col-sm-12">
						  <div class="futer_links">						  
						   
						   <?php
						  		 wp_nav_menu( array( 
								'theme_location' => 'footer-menu', 
								'container_class' => 'custom-menu-class' ) ); 
							?>

						  </div>
						 </div>
						</div>
				
				
				
				 <div class="copyright_sect">
						<h2>Designed & Developed by: Only4Agents</h2>
						</div>
					  </div>
				   </div>
	 		  </div>
        </div> 
     </div>
		
		
<?php wp_footer(); ?>

</body>
</html>
