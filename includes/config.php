<?php
ob_start();
session_start();


define('DBHOST','localhost');
define('DBUSER','u2229625_naufal');
define('DBPASS','naufal1234');
define('DBNAME','u2229625_nitipbro_dev');

define('DIR','http://nitipbro.com/');
define('SITEEMAIL','naufal@nitipbro.com');


// define('DBHOST','localhost');
// define('DBUSER','root');
// define('DBPASS','');
// define('DBNAME','nitipbro_dev');


try{
	
	//create PDO con
	$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stat = "sukses";
}
catch(PDOException $e){
	//error
	echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    //echo 'error';
	exit;
}

$upOne = realpath(__DIR__ . '/..');



//include the user class, pass in the database connection
//include('classes/user.php');
//include("{$_SERVER['DOCUMENT_ROOT']}/classes/user.php");
include("$upOne/classes/user.php");
$user = new User($db); 

?>
