<?php
function getdata($Username,$pass,$email){
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