<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "dicksout");
// Selecting Database
$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
    mysql_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
}
?>
<html>
<h1>
    KOREC
</h1>
<P>
    ROLL A DUBIE
</P>
<p>
    DO A KUSH UP
</p>
<H2>
    ANOTHER ONE
</H2>
<h1>
    KUSH IT UP A NOTCH
</h1>
</html>
