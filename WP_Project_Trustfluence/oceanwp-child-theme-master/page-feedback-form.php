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
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css" rel="stylesheet">

<?php



if(isset($_GET['data-id']) && !empty($_GET['data-id']) && isset($_GET['token-id']) && !empty($_GET['token-id'])){
   $data_id = $_GET['data-id'];
   $user_token = $_GET['token-id'];
   global $wpdb;
   $feedback_table = 'rvw_feedback_form'; 
      
     $get_data = $wpdb->get_results( "SELECT * FROM $feedback_table WHERE id = '$data_id' and token = '$user_token'");
       foreach ($get_data as $feedback) { 
        $full_name = $feedback->full_name;
        $site_domain = $feedback->site_domain;
        $star_value = $feedback->star_value;
        $what_we_can = $feedback->what_we_can;
        $company_name = $feedback->company_name;
        $email = $feedback->email;
        $user_token_key = $feedback->token;
       }
    if(!empty($get_data)){
         // Convert token to Unix timestamp
      $currentTimestamp = time();  // Get current Unix timestamp
      
      $expiryDuration = 12 * 24 * 60 * 60;  // 7 days in seconds
      
      if ($currentTimestamp - $user_token > $expiryDuration) {
        $user_token =  "expired";
      } else {
        $user_token =  "valid";
      }
    }else{
      $user_token = 'not_found';
    }
}else{        
        $data_id = '';   
        $full_name = '';   
        $site_domain = '';   
        $star_value = '';  
        $what_we_can = '';
        $company_name = '';
        $email = '';
        $user_token_key = '';
}


//echo 'Token: '.$user_token;


if($user_token !== 'expired' && $user_token !== 'not_found'){     
  
?>


    


<form id="feedback_form">
<div class="main-section">
<div class="step-first"> 
<div class="rating-head">
    <h1>Wie wahrscheinlich ist es, dass Du uns weiterempfehlen würdest</h1>
    <h3>(1 = sehr unwahrscheinlich, 10 = sehr wahrscheinlich)<h3>
</div>    
<div class="rating-section">    
<div class="star-rating">
  <input type="radio" id="10-stars" name="rating" value="10" />
  <label for="10-stars" class="star">&#9733;</label>
  <input type="radio" id="9-stars" name="rating" value="9" />
  <label for="9-stars" class="star">&#9733;</label>
  <input type="radio" id="8-stars" name="rating" value="8" />
  <label for="8-stars" class="star">&#9733;</label>
  <input type="radio" id="7-stars" name="rating" value="7" />
  <label for="7-stars" class="star">&#9733;</label>
  <input type="radio" id="6-star" name="rating" value="6" />
  <label for="6-star" class="star">&#9733;</label>
  <input type="radio" id="5-star" name="rating" value="5" />
  <label for="5-star" class="star">&#9733;</label>
  <input type="radio" id="4-star" name="rating" value="4" />
  <label for="4-star" class="star">&#9733;</label>
  <input type="radio" id="3-star" name="rating" value="3" />
  <label for="3-star" class="star">&#9733;</label>
  <input type="radio" id="2-star" name="rating" value="2" />
  <label for="2-star" class="star">&#9733;</label>
  <input type="radio" id="1-star" name="rating" value="1" />
  <label for="1-star" class="star">&#9733;</label>
  </div>
 </div>
</div>

<div class="less-then-from">
 <div class="second-step-form" >
  <div class="input-text-head">
    <h1>Was können wir besser machen? <span class="cs-required">*</span></h1>
    <h4>Was müssen wir verbessern, damit Du uns mind. 7 Sterne geben würdest?<h4>
    <input type="text" class="text-field" id="input-2" placeholder="Type your answer here..."  value="<?php echo $what_we_can; ?>" />
   </div>
   </div>

  <div class="third-step-form" >
  <div class="input-text-head">
    <h1>Unternehmensname <span class="cs-required">*</span></h1>
    <h4>Für welches Unternehmen arbeitest Du?<h4>
    <input type="text" class="text-field" id="input-3" placeholder="Type your answer here..."  value="<?php echo $company_name; ?>"/>

   </div>
  </div>
 
  <div class="fourth-step-form">
   <div class="input-text-head">
    <h1>Vor- und Nachname <span class="cs-required">*</span></h1>
    <input type="text" class="text-field" id="input-4"  placeholder="Type your answer here..." value="<?php echo $full_name; ?>" />
   </div>   
  </div>   
  <div class="fourth-step-form" >
   <div class="input-text-head">
    <h1>Email <span class="cs-required">*</span></h1>
    <input type="email" class="text-field" id="input-5"  placeholder="Type your email here..." value="<?php echo $email; ?>" />
   </div>
  </div>

 </div>
 <button type="submit" class="btn-submit" >Submit</button>
</div>
</form>
<?php }else{

     echo '<div class="token-expired"><h2>Your Token expired!</h2></div>';

} 

if(isset($_GET['star']) && !empty($_GET['star'])){
  $star = $_GET['star'];
  ?>
<script>
 var star_item = '[value="<?php echo $star; ?>"]';
 jQuery(star_item).attr('checked','checked');
</script>
  <?php
}

?>

<?php get_footer(); ?>

<script>
 var thank_you_msg = '<div class="thank-you"><h4>Vielen Dank für Dein Feedback.</h4><p>Wir sind Dir wirklich sehr dankbar für Deine Rückmeldung. Wir setzen alles daran, in Zukunft noch besser zu werden - auch dank Dir!</p></div>';
var landing_page = '<?php echo get_site_url(); ?>';
 /*
jQuery('[name="rating"]').on('change', function(){
 
        var star=jQuery(this).val();
       
        if (star <= 6) {       
        jQuery('.less-then-from').show();
        
      } else {
        jQuery('.less-then-from').hide();     
              
      }
    
    });
 */
// Submit form with ajax.
 
jQuery('#feedback_form').on('submit', function(event){
  event.preventDefault();
  
     var star_value = jQuery('[name="rating"]:checked').val();
     var what_we_can = jQuery('#input-2').val();
     var company_name = jQuery('#input-3').val();
     var full_name = jQuery('#input-4').val(); 
     var email = jQuery('#input-5').val(); 
     var update_form = '<?php echo $data_id; ?>';
     var user_token = '<?php echo $user_token_key; ?>';
     if(star_value == undefined){
      var star_value = 0;
     }

     if(update_form){
         if(star_value == 0){
          jQuery('.star-rating').css('border','1px solid red');
              scrollToErrorField('.star-rating');
              return false;
              alert('ok');
            }else {
              jQuery('.star-rating').css('border','none');
            } 
        
     }
      
     // Required Field 
     if(!what_we_can){
      jQuery('#input-2').attr('required','required');
      scrollToErrorField('#input-2');
      return false;
     }else {
     jQuery('#input-2').removeAttr('required');
     }
     
     if(!company_name){
      jQuery('#input-3').attr('required','required');
      scrollToErrorField('#input-3');
      return false;
     }else {
     jQuery('#input-3').removeAttr('required');
     }
     if(!full_name){
      jQuery('#input-4').attr('required','required');
      scrollToErrorField('#input-4');
      return false;
     }else {
     jQuery('#input-4').removeAttr('required');
     } 
     if(!email){
      jQuery('#input-5').attr('required','required');
      scrollToErrorField('#input-5');
      return false;
     }else {       
     jQuery('#input-5').removeAttr('required');
     } 
     
     jQuery('.btn-submit').text('Submitting...');
 // End code for Required Field.   

  jQuery.ajax({
      type: 'post',
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      data: {action: 'submit_feedback_form', star_column:star_value, what_we_can:what_we_can, company_name:company_name, full_name:full_name, email:email, update_form:update_form, user_token:user_token},
      success: function (data) {   
                        if(data.stars >= 7 && data.status == 'true'){
                          window.location.href = landing_page+'/product-page/?feedback-id='+data.data_id;    
                        }
                        if(data.stars <= 6 && data.status == 'true'){
                           jQuery('#feedback_form').html(thank_you_msg);
                        }
                        jQuery('.btn-submit').text('Submit');
                }
    });         
});   
     
function scrollToErrorField(fieldSelector) {
  var offset = jQuery(fieldSelector).offset().top;      
  jQuery('html, body').animate({ scrollTop: offset - 100 }, 'slow');
}    
</script>

