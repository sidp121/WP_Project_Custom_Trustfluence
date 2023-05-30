<?php
 
$body ='<div style="padding:30px;max-width:600px;background: #F9F9F9;margin: 40px auto;">
        <div style="padding:30px;background: #fff;margin:30px 0px">
        
        <p>Hi '.$full_name.'</p>
        
        <p>Kunden- und Partner-Feedback hilft uns dabei, noch besser zu werden. Davon wirst auch Du 
        profitieren. Wir möchten Dich daher um Deine ehrliche Meinung bitten. Bitte teile uns mit wenigen 
        Klicks mit, ob Du uns in Deinem Netzwerk weiterempfehlen würdest. Bist Du zufrieden mit uns, bieten wir 
        Dir zudem die Teilnahme an unserem Markenbotschafter-Programm an, in welchem wir Dich mit wirklich 
        attraktiven Vergütungen an unserem Neukunden-Business beteiligen.</p>

        <p>

        <p style="margin:20px 0;"><span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/feedback-from'.$site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=1">&#9733;
        </a>
        </span>
        <span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=2">&#9733;
        </a>
        </span>
        <span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=3">&#9733;
        </a>
        </span>
        <span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=4">&#9733;
        </a>
        </span>
        <span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=5">&#9733;
        </a>
        </span>
        <span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=6">&#9733;
        </a>
        </span>
        <span style="font-size: 50px;cursor: pointer;">
        <a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=7">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=8">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=9">&#9733;</a></span><span style="font-size: 50px;cursor: pointer;"><a style="text-decoration: none;color: #ccc;" href="'.get_site_url().'/'.$result_dataa->site_domain.'/feedback-form/?data-id='.$result_dataa->id.'&token-id='.$result_dataa->token.'&star=10">&#9733;</a></span></p>
         
        </div>
        </div>';
                            
        $subject  = 'First Mail';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: trustfluence-reviews.ch <sandro@trustfluence.ch>" . "\r\n";
        $headers .= "Reply-To: sandro@trustfluence.ch \r\n";
        $email = '';
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
?>        