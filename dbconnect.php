<?php
if (!class_exists('Database')){
class Database{
private static $dbname = 'prcbbmis';
	private static $dbHost = 'localhost';
	private static $username = 'root';
	private static $password = '';

	private static $cont = null;

	public static function connect(){

		if ( null == self::$cont )
		   {     
			try
			{
			  self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbname, self::$username, self::$password); 
			}
			catch(PDOException $e)
			{
			  die($e->getMessage()); 
			}
		   }
		   return self::$cont;
	}

	public static function disconnect(){
			self::$cont = null;
		}
	}
}
?>