
<!-- start For Delete user contact list -->
<?php
if(isset($_GET['delete_list_key'])){
   $delete_list_key = $_GET['delete_list_key'];
   
   global $wpdb;
$table_name = 'rvw_email_compaign_contact_list';
$result = $wpdb->delete( $table_name, array( 'list_key' => $delete_list_key ) );

?>
 <?php
}
//  End For Delete user contact list

// display List all contact where list condtion.
if(isset($_GET['list_key']) && isset($_GET['list_name'])){
   $list_key = $_GET['list_key'];
   $list_name = $_GET['list_name'];
  ?>
<div class="all-contact-list">
    <h3><?php echo $list_name; ?></h3>
<?php
global $blog_id;
$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
$site_domain = $current_blog_details->blogname;
global $wpdb;
$table_name = 'rvw_email_compaign_contact_list';
$sql_data = $wpdb->get_results( " SELECT * FROM $table_name where list_key = '$list_key' AND site_domain = '$site_domain' ");
  
?>
<table class="table table-bordered" id="feedfack_table">
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>

<?php
$i = 0;
    foreach ($sql_data as $result_dataa) {  $i++; 
    
    ?>
       <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result_dataa->fname; ?></td>
        <td><?php echo $result_dataa->lname; ?></td>
        <td><?php echo $result_dataa->email_id; ?></td>
      </tr>

<?php  } ?>     
      
    </tbody>
  </table>



</div>


<?php
// End display List all contact where list condtion.

}else{ 
  // display All list.  
    ?>


<div class="all-contact-list">
    <h3>All Conact List</h3>
<?php
global $blog_id;
$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
$site_domain = $current_blog_details->blogname;
global $wpdb;
$table_name = 'rvw_email_compaign_contact_list';
$sql_data = $wpdb->get_results( "SELECT DISTINCT list_key, list_name, list_key FROM $table_name where site_domain = '$site_domain'");

?>
<table class="table table-bordered" id="feedfack_table">
    <thead>
      <tr>
        <th>List Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
    foreach ($sql_data as $result_dataa) {  
       
        ?>
   
       <tr>
        <td><?php echo $result_dataa->list_name; ?></td>
        <td><a class="btn-show-data pr-2" href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=contact-list-submenu&list_name=<?php echo $result_dataa->list_name; ?>&list_key=<?php echo $result_dataa->list_key; ?>">Show Data</a> 
        
        <a class="btn-delete-list border-left px-3" href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=contact-list-submenu&delete_list_key=<?php echo $result_dataa->list_key; ?>" onclick="return confirm('Are you sure?')"> Delete List </a></td>
      </tr>         
<?php  } ?>
      
    </tbody>
  </table>



</div>

 <?php   } ?>