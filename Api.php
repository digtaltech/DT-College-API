<?php
require_once('Operation.php');

switch ($_GET['apicall']) {

  case 'getusers':
      $response = get_users();
  break;

  case 'getlog':
      if (isset($_GET['id'])) {
         $response = get_logs($_GET['id']);
      }
  break;

  case 'getlogtoday':
      if (isset($_GET['id'])) {
         $response = get_logs_today($_GET['id']);
      }
  break;

  default:
    echo "error";
  break;

 }
echo json_encode($response, JSON_UNESCAPED_UNICODE);
