<?php

function return_response(WP_REST_Request $request) {
    $form_data = $request->get_params();
    $result = GFAPI::submit_form( 1, $form_data );

    //error_log(print_r($result, true));

    return $result;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'dmh/v1', 'submit_form', array(
        'methods' => 'POST',
        'callback' => 'return_response',
    ));
} );
