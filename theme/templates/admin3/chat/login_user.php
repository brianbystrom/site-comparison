<?

include('./include/include.inc');

session_start();
//die("TEST");
$user = addslashes($_POST['username']);
$password = md5(addslashes($_POST['password']));
login_user($conn,$user,$password);
