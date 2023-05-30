<?php

 function cron_action_scheduler_run_queue_4832ea7a( $arg0 ) {
 
    include('emails/no-star-email.php');
}

add_action( 'action_scheduler_run_queue', 'cron_action_scheduler_run_queue_4832ea7a', 10, 1 );

