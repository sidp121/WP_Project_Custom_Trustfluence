<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>
<div class="div-wrpr">
 <div class="swiper mySwiper">
    <div class="swiper-wrapper">
<?php

$term = get_queried_object();
	$pageID = get_the_ID();

    
    $query = new WP_Query( array(
        'post_type' => 'gifts',
        'tax_query' => array(
            array (
                'taxonomy' => 'clients',
                'field' => 'id',
                'terms' => $term,
            )
        ),
    ) );
    
    
 //print_r($query);
 // The Loop
if ( $query->have_posts() ) {
    
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>
      <div class="swiper-slide">
		 <a href="<?php the_permalink(); ?>"> <div class="slideimg">
			 <span></span>
			  <img src="<?php the_post_thumbnail_url(); ?>">
		  <div class="pagetitle">
			  <h2><?php the_title(); ?></h2>
			  <div class="short-des"><?php the_content(); ?></div>
		  </div>
		  </div></a>
		</div>


<?php }
    
    /* Restore original Post Data */
    wp_reset_postdata();
}else{
    echo '<h2 class="not_found">No Feedback Found!</h2>';
}   ?>
       
		
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 70,
	  loop:true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
	breakpoints: {
	769: {
       slidesPerView: 3,
      spaceBetween: 70,
    },
	480: {
       slidesPerView: 2,
      spaceBetween: 30,
    },
	280: {
      slidesPerView: 1,
      spaceBetween: 0,
    },
	},
    });
  </script>
<?php get_footer(); ?>
