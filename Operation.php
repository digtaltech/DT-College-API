<?php
require_once('Constants.php');
header('Access-Control-Allow-Origin: *'); // Для чтения ресурсов переделать
header('Content-Type: application/json'); // Определение JSON

$connect = new mysqli(HOST, NAME, PASS, DB);
mysqli_set_charset($connect, 'utf8'); // Задаём кодировку для подключения к БД

function get_users()
{
    $array_users = array();
    $result = $GLOBALS['connect']->query("SELECT * FROM `users`");
    while ($row = mysqli_fetch_assoc($result)) {
        $array_users[] = $row;
        $array_stud["stud"] = $array_users; // Задаём заголовок для массива
    }
    return $array_stud;
    $GLOBALS['connect']->close();
}

function get_logs($id_log)
{
    $array_logs = array();
    $result = $GLOBALS['connect']->query("SELECT * FROM `log` WHERE `IdStud` = $id_log");
    while ($row = mysqli_fetch_assoc($result)) {
        $array_log[] = $row;
        $array_logs["logs"] = $array_log; // Задаём заголовок для массива
    }
    return $array_logs;
    $GLOBALS['connect']->close();
}

// function get_logs_today($id_log)
// {
//     $array_logs = array();
//     $result = $GLOBALS['connect']->query("SELECT * FROM `log` WHERE `IdStud` = $id_log");
//     while ($row = mysqli_fetch_assoc($result)) {
//         $array_logs[] = $row;
//     }
//     return $array_logs;
//     $GLOBALS['connect']->close();
// }
