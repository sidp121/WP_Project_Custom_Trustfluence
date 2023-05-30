<?php
/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */

?>

	</main><!-- #main -->

	<?php do_action( 'ocean_after_main' ); ?>

	<?php do_action( 'ocean_before_footer' ); ?>

	<?php
	// Elementor `footer` location.
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		?>

		<?php do_action( 'ocean_footer' ); ?>

	<?php } ?>

	<?php do_action( 'ocean_after_footer' ); ?>

</div><!-- #wrap -->

<?php do_action( 'ocean_after_wrap' ); ?>

</div><!-- #outer-wrap -->

<?php do_action( 'ocean_after_outer_wrap' ); ?>

<?php
// If is not sticky footer.
if ( ! class_exists( 'Ocean_Sticky_Footer' ) ) {
	get_template_part( 'partials/scroll-top' );
}
?>

<?php
// Search overlay style.
if ( 'overlay' === oceanwp_menu_search_style() ) {
	get_template_part( 'partials/header/search-overlay' );
}
?>

<?php
// If sidebar mobile menu style.
if ( 'sidebar' === oceanwp_mobile_menu_style() ) {

	// Mobile panel close button.
	if ( get_theme_mod( 'ocean_mobile_menu_close_btn', true ) ) {
		get_template_part( 'partials/mobile/mobile-sidr-close' );
	}
	?>

	<?php
	// Mobile Menu (if defined).
	get_template_part( 'partials/mobile/mobile-nav' );
	?>

	<?php
	// Mobile search form.
	if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
		ob_start();
		get_template_part( 'partials/mobile/mobile-search' );
		echo ob_get_clean();
	}
}
?>

<?php
// If full screen mobile menu style.
if ( 'fullscreen' === oceanwp_mobile_menu_style() ) {
	get_template_part( 'partials/mobile/mobile-fullscreen' );
}
?>




<?php
// Make redirect to Review page.
/*
if(is_user_logged_in()){
    $user_id = get_current_user_id();
    $current_page = get_the_ID();
    $review_template = get_post_meta($current_page,'review_template', true);
    
    $page_id = get_user_meta($user_id,'redirection_page_id', true);
    $redirect_url = get_the_permalink($page_id);
     
if($current_page != $page_id && !empty($page_id) && $review_template == true){
     
    ?>
<script>
window.location = '<?php echo $redirect_url; ?>';



</script>

<?php
}
}
*/

$page_ID = get_the_ID();

$mobile_testimonial_background_color = '#201f24';
if(!empty(get_field( "mobile_testimonial_background_color", $page_ID ))){
	$mobile_testimonial_background_color = get_field( "mobile_testimonial_background_color", $page_ID );
}
$mobile_theme_color = '#f15435';
if(!empty(get_field( "mobile_theme_color", $page_ID ))){
	$mobile_theme_color = get_field( "mobile_theme_color", $page_ID );
}
  ?>
<style>
    .copy_wpr {
    margin-top: 15px;
}
@media screen and (min-width: 822px) {
    #box-container-share {
    max-width: 1080px;
    min-height: 1080px;
    overflow: hidden;
}
	#box-container-share .div-wrap{
    padding: 5px 10px 0;
}                 
.div-wrap .box-m-body {
    padding: 45px 105px 20px 105px;
    text-align: center;
    position: relative;
    border-radius: 35px;
    min-height: 380px;
}
.div-wrap span.prev-icon-share {
    position: absolute;
    left: 25px;
	top: -45px;
    font-size: 54px;
}
.div-wrap span.next-icon-share {
    position: absolute;
    right: 25px;
	bottom: -50px;
    font-size: 54px;
}
.div-wrap .review-m-logo {
    text-align: center;
}
.div-wrap .review-m-logo img {
	width: 425px;
    padding: 15px;
}
.div-wrap .radio-m-rating {
    text-align: center;
    padding: 10px;
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 72px;
    margin-top: 10px;
}
.div-wrap .cs-m-nmbr {
    font-size: 40px;
    width: 110px;
    height: 110px;
    line-height: 110px;
    color: white;
    margin: auto;
    border-radius: 50%;
}
.div-wrap .rating-m.display-rating img {
    width: 520px;
}
.div-wrap .rating-m.display-rating {                              
	width: 75%;
    padding: 0px 10px;
    border-radius: 50px;
    margin: auto;
    margin-top: -15px;
}
.box-m-footer {       
    padding: 24px 0px;
    margin-top: 50px;
    color: white;
    font-size: 38px;
    position: relative;
    line-height: 60px;
    min-height: 300px;
}                       
.div-wrap p.author-info {
    color: white;
    font-size: 36px;
    line-height: 45px;
    margin-bottom: 10px;
}
.div-wrap p.author-position {
	font-size: 32px;
    margin-bottom: 15px;
    font-weight: 600;
}
.shape-top {             
    width: 100%;
    height: 140px;
    border-radius: 67%;
    position: absolute;
    top: -12px;
    transform: scale(1.3);
}           
p.footer-m-info { 
    position: relative;
    padding: 0 15px;
    color: white;
    margin: 0;
    margin-top: 10px;
}                                                                                                               .rating-m .fa {
	font-size: 54px;
    margin: 0 10px;
    margin-top: 5px;
    color: white;
}                                                                                                               .cs-num {
    width: 100%;
}


}

@media screen and (max-width: 821px) {
#box-container-share .div-wrap{
    padding: 5px 10px 0;
}
#box-container-share {
    overflow: hidden;
}
.div-wrap .box-m-body {
    padding: 17px 20px 10px 20px;
    text-align: center;
    position: relative;
    border-radius: 20px;
    min-height: 160px;
    
}
.div-wrap span.prev-icon-share {
    position: absolute;
    left: 25px;
    top: -30px;
    font-size: 36px;
}
.div-wrap span.next-icon-share {
    position: absolute;
    right: 25px;
    bottom: -30px;
    font-size: 32px;
}
.div-wrap .review-m-logo {
    text-align: center;
}
.div-wrap .review-m-logo img {
    width: 170px;
	padding: 7px;
}
.div-wrap .radio-m-rating {
    text-align: center;
    padding: 5px;
    display: flex;
    flex-wrap: wrap;
}
.div-wrap .cs-m-nmbr {
    font-size: 16px;
    width: 50px;
    height: 50px;
    line-height: 50px;
    color: white;
    margin: auto;
    border-radius: 50px;
}
.div-wrap .rating-m.display-rating img {
    width: 520px;
}
.div-wrap .rating-m.display-rating {                              
    width: 70%;
    padding: 0px 10px;
    border-radius: 50px;
    margin: auto;
    margin-top: -15px;
}
.box-m-footer {       
    padding: 10px 0px;
    margin-top: 20px;
    color: white;
    font-size: 14px;
    position: relative;
}                       
.div-wrap p.author-info {
    color: white;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 5px;
}
.div-wrap p.author-position {
    font-size: 16px;
    margin-bottom: 0;
    font-weight: 600;
}
.shape-top {       
    width: 100%;
    height: 66px;
    border-radius: 67%;
    position: absolute;
    top: -12px;
    transform: scale(1.3);
}
p.footer-m-info { 
    position: relative;
    padding: 0 15px;
    color: white;
    margin: 0;
    margin-top: -15px;
}                                                                                                               .rating-m .fa {
    font-size: 18px;
    margin: 0 3px;
    margin-top: 5px;
    color: white;
}                                                                                                               .cs-num {
    width: 100%;
}                                                        
   
        



}

</style>
     <div id="box-container-share">
		<div class="div-wrap">
	         <div class="review-m-logo">
				<img src="<?php echo get_field( "upload_logo", $page_ID ); ?>" >
			 </div>
			 <div class="box-m-body" style="background:<?php echo $mobile_testimonial_background_color; ?>;">
					<span class="prev-icon-share" style="color:<?php echo $mobile_theme_color; ?>;"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
					<p class="author-info"> </p>
					<p class="author-position" style="color:<?php echo $mobile_theme_color; ?>;">
						<span class="user_name"></span>, <span class="job_title"></span>
					</p>
					<span class="next-icon-share" style="color:<?php echo $mobile_theme_color; ?>;"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
			 </div>
			 <div class="radio-m-rating">
			 <div class="cs-num"><div class="cs-m-nmbr" style="background:<?php echo $mobile_theme_color; ?>;"><span class="changeNm">0</span>/10</div></div>	                                   
					<div class="rating-m display-rating" style="background:<?php echo $mobile_theme_color; ?>;"></div>
						
			 </div>       
        </div>                   
			 <div class="box-m-footer" style="background:<?php echo $mobile_theme_color; ?>;">
			        <div class="shape-top"  style="background:<?php echo $mobile_theme_color; ?>;"></div>
					<p class="footer-m-info">
					<?php echo get_field( "footer_text_for_screenshot", $page_ID ); ?>
					</p>
			 </div>
     </div>
 

<script> 

jQuery('.review-form textarea').keyup(function() {
    
	var characterCount = $(this).val().length,
		current = $('#current'),
		maximum = $('#maximum'),
		theCount = $('#the-count');
	  
	current.text(characterCount);
   
	
	/*This isn't entirely necessary, just playin around*/
	 
	
	if (characterCount >= 250) {
	  maximum.css('color', '#8f0001');
	  current.css('color', '#8f0001');
	  theCount.css('font-weight','bold');
	} else {
		maximum.css('color', 'green');
	  current.css('color', 'green');
	  theCount.css('font-weight','bold');
	}
	
		
  });
  jQuery('[name="rating"]').on('click', function(){
	var rating = jQuery('[name="rating"]:checked').val();
	jQuery('.cng').text(rating);
  });
  



  
</script>
<?php wp_footer(); ?>
</body>
</html>
 