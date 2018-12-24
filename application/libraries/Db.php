<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Db
{
	function __construct($config = array())
	{

	}

	public function load()
    {
      $servername="localhost";
      $user = "root";
      $password = "";
      $inter_city="property";

      $connection= new mysqli($servername,$user,$password,$inter_city);

      if($connection->connect_error)
      {
        die("Connection Failed");
      }else{
        return $connection
      }
    }
}
