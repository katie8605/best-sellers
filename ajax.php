<?php
require_once('Models/Api.php');
$api = New Api;

if (isset($_POST['date'])){
    $date = $_POST['date'];
    $hasError = true;

    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
        $hasError = false;
    }

    $data = $api->getBookLists($date, $hasError);
    include_once('list.php');
}