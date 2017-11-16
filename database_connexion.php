<?php

/**
 *
 */
class Database
{
  private static $bdName = 'refugies_project';
  private static $bdHost = 'localhost';
  private static $bdUsername = 'root';
  private static $bdUserPassword = '';
  private static $cont = null ;

  public function _construct()
  {
    die('Init function is not allowed');
  }

  public static function connect()
  {
      If (null == self::$cont)
      {
        try
        {
          self::$cont = new PDO("mysql:host=".self::$bdHost.";"
          ."bdname=".self::$bdname, self::$bdUsername, self::$bdUserPassword);
        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
      }
      return self::$cont;
  }

  public static function
  {
      self::$cont = null;
  }

}



 ?>
