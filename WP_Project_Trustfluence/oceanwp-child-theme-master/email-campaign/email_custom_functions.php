<?php

// add pages for Feedback enteries on wp-admin
function add_custom_email_campaign_option() {
	add_menu_page(
		'Email Campaign',
		'Email Campaign',
		'manage_options',
		'email-campaign',
		'email_campaign_callback',
		'dashicons-admin-page',
		12
	);

	add_submenu_page(
		'email-campaign',
		'Contact List',
		'Contact List',
		'manage_options',
		'contact-list-submenu',
		'contact_list_submenu_callback'
	);

	
  }
  
  function email_campaign_callback() {
	  if(!empty($_GET['page']) && $_GET['page'] == 'email-campaign'){
	    include('admin-email-compaign.php'); 
    }
  }
  
  function contact_list_submenu_callback() {
    if(!empty($_GET['page']) && $_GET['page'] == 'contact-list-submenu'){
      include('admin-contact-list.php'); 
    }
  }

  

add_action('admin_menu', 'add_custom_email_campaign_option');
// End code for add pages for Feedback enteries on wp-admin

?>