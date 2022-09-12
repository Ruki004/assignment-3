
<!DOCTYPE html>
<html>
    <head>
        <title>Table with database
        </title>
        <style type="text/css">
            table{
        border-collapse: collapse;
        width: 100%;
        color:bisque;
        font-family: 'Segoe UI';
        font-size: 15px;
        text-align: center;
        }

        th{
            background-color: bisque;
            color: azure;


        }
        tr:nth-child(even) {background-color: blanchedalmond}


            </style>
            </head>
        <table>
            <tr>
                <th>Username</th>
                <th>UserPassword</th>
                <th>Password</th>
            </tr> 
        </table>
    <form action ="logoutprocess.php">
<div style="float:right"><button>logout</button></div>
<h1 style="font-size: 20px;"></h1>
</form>
</html>
<?php session_start();
include("databaseconn.php");
require("function.php");
if(isset($_SESSION['Username']));
{
 if(empty($_SESSION['Username'])):
        header('location:login.php');
    endif;
 
}

$usersData =getdatn('Username','pass','email');
print_r();// solve later... 
//$_SESSION['sucess']=""; 
/*$sql="SELECT * FROM loginactivity where (Username='admin')";
$result =mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
     $_SESSION['sucess']="Welcome";
    while($row=$result->fetch_assoc()){
      echo"<tr><td>".$row["Username"]."</td><td>".$row["UserPassword"]."</td><td>".$row["EmailAddress"]."</td></tr>";

    }
    echo "</table>";
}
else{
    echo "0 Result";
}
$con->close(); 
*/
function getdatn ($Username,$pass,$email) {
        $array = array();
        $con=mysqli_connect("localhost","root","1234","login_db");
        $array = array();
        $q = mysqli_query($con,"SELECT * FROM loginactivity WHERE Username='$Username' and UserPassword='$pass' and EmailAddress='$email' ");//expected 2 argument but found 1 solution error
        while($r =mysqli_fetch_assoc($q)){
            $array['Username'] = $r ['Username'];
            $array ['UserPassword']=$r ['UserPassword'];
            $array ['EmailAddress']=$r ['EmailAddress'];
            
    
    
    
    
        }
        return $array;
    
    }


?>
