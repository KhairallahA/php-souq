<?php include("files/header.php"); ?>
<?php
    session_start();
?>

<form action="" method="POST">
<table style="background: #fff; border: 1px solid #eee;" border="0" width="100%">
    <tr >
        <th>Delete:</th>
        <th>Product:</th>
        <th>Number:</th>
        <th>Price:</th>
    </tr>
    <?php
        global $content;

        $ip = getIp();

        $total = 0;

        $t_price = "SELECT * FROM cart WHERE ip_add = '$ip'";

        $run_price = mysqli_query($content, $t_price);

        while($row_t_price = mysqli_fetch_array($run_price)){

            $pro_id_t = $row_t_price['p_id'];

            $price_pro = "SELECT * FROM produc WHERE p_id = '$pro_id_t'";

            $run_price_pro = mysqli_query($content, $price_pro);

            while($row_price_pro = mysqli_fetch_array($run_price_pro)){

                $pro_price = array($row_price_pro['p_price']);
                $values = array_sum($pro_price);
                $total += $values;

                $pro_title = $row_price_pro['p_title'];

                $pro_img = $row_price_pro['p_img'];

                $pro_price_single = $row_price_pro['p_price'];
                
            
    ?>

    <tr align="center">
        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id_t; ?>"></td>
        <td><div><?php echo $pro_title; ?></div><img width="70" src="admin/images/<?php echo $pro_img; ?>"></td>
        <td><input type="text" name="qty" size="5" value="<?php echo $_SESSION['qty']; ?>"></td>
        <?php

            if(isset($_POST['update_cart'])){

                $qty = $_POST['qty'];

                $update_qty = "UPDATE cart SET qty='$qty'";

                $run_u_qty = mysqli_query($content, $update_qty);

                $_SESSION['qty'] = $qty;

                @$total = $total * $qty;
            }

        ?>
        <td><?php echo $pro_price_single; ?></td>
    </tr>

    <?php } } ?>
    
    <tr>
        <th>All Price: <?php echo $total; ?></th>
    </tr>

    <tr align="right">
        <td><button type="submit" name="update_cart">Update Cart</button></td>
        <td><button type="submit" name="contenue"><a href="index.php">Contenue Buy</a></button></td>
        <td><button><a href="checkout.php">Exit Buy</a></button></td>
    </tr>

    <?php

        function update_cart(){
            global $content;

            $ip = getIp();

            if(isset($_POST['update_cart'])){

                foreach($_POST['remove'] as $id_reomove){
                    $delete_pro = "DELETE FROM cart WHERE p_id = '$id_reomove' AND ip_add = '$ip'";

                    $run_delete = mysqli_query($content, $delete_pro);

                    if($run_delete){
                        header("location: cart.php");
                    }
                }

                /*
                // Name != remove[]
                $remove = $_POST['remove'];
                $delete_pro = "DELETE FROM cart WHERE p_id = '$remove' AND ip_add = '$ip'";
                $run_delete = mysqli_query($content, $delete_pro);
                if($run_delete){
                    header("location: cart.php");
                } 
                */

            }
        }
        echo @$up_c = update_cart();
    ?>

</table>
</form>

<?php include("files/footer.php"); ?>