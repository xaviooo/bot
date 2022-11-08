<?php ob_start();
session_start();
//  session_destroy();

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "godpro";
$db['db_name'] = "profiles";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

// if($connection) {
// echo "Database connected";
// }


require_once("functions.php");

?>

