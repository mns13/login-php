<?php

class User extends db_object
{
  protected static $db_table = "users";
  protected static $db_table_fields = array('username', 'password'); //колонки в таблице
  public $id,
  $username,
  $password;

  #   #   #     METHODS      #     #     #

  public static function verifyUser($username, $password)
  {
      global $database;
      $username = $database->escapeString($username);
      $password = $database->escapeString($password);
      $sql = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

      $the_result_array = self::FindByQuery($sql);
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }

}
    
?>
