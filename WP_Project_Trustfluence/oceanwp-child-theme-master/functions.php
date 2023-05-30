<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}


add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );
include('rating-templates/functions.php');
add_shortcode('login_logout','login_logout_func');

function login_logout_func(){
	ob_start();
	if(is_user_logged_in()){
		$user_id = get_current_user_id();
		$redirect_url = get_user_meta($user_id, 'redirection_page_id', true);
	$redirect_url = get_the_permalink($redirect_url);
		echo '<button class="login-btn"><a href="'.wp_logout_url($redirect_url).'">Logout? <i aria-hidden="true" class="fas fa-sign-out-alt"></i></a></botton>';
	}else{
		echo '<button  class="login-btn" id="login_signup">Login <i aria-hidden="true" class="fas fa-long-arrow-alt-right"></i></botton>';
	}
	return ob_get_clean();
}



add_shortcode('custom_logo','custom_logo_func');

function custom_logo_func(){
	ob_start();
	$site_logo_id = get_theme_mod( 'custom_logo' );
	$site_logo = wp_get_attachment_url($site_logo_id);
	$upload_logo = get_field( "upload_logo", get_the_ID() );
	 
	$site_url = get_site_url();
	$permalink = get_the_permalink();
echo '<div class="custom-logo">';
if( !empty($upload_logo)) {
    echo '<a href="'.$permalink.'"><img src="'.$upload_logo.'" width="180"></a>';
} else {
    echo '<a href="'.$permalink.'"><img src="'.$site_logo.'" width="180"></a>';
}
echo '</div>';	 
return ob_get_clean();
}


add_shortcode('custom_login_signup','custom_login_signup_func');

function custom_login_signup_func(){
	ob_start();
	?>
	<div class="custom-login-form">
	<div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a class="active" href="#signup-tab-content">Sign Up</a></h3>
			<h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="signup-tab-content" class="active">
				<form class="signup-form" id="register_form">
					<div class="first-last">
						<span>
					<label>First Name</label>
				    <input type="text" class="input" id="user_fname" name="user_fname" autocomplete="off" placeholder="First Name" required></span>
						<span>
					<label>Last Name</label>
					<input type="text" class="input" id="user_lname" name="user_lname" autocomplete="off" placeholder="Last Name" required>
</span>
</div>
					<label>Enter Email</label>
					<input type="email" class="input" id="user_email" name="user_email" autocomplete="off" placeholder="Email">
					<label>Enter Password</label>
					<input type="password" class="input" id="user_pass" name="user_pass" autocomplete="off" placeholder="Password">
                    <label>Resolve captcha 43+3=?</label>
					<input type="text" class="input" id="captcha" name="captcha" autocomplete="off" placeholder="43+3=?">
					<input type="hidden" name="redirection_url" value="<?php echo get_the_ID(); ?>">
					<input type="submit" name="submit" class="register_btn" value="Sign Up">
				</form><!--.login-form-->
				<div class="display_status"></div>
			</div><!--.signup-tab-content-->

			<div id="login-tab-content">
				<form class="login-form" id="login_form">
				   <label>Enter Email</label>
					<input type="text" class="input" id="user_login" name="login_user" autocomplete="off" placeholder="Email or Username">
					<label>Enter Password</label>
					<input type="password" class="input" id="user_pass"  name="login_password" autocomplete="off" placeholder="Password">
					<input type="checkbox" name="remeber" class="checkbox" id="remember_me">
					<label for="remember_me">Remember me</label>
					<input type="submit" class="button login_btn" value="Login">
				</form><!--.login-form-->
				<div class="display_status"></div>
				<div class="help-text">
					<p><a href="<?php echo get_site_url(); ?>/wp-login.php?action=lostpassword" target="_blank">Forget your password?</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
</div>
<script>
jQuery(document).ready(function(jQuery) {
	tab = jQuery('.custom-login-form .tabs h3 a');

	tab.on('click', function(event) {
		event.preventDefault();
		tab.removeClass('active');
		jQuery(this).addClass('active');

		tab_content = jQuery(this).attr('href');
		jQuery('div[id$="tab-content"]').removeClass('active');
		jQuery(tab_content).addClass('active');
	});
});

// jQuery for registration form.
jQuery("#register_form").on("submit", function(e){
	e.preventDefault();
	jQuery('.register_btn').val('Submitting...');
    var pdata = {
     action: "ajaxregister",	
     postdata: jQuery(this).serialize()
     }
	        jQuery.ajax({
							   url: '<?php echo admin_url('admin-ajax.php'); ?>',
							   type: "POST",
							   data:pdata,
										success: function(response) { 
										if(response.status === 'done'){	
												jQuery('.display_status').html("<span class='green'>User has been created!</span>");
												jQuery("form#register_form").trigger("reset");
										     	window.location = response.redirect_url;
												 
											}else{
												jQuery('.display_status').html(response.status);
											}
										jQuery('.register_btn').val('Sign Up');	 
									 },
								});
 })
  

// jQuery for login form.

jQuery("#login_form").on("submit", function(e){
	e.preventDefault();
	jQuery('.login_btn').text('Submitting...');
    var pdata = {
     action: "ajaxlogin",	
     postdata: jQuery(this).serialize()
     }
	        jQuery.ajax({
							   url: '<?php echo admin_url('admin-ajax.php'); ?>',
							   type: "POST",
							   data:pdata,
										success: function(response) { 
										if(response.status == 'not_done'){
											jQuery('.display_status').html('<span class="red">Wrong username or password.</span>');
										}else{
											window.location = response.redirect_url;
										}
											 
									 },
								});
 })

</script>
	<?php
	return ob_get_clean();
}


add_action('wp_ajax_ajaxregister', 'ajaxregister_function');
add_action('wp_ajax_nopriv_ajaxregister', 'ajaxregister_function');
function ajaxregister_function() {
	
	parse_str($_POST['postdata'], $temp);
	 
	 
	  $fname = $temp['user_fname'];
	  $lname = $temp['user_lname'];  
	  $display_name = $fname.' '.$lname;
	  $email = $temp['user_email'];
	  $password = $temp['user_pass'];
	  $captcha = $temp['captcha'];
	  $redirection_url = $temp['redirection_url'];
	  $response = array();  
	  if($captcha == 46){
					
						if(email_exists($email)){
							$status = '<span class="red">User already exists!</span>';  
							$response['status'] = $status;
							wp_send_json($response);
							wp_die();
						}
					
						
						
						$userdata = array(    
									'user_login'            => $email,
									'first_name'            => $fname,  
									'last_name'             => $lname,
									'user_email'            => $email,
									'user_pass'             => $password,
								);
					 $user_id = wp_insert_user($userdata);
		 
					if ( !is_wp_error( $user_id ) ) {
						 update_user_meta($user_id, 'redirection_page_id', $redirection_url);
						// for auto login
						 wp_set_current_user($user_id);
                         wp_set_auth_cookie($user_id); 
						$redirect_url = get_user_meta($user_id, 'redirection_page_id', true);
	                    $redirect_url = get_the_permalink($redirect_url);
						 $status = 'done';
							
					}else{
						$status = '<span class="red">Something Went Wrong!</span>';
					}
	  }else{
		$status = '<span class="red">Wrong Captcha!</span>';
	  } 
	 
 
	 $response['status'] = $status;
	 $response['redirect_url'] = $redirect_url;
	 wp_send_json($response);
	 wp_die();
}


 



add_action('wp_ajax_ajaxlogin', 'ajaxlogin_function');
add_action('wp_ajax_nopriv_ajaxlogin', 'ajaxlogin_function');
function ajaxlogin_function() {
	
	parse_str($_POST['postdata'], $temp);
	 
	
	$response = array();
	$info = array();
    $info['user_login'] = $temp['login_user'];
    $info['user_password'] = $temp['login_password'];
	if($temp['remeber'] == 'on'){
	$info['remember'] = true;
	}else{
	$info['remember'] = false;	
	}
   

    $user_signon = wp_signon( $info, true );
    if ( is_wp_error($user_signon) ){
      $status = 'not_done';
    } else {
      $status = 'done';
    }
	$redirect_url = get_user_meta($user_signon->ID, 'redirection_page_id', true);
	$redirect_url = get_the_permalink($redirect_url);
	$response['status'] = $status;
	$response['redirect_url'] = $redirect_url;
	
	wp_send_json($response);
	wp_die();
}



add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
show_admin_bar(false);
}
}

function create_review_posttype() {
  
    register_post_type( 'reviews',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Reviews' ),
                'singular_name' => __( 'review' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'reviews'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_review_posttype' );

function create_gift_posttype() {
  
    register_post_type( 'gifts',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Gifts' ),
                'singular_name' => __( 'Gift' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'gifts'),
            'show_in_rest' => true,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail'),
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_gift_posttype' );

function add_author_support_to_review_posts() {
	add_post_type_support( 'reviews', 'author' ); 
 }
 add_action( 'init', 'add_author_support_to_review_posts' );


 function create_custom_product_posttype() {
  
    register_post_type( 'custom_product',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Custom Product' ),
                'singular_name' => __( 'review' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'custom_product'),
            'show_in_rest' => true,
			'supports'            => array( 'title', 'thumbnail', 'custom-fields'),
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_product_posttype' );


add_shortcode('home_page_owl_carousel', 'home_carousel_fun');
function home_carousel_fun(){
	ob_start(); ?>
 
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
<?php
	$pageID = get_the_ID();
$args = array(
    'posts_per_page'   => -1,
    'post_type' => 'gifts',
    
   
 );
 $query = new WP_Query($args);
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
 
<?php
	return ob_get_clean();
}
 


//  add Feedback Admin functions
include('email-workflow/custom_functions.php');

//  add Email Compaign Admin functions
include('email-campaign/email_custom_functions.php');

      
