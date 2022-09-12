<?php 
include("databaseconn.php");
if(empty($_SESSION['Username'])):
    header('location:home.php');

$query ="SELECT Username,UserPassword,EmailAddress from loginactivity values ('$user','$pass','$email')";

endif;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            User Profile
        </title>


    </head>
</html>
<tr>
    <th>Username</th>
    <th>Password</th>
    <th>Email address registered</th>

</tr>
