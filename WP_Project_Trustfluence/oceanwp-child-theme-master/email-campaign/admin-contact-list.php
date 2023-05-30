<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    
    .cs-import_model ul.import-csv{
	padding-left: 0;
	background: #f6f6f6;
    padding: 10px;
    }

    .modal-header {
    display: block !important;
    }

    ul.import-csv li {
    border-bottom: 1px solid gainsboro;
    margin-bottom: 10px;
    padding-bottom: 10px;
    }
    .cs-field {
    padding: 8px 15px;
    }
    .btn-field-submit {
      padding: 5px 15px;
    }
    .csv-head{
        text-align:center;
    }
    .cs-field label {
    color: black;
    font-weight: 600;
    }
    .import-csv {
    /* width: 80%; */
    max-width: 80%;
    margin: 0 auto;
    }
    .cs-field input {
    width: 100%;
    }
    button.btn-csv-import {
    border: none;
    padding: 8px;
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    background-color: #4CAF50;
    border-radius: 5px;
    }
   .main-btn-csv {
    padding-top: 20px;
   }
   h2.csv_success {
    font-size: 18px;
    background: #c1dfc1;
    padding: 7px 20px;
    border-radius: 5px;
    margin-top: 10px;
}
.contact-lists {
    margin-top: 15px;
    margin-right: 10px;
}
.contact-lists table {
    margin-top: 20px;
}
input#btn-submit {
    background-color: #4CAF50;
    color: #fff;
    border: 0;
    font-size: 15px;
    padding: 5px 20px;
    border-radius: 5px;
}
.wp-core-ui select{
    padding: 0 24px 0 8px !important;
}
.dataTables_wrapper .dataTables_filter input {
    padding: 0px !important;
    margin-left: 5px !important;
}
table.dataTable tbody th, table.dataTable tbody td {
    padding: 5px 10px !important;
    font-size: 14px !important;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 5px 10px !important;
}
.btn-delete-list
{
    color: red !important; 
    font-weight: 600 !important;
}
.btn-show-data{
    font-weight: 600 !important;
}
div#feedfack_table_wrapper {
    padding-top: 20px !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0em 0.5em !important;
}


.dataTables_wrapper .dataTables_paginate {
    padding-top: 1.25em;
}
.dataTables_wrapper .dataTables_info {
    
    padding-top: 1.25em;
}
</style>

<div class="main-btn-csv">
<button data-toggle="modal" data-target="#myModal" data-id="" class="btn-csv-import"> Import CSV </button>
</div>

<div class="modal fade cs-import_model" id="myModal" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="csv-head">Import Contact List</h3> 
        </div>
        <div class="modal-body contact-list">
         <div class="import-csv">
          <form method="post" action="" enctype="multipart/form-data">
                    <div class="cs-field">
                        <label>List Name</label><br>
                        <input type="text" name="list_name" id="list-name">
                    </div>
                    <div class="cs-field">
                        <label>Upload CSV</label><br>
                        <input type="file" name="csvFile" accept=".csv">
                    </div>
                    <div class="btn-field-submit">
                      <input type="submit" id="btn-submit" value="Submit">
                    </div>
         </form>
        </div>
       </div>
      </div>
    </div>
</div>

<div class="contact-lists">
<?php include('all-contact-list.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
 global $wpdb;
 $table_name = 'rvw_email_compaign_contact_list';
 global $blog_id;
$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
$site_domain = $current_blog_details->blogname;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted
    if (isset($_POST['list_name']) && isset($_FILES['csvFile'])) {
        $list_name = $_POST['list_name'];
        $date = new DateTime();
        $key = $date->format('Ymd_His') . '_' . $list_name; 
        $list_key = str_replace(' ', '_', $key);
        $csv_file = $_FILES['csvFile']['tmp_name'];

        // Step 6: Parse the CSV file
        if (($handle = fopen($csv_file, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $fname = $data[0]; // Assuming the first column contains 'fname'
                $lname = $data[1]; // Assuming the second column contains 'lname'
                $email = $data[2];
               
                $insert_category_data = $wpdb->insert($table_name, array(
                    'fname' => $fname,
                    'lname' => $lname,
                    'email_id' => $email,
                    'list_name' => $list_name,
                    'list_key' => $list_key,
                    'site_domain' => $site_domain,
                  ));
                
             /*   if ($insert_category_data !== false) {
                    // Insertion successful
                    echo 'Data inserted successfully!';
                } else {
                    // Insertion failed
                    echo 'Error inserting data into the custom table.';
                }
             */
                
            }
            fclose($handle);

            // Step 8: Provide feedback to the user
            echo '<h2 class="csv_success">CSV import successful!</h2>';
            ?>
            <script>
                setTimeout(() => {
                    location.reload();
                }, 2000);
            </script>
<?php
        } else {
            echo 'Error opening the CSV file.';
        }
    } else {
        echo 'Invalid form data.';
    }
}



?>
<script>
jQuery(document).ready(function () {
    jQuery('#feedfack_table').DataTable();
});
</script>