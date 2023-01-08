<?php
require './utils.php';


$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$users = Utils::getUsersFromJSONFile();
foreach ($users as $name => $pass) {
  if ($name == $username && password_verify($password, $pass)) {
    initSession($username);
  }
}

header("Location: index.php?error=true");
exit;


function initSession($name)
{
  $_SESSION['USER'] = $name;
  $_SESSION['lastActivity'] = time();
  header("Location: page.php");
  exit;
}
