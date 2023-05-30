<style>
#screenshot_form{
	margin-top:90px;
	display:none;
}
</style>

<form method="post" id="screenshot_form" enctype="multipart/form-data" class="review-form">
	<h2 class="test_title">Teile Dein Testimonial in Deinem Netzwerk</h2>
	<?php if(!empty(get_field( "short_running_text_for_linkedin", $pageID ))){
     echo '<div class="short-runing-text">'.get_field( "short_running_text_for_linkedin", $pageID ).'</div>';
	} ?>
	
		                <img src="" id="display_scrn">
                        <input type="hidden" name="file_url" id="screenshot" value="">
						<div class="copy_wpr">
						<textarea name="share_text" id="share_text" autofocus><?php echo get_field( "pre_text_for_linkedin", $pageID ); ?> </textarea>
						<button id="copy_btn">Copy</button>
                        </div>
						<!--<input type="submit" name="submit" class="screenshot_submit_btn" value="Share on LinkedIn">-->
						<p class="share-btns"><a class="linkhref" target="_blank" href=""><img width="100" src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png"></a></p>
		</form>

<script>
	jQuery("#copy_btn").on('click',function(e){
		e.preventDefault();
	 var htmldata = jQuery("#copy_btn").html();
     var $temp = jQuery("<input>");
     var text = jQuery("#share_text").text();
     jQuery("body").append($temp);
	   $temp.val(text).select();
	   document.execCommand("copy");
	   $temp.remove();
    
		 jQuery("#copy_btn").html('Copied!');
		   setTimeout(function(){ 
				jQuery("#copy_btn").html(htmldata);
			 }, 2000);
		
  });
</script>