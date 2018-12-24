<?php
error_reporting(1);
$servername="localhost";
$user = "property";
$password = "qwe123QWE!@#N";
$db="property";

$connection= new mysqli($servername,$user,$password,$db);

if($connection->connect_error)
{
	die("Connection Failed");
}
