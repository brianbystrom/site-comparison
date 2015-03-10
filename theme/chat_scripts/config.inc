<?php
// Database Connection Shite goes here
//Connect To Database
/*$hostnamedb='localhost';
$usernamedb='jantrock_work';
$passworddb='megabates2';
$dbname='jantrock_work';
mysql_connect($hostnamedb,$usernamedb,$passworddb) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname) or die(mysql_error());
*/

//$host = 'localhost';
//$dbname = 'work';
$user = 'brian';
$pass = 'megabates2';

try {
    $conn = new PDO('mysql:host=localhost;dbname=sykes_wah_att_chat', $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}