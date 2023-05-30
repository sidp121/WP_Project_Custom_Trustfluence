<?php

// All includes file here.
// include('cron_job_functions.php');

// Submit Feedback form frontend.
add_action('wp_ajax_submit_feedback_form', 'submit_feedback_form_function');
add_action('wp_ajax_nopriv_submit_feedback_form', 'submit_feedback_form_function');

function submit_feedback_form_function() {

  $star_value = $_POST['star_column'];
  if(empty($star_value)){
    $star_value = '';
  }
  $what_we_can = $_POST['what_we_can'];
  $company_name = $_POST['company_name'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $update_form = $_POST['update_form'];
  $date = date("Y-m-d"); 
  $token = strtotime(date("Y-m-d H:i:s"));
  // get Multisite domain name
  global $blog_id;
  $current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
  $site_domain = $current_blog_details->blogname;
  // end code for get Multisite domain name

  

  global $wpdb;
  $table_name = 'rvw_feedback_form'; 
  if(empty($update_form)){

              $insert_category_data = $wpdb->insert($table_name, array(
                'email' => $email,
                'full_name' => $full_name,
                'site_domain' => $site_domain,
                'star_value' => $star_value,
                'what_we_can' => $what_we_can,
                'company_name' => $company_name,
                'hit_status' => 'Pending',
                'created_date' => $date,
                'token' => $token
              ));

              if($insert_category_data == true){
                $insert_status = 'true';
                $inserted_id = $wpdb->insert_id;
              }else{
                $insert_status = 'false';    
              }

  }else{
    $user_token = $_POST['user_token'];                                      
    $inserted_id = $update_form;
            $data = array(
              'email' => $email,
              'full_name' => $full_name, 
              'star_value' => $star_value,
              'what_we_can' => $what_we_can,
              'company_name' => $company_name,
            );
          
          $where = array(
              'id' => $update_form, 
              'token' => $user_token
          );
          $insert_category_data =  $wpdb->update($table_name, $data, $where);
        
          if ($insert_category_data !== false && $insert_category_data > 0) {
            $insert_status = 'true';
           
        }
        else{
              $insert_status = 'false';
            }
  }
  

  

  $response = array();
  $response['status'] = $insert_status;   
  $response['stars'] = $star_value;
  $response['data_id'] = $inserted_id;
  wp_send_json($response);
    die();


}


// End code for Submit Feedback form frontend.




// add pages for Feedback enteries on wp-admin
function add_custom_feeback_page_option() {
	add_menu_page(
		'Feedback Entries',
		'Feedback Entries',
		'manage_options',
		'feedback-entries',
		'custom_page_callback',
		'dashicons-admin-page',
		6
	);

	// add_submenu_page(
	// 	'feedback-entries',
	// 	'No Star Feedback',
	// 	'No Star Feedback',
	// 	'manage_options',
	// 	'noclick-submenu',
	// 	'noclick_submenu_callback'
	// );

	add_submenu_page(
		'feedback-entries',
		'Product Testimonial',
		'Product Testimonial',
		'manage_options',
		'product-testimonial-submenu',
		'product_testimonial_submenu_callback'
	);
  add_submenu_page(
		'feedback-entries',
		'Share Testimonial Setting',
		'Share Testimonial Setting',
		'manage_options',
		'share-testimonial-setting-submenu',
		'share_testimonial_setting_submenu_callback'
	);
  }
  
  function custom_page_callback() {
	  if(!empty($_GET['page']) && $_GET['page'] == 'feedback-entries'){
	    include('admin-entries-data.php'); 
    }
  }
  
  // function noclick_submenu_callback() {
  //   if(!empty($_GET['page']) && $_GET['page'] == 'noclick-submenu'){
  //     include('admin-noclick-data.php'); 
  //   }
  // }

  function product_testimonial_submenu_callback() {
    if(!empty($_GET['page']) && $_GET['page'] == 'product-testimonial-submenu'){
      include('admin-product-testimonial.php'); 
    }  
  }         
  
  function share_testimonial_setting_submenu_callback() {
    if(!empty($_GET['page']) && $_GET['page'] == 'share-testimonial-setting-submenu'){
      include('admin-share-testimonial-setting.php'); 
    }  
  }  

add_action('admin_menu', 'add_custom_feeback_page_option');
// End code for add pages for Feedback enteries on wp-admin
  
// get entry details for popup.
add_action('wp_ajax_get_feedback_data', 'get_feedback_data_function');
add_action('wp_ajax_nopriv_get_feedback_data', 'get_feedback_data_function');
function get_feedback_data_function() {
	 
	 $row_id = $_POST['id'];
	 
	  
	 $response = array();
     $option_data = '';
	     global $wpdb;
		  $pre = $wpdb->prefix;
		  $feedback_table = 'rvw_feedback_form';    
	       
		    $get_data = $wpdb->get_results( "SELECT * FROM $feedback_table WHERE id = '$row_id'");
					foreach ($get_data as $feedback) { 
                        $timestamp = strtotime($feedback->created_date);
                        $created_date = date("Y-m-d", $timestamp);
					              $option_data.= '<li><strong>Full Name</strong>: '.$feedback->full_name.'</li>';
					              $option_data.= '<li><strong>Site Domain</strong>: '.$feedback->site_domain.'</li>';
                        $option_data.= '<li><strong>Star Value</strong>: '.$feedback->star_value.'</li>';
                        $option_data.= '<li><strong>What We Can</strong>: '.$feedback->what_we_can.'</li>';
                        $option_data.= '<li><strong>Company Name</strong>: '.$feedback->company_name.'</li>';
                        $option_data.= '<li><strong>Hit Status</strong>: '.$feedback->hit_status.'</li>';
                        $option_data.= '<li><strong>Created Date</strong>: '.$created_date.'</li>';
                    } 
		 
	$response['feedback_data'] = $option_data;
	wp_send_json($response);
	wp_die();
	
}


// get entry details for popup.
add_action('wp_ajax_get_product_data', 'get_product_data_function');
add_action('wp_ajax_nopriv_get_product_data', 'get_product_data_function');
function get_product_data_function() {
	 
	 $row_id = $_POST['id'];
	 
	  
	 $response = array();
     $option_data = '';
	     global $wpdb;
		  $pre = $wpdb->prefix;
       $prodcut_table = 'rvw_product_form';    
	       
		    $get_data = $wpdb->get_results( "SELECT * FROM $prodcut_table WHERE id = '$row_id'");
					foreach ($get_data as $product) { 
                        $timestamp = strtotime($product->created_date);
                        $created_date = date("Y-m-d", $timestamp);
                        $option_data.= '<li><strong>Product Id</strong>: '.$product->product_id.'</li>';
					              $option_data.= '<li><strong>Full Name</strong>: '.$product->full_name.'</li>';
					              $option_data.= '<li><strong>Site Domain</strong>: '.$product->site_domain.'</li>';
                        $option_data.= '<li><strong>Email</strong>: '.$product->email.'</li>';
                        $option_data.= '<li><strong>Message</strong>: '.$product->message.'</li>';
                        
                        $option_data.= '<li><strong>Created Date</strong>: '.$created_date.'</li>';
                    } 
		
		 
	$response['product_data'] = $option_data;
	wp_send_json($response);
	wp_die();
	
}

// End code for get entry details for popup.




add_action('wp_ajax_submit_product_form', 'submit_product_form_function');
add_action('wp_ajax_nopriv_submit_product_form', 'submit_product_form_function');

function submit_product_form_function() {

    $product_item = $_POST['product_item'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $fullName = $firstname.' '.$lastname;
    $email = $_POST['email'];
    $message = $_POST['message'];
    $feedback_id = $_POST['feedback_id'];
    $date = date("Y-m-d"); 
    global $blog_id;
    $current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
    $site_domain = $current_blog_details->blogname;

    global $wpdb;
  $table_name = 'rvw_product_form'; 
  if(!empty($product_item)){     
              $insert_product_data = $wpdb->insert($table_name, array(
                'product_id' => $product_item,
                'site_domain'=> $site_domain,
                'full_name' => $fullName,
                'email' => $email,
                'message' => $message,
                'feedback_id' => $feedback_id,
                'created_date'=>  $date    
              ));
              if($insert_product_data == true){
                $insert_status = 'true';
              }else{
                $insert_status = 'false';    
              }
  }
  
  $response = array();
  $response['status'] = $insert_status;
  wp_send_json($response);
  die();
}