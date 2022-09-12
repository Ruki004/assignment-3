<?php session_start();
include("databaseconn.php");
if(isset($_POST['login']));
{
    $user_unsafe=$_POST['Username'];
    $pass_unsafe=$_POST['UserPassword'];
   

    $user=mysqli_real_escape_string($con,$user_unsafe);
    $pass=mysqli_real_escape_string($con,$pass_unsafe);

    $query=mysqli_query($con,"select * from loginactivity where Username='$user'and
     UserPassword='$pass'")or die(mysqli_error($con));

    $row=mysqli_fetch_array($query);

    $name=$row['Username']; 
    $counter=mysqli_num_rows($query); 
    $pass=$row['UserPassword']; 
    $counter=mysqli_num_rows($query);
  

    if($counter==0){
        echo "<script> type='text/javascript'>alert('invalid username or password');
document.location ='login.php'</script>"; 
}else
    $_SESSION['Username']=$name;
    $_SESSION['UserPassword']=$pass;
    echo "<script type ='text/javascript'>document.location='home.php'</script>";
     
}


?>