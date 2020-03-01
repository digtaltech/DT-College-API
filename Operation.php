<?php
require_once('Constants.php');
header('Content-Type: application/json');
$connect = new mysqli(HOST, NAME, PASS, DB);

function get_users()
{
    $array_users = array();
    $result = $GLOBALS['connect']->query("SELECT * FROM `users`");
    while ($row = mysqli_fetch_assoc($result)) {
        $array_users[] = $row;
    }
    return $array_users;
    $GLOBALS['connect']->close();
}

function get_logs($id_log)
{
    $array_logs = array();
    $result = $GLOBALS['connect']->query("SELECT * FROM `log` WHERE `id` = $id_log");
    while ($row = mysqli_fetch_assoc($result)) {
        $array_logs[] = $row;
    }
    return $array_logs;
    $GLOBALS['connect']->close();
}
