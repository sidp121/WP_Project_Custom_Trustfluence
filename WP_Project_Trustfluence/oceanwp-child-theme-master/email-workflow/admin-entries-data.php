<link href="<?php echo get_stylesheet_directory_uri(); ?>/email-workflow/style.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<div class="feedback-page">
<h1 class="page-title">Feedback Entries</h1>
<table id="feedfack_table" class="cell-border" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>site_domain</th>
                <th>Stars</th>
                <th>Company Name</th>
                <!--<th>Hit Status</th>-->
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
global $blog_id;
$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
$site_domain = $current_blog_details->blogname;

global $wpdb;
 $pre = $wpdb->prefix;
 $booking_table = 'rvw_feedback_form'; 
 $sql_data = $wpdb->get_results( "SELECT * FROM $booking_table");
 $i = 0;
 foreach ($sql_data as $result_dataa) {   
    $i++;
    $timestamp = strtotime($result_dataa->created_date);
    $created_date = date("Y-m-d", $timestamp);
    if( $result_dataa->site_domain == $site_domain){
 ?>

            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result_dataa->full_name; ?></td>
                <td><?php echo $result_dataa->email; ?></td>
                <td><?php echo $result_dataa->site_domain; ?></td>
                <td><?php echo $result_dataa->star_value; ?></td>
                <td><?php echo $result_dataa->company_name; ?></td>
               <!-- <td><?php echo $result_dataa->hit_status; ?></td> -->
                <td><?php echo $created_date; ?></td>
                <td><button data-toggle="modal" data-target="#myModal" data-id="<?php echo $result_dataa->id; ?>" class="cs_view">View <i class="fa fa-eye" aria-hidden="true"></i></button></td>
            </tr>
            <?php }	}  ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Sr. No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Site Domain</th>
                <th>Stars</th>
                <th>Company Name</th>
               <!-- <th>Hit Status</th> -->
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="modal fade cs-feedback_model" id="myModal" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header">
          <h3>Feedback Details</h3> <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body form_tast_field">
          <ul class="feedback_data_display"></ul>
           
        </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
jQuery(document).ready(function () {
    jQuery('#feedfack_table').DataTable();
});
</script>
<script>
    jQuery('.cs_view').click(function(){
       
        jQuery('.feedback_data_display').hide();
         var row_id = jQuery(this).attr('data-id');
       
         jQuery.ajax({
				     url: '<?php echo admin_url('admin-ajax.php'); ?>',
				     type: "POST",
				     data:{ 
				    		    action: 'get_feedback_data', id:row_id },
				    			success: function(data) {
				    			    jQuery('.feedback_data_display').show();
				    				jQuery('.feedback_data_display').html(data.feedback_data);
				    				 
				    		 },
				    });
		
		   // Make dragabble model box.
		   jQuery('.modal-dialog').draggable({
			handle: ".modal-header" 
		  });
		
		
		
    });
</script>