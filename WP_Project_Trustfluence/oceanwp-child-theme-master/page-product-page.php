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

<!-- <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

.product-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-wrap: wrap;
}
/* Create two equal columns that floats next to each other */
.product-col {
    width: 45%;
    padding: 10px;
    
}

/* Clear floats after the columns */
.product-wrapper:after {
    content: "";
    display: table;
    clear: both;
}
.main-section-product {
    display: flex;
    
    justify-content: center;
    
}
section.right-section {
    width: 50%;
}
section.left-section {
    background-color: rgb(67, 183, 143);
    width: 50%;
    /* padding: 30px 0 150px;
    overflow-y: scroll;
    height: 700px; */
}
.img-col {
    border: 1px solid black;
    padding: 20px 30px 0px 30px;
    background-color: #3ba581;
    position: relative;
    cursor: pointer;
}
.left-inner-section {
    padding: 40px;
}
img.product-img {
   
    height: 160px;
}
.img-col h2 {
    text-align: left;
    padding-top: 10px;
    display: flex;
    font-size: 16px;
    line-height: 24px;
} 

.img-col h2 span {
    border: 1px solid green;
    display: flex;
    align-items: center;
    font-weight: 700;
    justify-content: center;
    flex-direction: column;
    width: 24px;
    min-width: 22px;
    height: 24px;
    border-radius: 2px;
    font-size: 12px;
    line-height: 16px;
    font-family: sans-serif;
    border-color: rgba(0, 0, 0, 0.6);
    background-color: rgba(111, 211, 183, 0.8);
    color: rgb(0, 0, 0);
    margin-right: 10px;
}


input[type=text]{
  
  border: none !important;
  border-radius: none !important;
  box-sizing: none !important;
  margin-top: 6px;
  margin-bottom: 40px;
  resize: vertical;
}

input[type=submit] {
    position: relative;
    font-family: inherit;
    line-height: initial;
    font-weight: 700;
    cursor: pointer;
    transition-duration: 0.1s;
    transition-property: background-color, color, border-color, opacity, box-shadow;
    transition-timing-function: ease-out;
    outline: none;
    border: 1px solid transparent;
    margin: 0px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 3px 12px 0px;
    padding: 6px 14px;
    min-height: 40px;
    background-color: rgb(38, 38, 39);
    color: rgb(229, 229, 230);
    border-radius: 4px;
}



.second-step-form {
    border-radius: 5px;
    padding: 20px;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

.form-section{
    background-color: rgb(67, 183, 143);
    padding: 110px 0;
    
}
.form-field {
    display: block;
    font-family: inherit !important;
    padding: 0px 0px 8px !important;
    border: none !important;
    outline: none !important;
    border-radius: 0px !important;
    appearance: none !important;
    transform: translateZ(0px) !important;
    font-size: 24px !important;
    -webkit-font-smoothing: antialiased !important;
    line-height: unset !important;
    -webkit-text-fill-color: rgba(0, 0, 0, 0.3) !important;
    animation: 1ms ease 0s 1 normal none running native-autofill-in !important;
    transition: background-color 1e+08s ease 0s, box-shadow 0.1s ease-out 0s;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 1px;
    background-color: transparent !important;
 }
 form label {
    margin-bottom: 3px;
    margin: 0px;
    max-width: 100%;
    width: inherit;
    font-weight: unset;
    font-size: 16px;
    line-height: 24px;
    color: rgb(0, 0, 0);
}
.form-field:focus {
    box-shadow: rgb(0, 0, 0) 0px 2px;
}
input[type=submit]:hover {
   
    background-color: rgb(71, 71, 71);
}
.img-col.active:before {
    content: "\f00c";
    font-family: FontAwesome;
    display: inline-block;
    font-size: 20px;
    font-weight: bold;
    color: rgb(111, 211, 183);
    position: absolute;
    right: 5px;
    top: -5px;
    z-index: 999;
    }

    .img-col.active:after {
    content: "";
    display: block;
    width: 0px;
    height: 0px;
    border-width: 24px;
    border-style: solid;
    border-image: initial;
    border-color: rgb(0, 0, 0) rgb(0, 0, 0) transparent transparent;
    position: absolute;
    right: 0px;
    top: 0px;
}

    .img-col.active {
    border: 2px solid black;
}
.col-img-section {
    height: 700px;
}
.head-section {
    width: 85%;
    /* align-items: center; */
    /* display: flex; */
    /* flex-wrap: wrap; */
    max-width: 100%;
    margin: 0 auto;
}
.next-icon:after{
    
    content: "\f078";
    font-family: FontAwesome;
    position: fixed;
    right: 20px;
    bottom: 30px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: rgba(0,0,0,.4);
    color: #FFF !important;
    font-size: 25px;
    cursor: pointer;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    border-radius: 2px;
    text-align: center;
    z-index: 9999;
    /* -webkit-box-sizing: content-box; */
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    gap: 10px;
}

.back-icon:after{
    content: "\f077";
    font-family: FontAwesome;
    position: fixed;
    right: 61px;
    bottom: 30px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: rgba(0,0,0,.4);
    color: #FFF !important;
    font-size: 25px;
    cursor: pointer;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    border-radius: 2px;
    text-align: center;
    z-index: 9999;
    /* -webkit-box-sizing: content-box; */
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    gap: 10px;
    
}
/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .product-col {
        width: 100%;
    }
}
    
</style>

<div class="main-section-product active">
 <section class="left-section">
  <div class=left-inner-section>

    <div class="head-section">
    <h2>Wäle Deinen Gewinn</h2>
    <p>Nimm am Gewinnspiel teil und Gewinne coole Fashion Items!</p>
    </div>

    

<?php 
if(isset($_GET['feedback-id']) && !empty($_GET['feedback-id'])){
    $feedback_id = $_GET['feedback-id'];
}else{
    $feedback_id = '';
}


$args = array(
    'post_type' => 'custom_product',
    'order' => 'ASC' // Display posts in ascending order
    
);

$the_query = new WP_Query($args);

// The Loop
if ( $the_query->have_posts() ) {
    $i = 'A';
    echo '<div class="product-wrapper">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $product_id = get_the_ID(); 
?>

     <div class="product-col">
      <div class="img-col" product-id="<?php echo $product_id; ?>">
      <?php  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
      <img src="<?php echo $featured_img_url; ?>"  alt="" class="product-img">
      <h2><span><?php echo $i; ?></span><?php the_title(); ?></h2> 
      </diV>
     </div>
     
     <?php
     $i++;
        }
        echo '<div>';
        // Restore original Post Data 
        wp_reset_postdata();
    } else {
        // no posts found
    } 
    ?>

    </div>
 
 </section>


<section class="right-section">
    <div class="col-img-section">
     <div>
        <img src="https://trustfluence-reviews.ch/wp-content/uploads/2023/05/default-firstframe.jpeg" width="100%" height="100%" alt="" class="">
     </div>
    </div>
</section>

</div>




<div class="form-section" style="display:none;">
<div class="second-step-form">
  <form action="" id="product_form">
    <label for="fname">First Name</label>
    <input type="text" id="fname" class="form-field" name="firstname" placeholder="Jane">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" class="form-field" name="lastname" placeholder="Smith">

    <label for="email">Email</label>
    <input type="text" id="email" class="form-field" name="email" placeholder="name@example.com">

    <label for="zurich">What does the Jelmoli mean for Zurich?</label>
    <p>Give us your feedback, share it & take part in the competition</p>
    <input type="text" id="message" class="form-field" name="message" placeholder="Type your answer here...">

    <input type="submit" class="btn-submit" value="Submit">
  </form>
</div>
</div>
<div class="page-up-down">
<a href="#" class="back-icon"></a>
<a href="#" class="next-icon"></a>
</div>
<?php get_footer(); ?>


<script>
  jQuery(document).ready(function($) {
    $('.next-icon').on('click', function() {
        $('.main-section-product').slideUp();
      $('.form-section').show(); // Show the form section
    });

    $('.back-icon').on('click', function() {
        $('.form-section').hide();
      $('.main-section-product').slideDown(); // Show the product section
      
    });

    // Hide the form section by default
    $('.form-section').hide();
  });

  // Submit form with ajax.

jQuery(document).ready(function($) {
  $('.img-col').on('click', function() {
    $('.img-col').removeClass('active');
    $(this).addClass('active');
    setTimeout(function () { 
    $('.main-section-product').slideUp();
    $('.form-section').show(); // Show the form section
  }, 1000);
  });
  // Hide the form section by default
  $('.form-section').hide();
});

// Submit form with ajax.

</script>

<script>


jQuery('#product_form').on('submit', function(event){
  event.preventDefault();
   
     var product_item = jQuery('.img-col.active').attr('product-id');
     var firstname = jQuery('#fname').val();
     var lastname = jQuery('#lname').val();    
     var email = jQuery('#email').val();    
     var message  = jQuery('#message').val();
     var feedback_id = '<?php echo $feedback_id; ?>';   
     
     jQuery('.btn-submit').val('Submitting...');
 // End code for Required Field.   
 
  jQuery.ajax({
      type: 'post',
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      data: {action: 'submit_product_form', product_item:product_item, firstname:firstname, lastname:lastname, email:email, message:message, feedback_id:feedback_id },
      success: function (data) {   
         alert(data.status);
                 jQuery('.btn-submit').val('Submit');
                }              
    });         
});   
   
</script>