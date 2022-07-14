<?php
//die();
include '../wp-load.php';

//$token = file_get_contents(__DIR__ . '/../ls_api/token.secret');
//echo $token;

$phone_number = "0906556574";
try {
    $url = LS_API_URL . '/member/CheckMemberOutlet?Phone='.$phone_number.'&ClubCode=DAFC'; //DAFC //0978267699

    $body = array();

    $added_id = addAPILog($url, 'POST', '', '', 0);
    $response = wp_remote_post( $url, 
        array(
            'headers'   => array(
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Bearer ' . LS_API_TOKEN
            ),
            'method'    => 'POST',
            'timeout'   => 30,
            'body'		=> json_encode($body),
        )
    );

    $api_result = false;
    if(isJson($response['body'])) {
        $api_result = json_decode($response['body'], true);
    }
    updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
    echo $api_result ? 'PASS' : 'FAIL';
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
    return false;
}