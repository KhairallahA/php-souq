<?php

// content db

$con = mysqli_connect('localhost','root','','ecommerce');

// post value

$a_name = @$_POST['a_name'];
$a_pass = @$_POST['a_pass'];

if(isset($_POST['login'])){
    if(empty($a_name) || empty($a_pass)){
        echo "<script> alert('يرجى ملئ البيانات') </script>";
    }
    else{

        // get admin name && admin pass

        $get_admin = "SELECT * FROM admin WHERE a_name = '$a_name' && a_pass = '$a_pass'";

        $run_admin = mysqli_query($con, $get_admin);

        // admin isset

        if(mysqli_num_rows($run_admin) == 1){

            $row_admin = mysqli_fetch_array($run_admin);

            // admin value isset

            $aname = $row_admin['a_name'];

            // cookie here

            setcookie("aname",$aname,time()+60*60*24);
            setcookie("adminlogin",1,time()+60*60*24);

            echo "<script> alert('Welcome agin'); </script>";

            header("location: ok.php");
        }
        else{

            echo "<script> alert('البيانات المدخلة غير صحيحة'); </script>";

        }
    }
}






?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div class="loginAll">
        <form action="login.php" method="POST">
            <input type="text" name="a_name" placeholder="Username">
            <br>
            <input type="password" name="a_pass" placeholder="Password">
            <br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

</body>
</html>