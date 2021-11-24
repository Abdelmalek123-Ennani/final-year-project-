<?php

require_once('./../db_connect.php');



header('Access-Control-Allow-Origin: *');  // everyone can access to that api
header('Content-Type: application/json;');
header('Access-Control-Allow-Methods: POST');  // accept just post method
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers , Content-Type , Access-Control-Allow-Methods , Authorization , X-Requested-With');  // accept just post method



if (isset($_GET['test'])) {
    echo json_encode(['test' => "Abdelmalek"]);
}
