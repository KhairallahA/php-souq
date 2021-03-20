<?php include("files/header.php"); ?>
<?php

$ip = getIp();

if(isset($_POST['singup'])){
    // post value
    $uaername = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cuontry = $_POST['cuontry'];

    if(empty($uaername) || empty($password) || empty($email) || empty($cuontry)){
        echo "<script> alert('Please Full SingUpop') </script>";
    }
    else{
        $insert_c = "INSERT INTO customers(username,password,email,cuontry,ip)
        VALUES('$uaername','$password','$email','$cuontry','$ip')";

        $run_c = mysqli_query($content, $insert_c);

        if(isset($run_c)){
            echo "<script> alert('Ok SingUP, Welcome!') </script>";
        }
    }
}

?>



<form action="" method="POST">
    <div class="panle" style="width: 500px; margin: 0px auto;">
        <div class="panle_title">SignUp Adoua</div>
        <div class="panle_body">
            <div class="lable">Username: </div>
            <input type="text" name="username">
            <br/>
            <div class="lable">Password: </div>
            <input type="password" name="password" style="border: 1px solid #eee; padding: 5px; font-family: tahoma; margin-right: 5px;">
            <br/>
            <div class="lable">Email: </div>
            <input type="email" name="email" style="border: 1px solid #eee; padding: 5px; font-family: tahoma; margin-right: 5px;">
            <br/>
            <div class="lable">Cuontry: </div>
            <input type="text" name="cuontry">
            
            <button type="submit" name="singup">SignUp</button>
        </div>
    </div>
</form>

<?php include("files/footer.php"); ?>