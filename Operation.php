<?php
require_once('Constants.php'); // Подключаем константы
header('Access-Control-Allow-Origin: *'); // Для чтения ресурсов переделать
header('Content-Type: application/json'); // Определение JSON

$connect = new mysqli(HOST, NAME, PASS, DB); // Инициализируем подключение
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
    $GLOBALS['connect']->close(); // Закрытие соединения
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
    $GLOBALS['connect']->close(); // Закрытие соединения
}

function get_logs_today($id_log_today)
{
   $array_logs = array();
   $result = $GLOBALS['connect']->query("SELECT id, DATE_FORMAT(Time, '%H:%i:%s') as 'Time',IdStud,Event FROM `log` WHERE `IdStud` = $id_log_today AND DATE_FORMAT(Time, '%Y-%m-%d') = CURRENT_DATE() ");
   while ($row = mysqli_fetch_assoc($result)) {
      $array_log[] = $row;
      $array_logs_today["logs_today"] = $array_log; // Задаём заголовок для массива
   }
   return $array_logs_today;
   $GLOBALS['connect']->close(); // Закрытие соединения
}
