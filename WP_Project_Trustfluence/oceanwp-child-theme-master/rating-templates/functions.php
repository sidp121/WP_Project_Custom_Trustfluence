<?php
function register_session_new(){
    if( ! session_id() ) {
       session_start();
     }
 }

add_action('init', 'register_session_new');

add_shortcode('reviews_form','reviews_form_func');
function reviews_form_func(){
	ob_start();
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script src="https://use.fontawesome.com/7ad89d9866.js"></script>

<?php
    $user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    $email   = $current_user->user_email;
    $first_name = get_user_meta( $user_id, 'first_name', true );
	$last_name = get_user_meta( $user_id, 'last_name', true );
	$review_id = get_user_meta( $user_id, 'review_id', true );
	session_start();
	$name        =  $_SESSION['user_name'];
	$job_title   =  $_SESSION['job_title'];
	$email       =  $_SESSION['email'];
	$review_text =  $_SESSION['review_text'];

      
   


	//if(empty($review_id)){
	?>
<div class="review-container">
	<div class="custom-review-wrpr">
		<h2><?php echo get_field( "gift_form_title", get_the_ID() ); ?></h2>
	<div class="feedback-form">
		<form method="post" id="custom_reviews" enctype="multipart/form-data" class="review-form">
		
                        <label>Vor- und Nachname</label>
						<input type="text" class="input" id="name" name="name" placeholder="Vor- und Nachname" value="<?php if(!empty($name)){ echo $name; } ?>" required>
						<label>Berufsbezeichnung</label>
						<input type="text" class="input" id="name" name="job_title" placeholder="Berufsbezeichnung" value="<?php if(!empty($job_title)){ echo $job_title; } ?>" required>
						
						<label>Email</label>
						<input type="email" class="input" id="email" name="email" placeholder="Email" value="<?php if(!empty($email)){ echo $email; } ?>" required>
						<div class="radio-rating">
                        <div class="title-label">
                        <?php echo get_field( "start_rating_title", get_the_ID() ); ?></div>
                        <div class="rating">
                        <input type="radio" id="star10" name="rating" value="10" />
						<label class="star" for="star10" title="10" aria-hidden="true"></label>
                        <input type="radio" id="star9" name="rating" value="9" />
						<label class="star" for="star9" title="9" aria-hidden="true"></label>
                        <input type="radio" id="star8" name="rating" value="8" />
						<label class="star" for="star8" title="8" aria-hidden="true"></label>
                        <input type="radio" id="star7" name="rating" value="7" />
						<label class="star" for="star7" title="7" aria-hidden="true"></label>
                        <input type="radio" id="star6" name="rating" value="6" />
						<label class="star" for="star6" title="6" aria-hidden="true"></label>
						<input type="radio" id="star5" name="rating" value="5" />
						<label class="star" for="star5" title="5" aria-hidden="true"></label>
						<input type="radio" id="star4" name="rating" value="4" />
						<label class="star" for="star4" title="4" aria-hidden="true"></label>
						<input type="radio" id="star3" name="rating" value="3" />
						<label class="star" for="star3" title="3" aria-hidden="true"></label>
						<input type="radio" id="star2" name="rating" value="2" />
						<label class="star" for="star2" title="2" aria-hidden="true"></label>
						<input type="radio" id="star1" name="rating" value="1" />
						<label class="star" for="star1" title="1" aria-hidden="true"></label>
                        </div>
                        <div class="cs-nmbr"><span class="cng">0</span>/10</div>
                        
						</div>
                        <div class="full-width custom-textarea">
						<label>Vervollständige den untenstehenden Satz (total max. 250 Zeichen) </label>
						<textarea name="review_text" id="the-textarea" maxlength="250" autofocus><?php echo get_field( "pre_text_for_screenshot", get_the_ID() ); ?></textarea>
                        <div id="the-count">
                            <span id="current">0</span>
                            <span id="maximum">/ 250</span>
                        </div>
                         </div>
						<label>Captcha auflösen 33+3=?</label>
						<input type="text" class="input" id="captcha" name="captcha" autocomplete="off" placeholder="33+3=?">
						 <label class="tickbox-label"><input type="checkbox" class="tickbox" id="tickbox" name="tickbox" value="Yes" checked>mein Testimonial darf veröffentlicht werden</label> 
						<input type="hidden" name="pageId" value="<?php echo get_the_ID(); ?>">
						<input type="submit" name="submit" class="revie_submit_btn" value="Einreichen">
		</form>
		<?php /* if(!is_user_logged_in()){
              echo '<div class="custom-overlay"><button id="login_signup">Melden Sie sich an, um Feedback zu senden</button></div>';
		}
		*/?>
	</div>
	<div class="display_status"></div>
	<?php $pageID = get_the_ID(); ?>
<?php include('review-share-form.php'); ?>

 
 

<script>
// jQuery for Submit review form.
var spinner = jQuery('#loader');
jQuery("#custom_reviews").on("submit", function(e){
	e.preventDefault();
	spinner.show();
	jQuery('.red').remove();
    var mssge = jQuery('[name="review_text"]').val();
	var pageId = jQuery('[name="pageId"]').val();
	var captcha = jQuery('#captcha').val();
    var rating = jQuery('[name="rating"]:checked').val();
    var job_title = jQuery('[name="job_title"]').val();
    var name = jQuery('[name="name"]').val();
    var email = jQuery('[name="email"]').val();
    var checkRadio = jQuery('input[type="radio"]');
	var checkbox = jQuery('input[type="checkbox"]');
	if(checkbox.is(':checked')) { 
		var checkbox = 'Yes';
   }else{
	    var checkbox = 'No';
   } 
    
	// for rating radio
	if(checkRadio.is(':checked')) { 

	}else {
		jQuery('<span class="redalert">wählen Sie ein Rating</span>').insertAfter("#custom_reviews .cs-nmbr");
				spinner.hide();	
				return false;	
            }

	 


	//var file_data  = jQuery('.upload_img').prop('files')[0];
			var form_data = new FormData();
			
			// form_data.append('file', file_data);
			 form_data.append('mssge', mssge);
			 form_data.append('captcha', captcha);
             form_data.append('job_title', job_title);
             form_data.append('email', email);
             form_data.append('name', name);
			 form_data.append('pageId', pageId);
             form_data.append('rating', rating);
			 form_data.append('checkbox', checkbox);
             form_data.append('action', 'ajaxsubmit_review');

 
	        jQuery.ajax({
							   url: '<?php echo admin_url('admin-ajax.php'); ?>',
							   type: "POST",
							   contentType: false,
                               processData: false,
							   data:form_data,
										success: function(response) { 
										if(response.status === 'done' ){
                                            var ratingg = '.display-rating [value="'+response.rating+'"]';
											jQuery('#box-container-share').css('display','block');
											 
											 
                                            jQuery('.display-rating').html(response.ratinghtml);
											setTimeout(function(){
												
												jQuery('#screenshot_form').css('display','block');
												jQuery(ratingg).attr("checked","checked");
												jQuery('.user_name').text(response.user_name);
												jQuery('.job_title').text(response.job_title);
												jQuery('.author-info').text(response.review_text);
												jQuery('.changeNm').text(response.rating);
												jQuery('.code_name').text(response.user_name);
												   take_screenshot(response.user_name, response.post_id);
												}, 2000);
											
										}else{
											jQuery('.display_status').html(response.status);
											spinner.hide();	
										}
										
										
									 },
								});
 });

 function take_screenshot(data, post_id){
	
	html2canvas(document.getElementById("box-container-share")).then(function(canvas){
           
		  save_file(canvas.toDataURL(), post_id);
	   });

	
         

 }

 function save_file(data, post_id){
	 
  var pdata = {
     action: "getimage",	
     postdata: data,
	 post_id: post_id
     }
  jQuery.ajax({
							   url: '<?php echo admin_url('admin-ajax.php'); ?>',
							   type: "POST",
							   data:pdata,
										success: function(response) { 
											jQuery('#display_scrn').attr('src',response.status);
											var txt = jQuery('#share_text').text();
											
											var sharelink = 'http://www.linkedin.com/shareArticle?mini=true&url='+response.status; 
											 jQuery('.linkhref').attr('href', sharelink);

											 jQuery('html, body').animate({
											'scrollTop' : jQuery(".test_title").position().top +100
										}, 1000);
										

										setTimeout(function(){
											jQuery('#box-container-share').css('display','none');
												 
												}, 4000);
												spinner.hide();	 
									 },
								});
}
</script>
	<?php

	return ob_get_clean();

}



add_action('wp_ajax_ajaxsubmit_review', 'ajaxsubmit_review_function');
add_action('wp_ajax_nopriv_ajaxsubmit_review', 'ajaxsubmit_review_function');
function ajaxsubmit_review_function() {
	 
	
	$response = array();
	global $current_user, $wp_roles;
     
	/*$fname = get_user_meta( $current_user->ID, 'first_name', true ); 
	$lname = get_user_meta( $current_user->ID, 'last_name', true ); 
	$display_name = $fname.' '.$lname;*/
    $review_text = $_POST['mssge'];
	$captcha = $_POST['captcha'];
	$pageId = $_POST['pageId'];
	$pageName = get_the_title($pageId);
    $rating = $_POST['rating'];
	$checkbox = $_POST['checkbox'];
	if(empty($checkbox)){
		$checkbox = 'No';
	}
	if(empty($rating)){
		$rating = 1;
	}
    $job_title = $_POST['job_title'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    /*
    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }
    $uploadedfile = $_FILES['file'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    $img_url =  $movefile['url'];
    */
    
    $status = '';
    if($captcha == 36){
		session_start();
    
        // Add Product
        $new_post = array(
            'post_title' => $name,
            'post_type' => 'reviews',
            'post_status' => 'publish', 
            //'post_author'   => $current_user->ID,
            'post_content' => $review_text
        );
        
		 

		 	$post_id =  wp_insert_post( $new_post );
			if(!empty($post_id)){
				update_post_meta( $post_id, 'user_name', $name );
				update_post_meta( $post_id, 'page_id', $pageName );
				update_post_meta( $post_id, 'star_rating', $rating );
				update_post_meta( $post_id, 'job_title', $job_title );
				update_post_meta( $post_id, 'email', $email );
				update_post_meta( $post_id, 'checkbox', $checkbox );
			  //  update_post_meta( $post_id, 'user_upload_file', $img_url );
				//update_user_meta( $current_user->ID, 'review_id', $post_id );
				$status = 'done';
			   }  

			$_SESSION['user_name'] = $name;
			$_SESSION['job_title'] = $job_title;
			$_SESSION['email'] = $email;
			$_SESSION['review_text'] = $review_text;
			$_SESSION['rating'] = $rating;
	        
			$response['user_name'] = $_SESSION['user_name'];
			$response['job_title'] = $_SESSION['job_title'];
			$response['review_text'] = $_SESSION['review_text'];
            $ratinghtml = getrating($_SESSION['rating']);
			$response['ratinghtml'] =  $ratinghtml;
			$response['rating'] =  $_SESSION['rating'];
		    $response['post_id'] = $post_id;


    }else{
        $status = '<span class="red">Wrong Captcha!</span>';
    }

	$response['status'] = $status;
	wp_send_json($response);
	wp_die();
}

 

add_action('wp_ajax_getimage', 'getimage_function');
add_action('wp_ajax_nopriv_getimage', 'getimage_function');
function getimage_function() {
	$response = [];
	$pdir=  wp_upload_dir();
	
	$path = $pdir['basedir'].'/canvas/';
	$url = $pdir['baseurl'].'/canvas/';
	 
	$file = $_POST['postdata'];
	$post_id = $_POST['post_id'];
	//define('UPLOAD_DIR', 'images/');  
	$img = str_replace('data:image/png;base64,', '', $file);  
	 
	$img = str_replace(' ', '+', $img);  
	$data = base64_decode($img);  
	$uniqe = uniqid() . '.jpg'; 
	$file_name =  $url . $uniqe;
	$file = $path . $uniqe; 

	update_post_meta( $post_id, 'linkedin_screenshot', $file_name );
	
	$success = file_put_contents($file, $data);  
	$response['status'] = $file_name;
	wp_send_json($response);
	wp_die();
}


function getrating($value){
  $rating = '';
  if($value == 1){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>	';
  }elseif($value == 2){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 3){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 4){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 5){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 6){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 7){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 8){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 9){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }elseif($value == 10){
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
  }else{
	$rating = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
  }
 
   return $rating;
}