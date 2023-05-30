<?php

global $wpdb;
 $feedback_table = 'rvw_feedback_form'; 
 $sql_data = $wpdb->get_results( "SELECT * FROM $feedback_table where star_value = '' and email_after_2_days = ''");
 foreach ($sql_data as $result_dataa) { 
     
    $timestamp = strtotime($result_dataa->created_date);
    $created_date = date("Y-m-d", $timestamp);
    $after_2_days = date("Y-m-d", strtotime($created_date . " +2 days"));
    $today_date = date("Y-m-d");
    $full_name = $result_dataa->full_name;
    if($after_2_days == $today_date){
     
        $body ='<div style="padding:30px;max-width:600px;background: #F9F9F9;margin: 40px auto;">
        <div style="padding:30px;background: #fff;margin:30px 0px">
        <h3>No Click on stars</h3>
        <p>Hi '.$full_name.',<br><br>
        This Email campaign for after 2 days, Please Give me at least a star</p>
        <p style="margin:20px 0;"><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=1">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=2">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=3">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=4">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=5">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=6">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=7">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=8">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=9">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=10">&#9733;</a></span></p>
         
        </div>
        </div>';
                            
        $subject  = 'No Click on stars!';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: trustfluence-reviews.ch <sandro@trustfluence.ch>" . "\r\n";
        $headers .= "Reply-To: sandro@trustfluence.ch \r\n";
        $email = $result_dataa->email;
        $send = wp_mail( $email, $subject, $body, $headers );
        if($send == true ){
            $data = array(
                'email_after_2_days' => 'success',  
            );
            
            $where = array(
                'id' => $result_dataa->id, 
            );
            $wpdb->update($feedback_table, $data, $where);
        }
       


    }
    
   
  
    
 }


 $sql_data = $wpdb->get_results( "SELECT * FROM $feedback_table where star_value = '' and email_after_5_days = ''");
 foreach ($sql_data as $result_dataa) {  
    

    $timestamp = strtotime($result_dataa->created_date);
    $created_date = date("Y-m-d", $timestamp);
    $after_5_days = date("Y-m-d", strtotime($created_date . " +5 days"));
    $today_date = date("Y-m-d");
    $full_name = $result_dataa->full_name;
    if($after_5_days == $today_date){
     
        $body ='<div style="padding:30px;max-width:500px;background: #F9F9F9;margin: 40px auto;">
        <div style="padding:30px;background: #fff;margin:30px 0px">
        <h2>No Click on stars</h2>
        <p>Hi '.$full_name.',<br><br>
        This Email campaign for after 5 days, Please Give me at least a star</p>
        <p style="margin:20px 0;"><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=1">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=2">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=3">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=4">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=5">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=6">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=7">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=8">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=9">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=10">&#9733;</a></span></p>
        </div>
        </div>';
                            
        $subject  = 'No Click on stars!';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: trustfluence-reviews.ch <sandro@trustfluence.ch>" . "\r\n";
        $headers .= "Reply-To: sandro@trustfluence.ch \r\n";
        $email = $result_dataa->email;
        $send = wp_mail( $email, $subject, $body, $headers );
        if($send == true ){
            $data = array(
                'email_after_5_days' => 'success',  
            );
            
            $where = array(
                'id' => $result_dataa->id, 
            );
            $wpdb->update($feedback_table, $data, $where);
        }
       


    }

    
 }
 
      
  ?>