<?php
session_start();

class Utils
{
  private static $JSON_FILE = "./storage/users.json";
  private static $SESSION_LIFETIME = 10;

  public static function getUsersFromJSONFile()
  {
    $usersJSON = file_get_contents(Utils::$JSON_FILE);
    $arrayUsers = json_decode($usersJSON, true);
    $users = [];
    foreach ($arrayUsers as $user) {
      $users[$user[0]] = $user[1];
    }
    return $users;
  }

  public static function checkCookieExpiration()
  {
    if (($_SESSION['lastActivity'] + Utils::$SESSION_LIFETIME) < time()) {
      Utils::destroySession("index.php?expire=true");
    } else {
      $_SESSION['lastActivity'] = time();
    }
  }

  public static function destroySession($path)
  {
    session_destroy();
    unset($_SESSION);
    header("Location: $path");
    exit;
  }
}
