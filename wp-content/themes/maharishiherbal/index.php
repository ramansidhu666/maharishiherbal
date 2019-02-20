<?php
/**
 * The main template file
 */

get_header(); ?>



 <div class="container">
		   <div class="">
			  <div class="inner_sect">
              <div class="row">
				<div class="middle_sect_bg">
				 <div class="col-md-3 col-sm-3">
				  <div class="left_section">
				   <div class="sidebar_menu">
				   <h3 class="menu_header">Categories</h3>
				   
				  <ul>
				   <?php

							  $taxonomy     = 'product_cat';
							  $orderby      = 'name';  
							  $show_count   = 0;      // 1 for yes, 0 for no
							  $pad_counts   = 0;      // 1 for yes, 0 for no
							  $hierarchical = 1;      // 1 for yes, 0 for no  
							  $title        = '';  
							  $empty        = 0;
							
							  $args = array(
									 'taxonomy'     => $taxonomy,
									 'orderby'      => $orderby,
									 'show_count'   => $show_count,
									 'pad_counts'   => $pad_counts,
									 'hierarchical' => $hierarchical,
									 'title_li'     => $title,
									 'hide_empty'   => $empty
							  );
							 $all_categories = get_categories( $args );
							 foreach ($all_categories as $cat) {
								if($cat->category_parent == 0) {
									$category_id = $cat->term_id;       
									echo '<li /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
							
									$args2 = array(
											'taxonomy'     => $taxonomy,
											'child_of'     => 0,
											'parent'       => $category_id,
											'orderby'      => $orderby,
											'show_count'   => $show_count,
											'pad_counts'   => $pad_counts,
											'hierarchical' => $hierarchical,
											'title_li'     => $title,
											'hide_empty'   => $empty
									);
									$sub_cats = get_categories( $args2 );
									if($sub_cats) {
										foreach($sub_cats as $sub_category) {
											echo  $sub_category->name ;
										}   
									}
								}       
							}
				?>
				  </ul>				  
				   
				   </div>				   
				   
					 <div class="best_sellers">
						   <h3 class="menu_header">Best Sellers</h3>						   
									<div class="box_sect">							
									 <?php
										 $args = array(
										  'post_type' => 'product',
										  'posts_per_page' => 1,
										  'meta_key' => 'total_sales',
										  'orderby' => 'meta_value_num',
										 );
										 $loop = new WP_Query( $args );
										 if ( $loop->have_posts() ) {
										  while ( $loop->have_posts() ) : $loop->the_post();
										 ?>
				 
									<div class="product_img">  
										<a href="<?php the_permalink(); ?>" class="hover__6">
																	<?php if (has_post_thumbnail( $loop->post->ID )) 
											echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
										  else echo '<img src="'.woocommerce_placeholder_img_src().'" />'; ?>
									</div>										
									<div class="product_info">
										<div class="product_name">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</div>
										<!--<div class="product_desc">All these diseases are even...</div>-->
										<div class="product_price">
											<span class="money"><?php echo $product->get_price_html(); ?></span>
										</div>
										<div class="product_links">
											<a class="btn" href="<?php the_permalink(); ?>">Details</a>
										</div>
									</div>
									
									<?php				 
									   endwhile;
									 } else {
									  echo __( 'No products found' );
									 }
									 wp_reset_postdata();
									 ?>					
									</div>					
						   </div>
				          <!--end:best_sellers -->				   
				   
				  </div>
				 </div>
				 <!-- end:col-md-3 -->
				 
				  <div class="col-md-9 col-sm-9">
				 <div class="right_section">
				   <div class="banner_sect">	<?php echo do_shortcode('[metaslider id=55]');?>			   
				   <?php //echo do_shortcode('[bxgallery]');?>
				   
				   </div>
				  <div class="add_section">
				   <div class="row">
					 <div class="col-md-4 col-sm-4 animated">
					  <div class="add_box">
					  <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/add1.jpg" alt="" title=""/></a>
					  </div>
					 </div>
					 <div class="col-md-4 col-sm-4 animated">
					  <div class="add_box">
					  <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/add2.jpg" alt="" title=""/></a>
					  </div>
					 </div>
					 <div class="col-md-4 col-sm-4 animated">
					  <div class="add_box">
					  <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/add3.jpg" alt="" title=""/></a>
					  </div>
					 </div>
				   
					</div>
				  </div>
				  <!-- end:add_section -->
				  				  
				  <div class="products_section">
				  
				   <h2>Featured Products</h2>
				   
				   <div class="products">
					<div class="row">					
								
					<?php
						$args = array(
							'post_type' => 'product',
							'stock' => 1,
							'meta_key' => '_featured',  
							'meta_value' => 'yes', 
							'posts_per_page' => 4,
							'orderby' =>'date',
							'order' => 'DESC' 
						);
						 
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); 
						global $product; ?>					
					                <div class="col-md-4 col-sm-4">
											<div class="box_sect">
												<div class="product_img">  
													<a href="<?php the_permalink(); ?>" class="hover__6">
													<?php if (has_post_thumbnail( $loop->post->ID )) 
							echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
						  else echo '<img src="'.woocommerce_placeholder_img_src().'" />'; ?>
													</a>
												</div>
												<div class="product_info">
													<div class="product_name">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</div>
													<!--<div class="product_desc">All these diseases are even...</div>-->
													<div class="product_price2">
														<span class="money"><?php echo $product->get_price_html(); ?></span>
													</div>
													<div class="product_links2">
														<a class="btn" href="<?php the_permalink(); ?>">Add to Carts</a>
													</div>
												</div>												
										</div>
									</div>
					
							 <?php endwhile; ?>
						<?php wp_reset_query(); ?>					 
					 
					</div>
				   </div>
				  </div>
				   <!--end:products_section -->				  
				 </div>
				 </div>
				 <!--end:col-md-9 -->				 	
				</div>
                </div>
			 </div> 
		   </div> 
		  <!--end:col-md-12 -->
   </div> 




<?php get_footer();
