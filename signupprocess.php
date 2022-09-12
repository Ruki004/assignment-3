<?php session_start();
include('databaseconn.php');
if(isset($_POST['signup']));
{
    /*$user_unsafe=$_REQUEST['Username'];
    $pass_unsafe=$_REQUEST['UserPassword'];
    $email_unsafe=$_REQUEST['email'];//unsafe

    $user=mysqli_real_escape_string($con,$user_unsafe);
    $pass=mysqli_real_escape_string($con,$pass_unsafe);
    $email=mysqli_real_escape_string($con,$email_unsafe);

    $query=mysqli_query($con,"insert into loginactivity values (Username='$user',
     UserPassword='$pass' and email='$email' ")or die(mysqli_error($con));//Fatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax;
    //check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 in C:\CODING\php\test2.php\signupprocess
     */ // this method is unusable to ask for request

    
$user =$_REQUEST['Username'];
$pass =$_REQUEST['UserPassword'];
$email =$_REQUEST['email'];

$query = "INSERT INTO loginactivity VALUES('$user','$pass','$email')";
//VALUES ('fname', 'lname', 'gender');";
mysqli_query($con, $query); 

/*$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enables exception mode

try {
    $pdo->query("INSERT INTO loginactivity
                               VALUES ('$user','$pass','$email')");
} catch (PDOException $e) {
    if ($e->getCode() == $email) {
        // Duplicate user
    } else {
        throw $e;// in case it's any other error
    }
} */ //pdo example
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($servername,$username,$password,$dbname);
$mysqli->set_charset("utf8");
try {
    $mysqli->query("INSERT INTO  loginactivity
                               VALUES ('$user','$pass','$email')");
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "<script> type='text/javascript'>alert('You have succesfully registered!');
document.location ='login.php'</script>"; 
        // Duplicate user
    } else {
        throw $e;// in case it's any other error
    }
}

/*$result=$query;
if($result==true){
    echo "<script type ='text/javascript'>document.location='home.php'</script>";
}
else{

    echo "<script type ='text/javascript'>document.location='signup.php'</script>";
}


*/
}
?>