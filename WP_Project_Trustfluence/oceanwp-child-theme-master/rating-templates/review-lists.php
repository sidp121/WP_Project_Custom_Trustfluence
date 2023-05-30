<style>
.list-item {
    background: white;
}
.modal {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transform: scale(1.1);
  transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 2rem 2.5rem;
  max-width: 900px;
  width:90%;
  border-radius: 0.5rem;
}
.close-button {
  float: right;
  width: 1.5rem;
  font-size: 1.2em;
  line-height: 1;
  padding: 0 .2em .15em;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: var(--clr-neutral);
  color: var(--clr-dark);
  transition: color 0.12s ease-in-out;
}
.close-button:hover {
  color: var(--clr-main);
}
.show-modal {
  opacity: 1;
  visibility: visible;
  transform: scale(1.0);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
</style>

<div class="list-feedback-wrpr">
<h2>Customers Feedback.</h2>

<div class="list-feedback">

    <?php
    $pageID = get_the_ID();
$args = array(
    'posts_per_page'   => -1,
    'post_type' => 'reviews',
    'meta_key'         => 'page_id',
    'meta_value'       => $pageID
   
 );
 $query = new WP_Query($args);
 //print_r($query);
 // The Loop
if ( $query->have_posts() ) {
    
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>
    <div class="list-item" review-id="<?php echo get_the_ID(); ?>">
        <div class="feedback-img">
            <img src="<?php the_field('user_upload_file'); ?>">
        </div>
        <div class="feedback-text">
        <?php the_content(); ?>
        <div class="review-footer">
        <h4 class="author_name"><?php the_field('user_name'); ?></h4>
        <button class="share_feed trigger" data-id="<?php echo get_the_ID(); ?>">Share Feedback</button>
        </div>
        </div>
    </div>
    

<?php
    }
    
    /* Restore original Post Data */
    wp_reset_postdata();
}else{
    echo '<h2 class="not_found">No Feedback Found!</h2>';
}  

?>

<div class="modal">
  <div class="modal-content">
    <span class="close-button">&times;</span>
    <div class="display_data"><img src=""></div>
  </div>
</div>


   


</div>
</div>

<script>
var modal = document.querySelector(".modal");
var triggers = document.querySelectorAll(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
  modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

for (var i = 0, len = triggers.length; i < len; i++) {
  triggers[i].addEventListener("click", toggleModal);
}
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);









jQuery('.share_feed').on('click', function(e){
    e.preventDefault();
    var data_id = jQuery(this).attr('data-id');
    
    var element = jQuery('[review-id="'+data_id+'"]');
    html2canvas(element, {
         onrendered: function (canvas) {
          //  
                
                data = canvas.toDataURL('image/png', 1.0);
                $(".display_data img").attr('src',data);
                save_file(data);
             }         });

            
});

 
function save_file(data){
  var pdata = {
     action: "getimage",	
     postdata: data
     }
  jQuery.ajax({
							   url: '<?php echo admin_url('admin-ajax.php'); ?>',
							   type: "POST",
							   data:pdata,
										success: function(response) { 
									  	 
									 },
								});
}
</script>

 