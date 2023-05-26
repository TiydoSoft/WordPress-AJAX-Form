<?php
add_action('wp_ajax_ts_ajax_form_process','ts_ajax_form_process');
function ts_ajax_form_process(){
    $arr=[];
    wp_parse_str($_POST['ts_ajax_form'],$arr);
    $name = $arr['name'];
    $email = $arr['email'];
    
    $response_data = array(
        'name' => $name,
        'email' => $email
    );

    wp_send_json_success($response_data);
}