<?php include("files/header.php"); ?>

<?php

$p_id = $_GET['id'];

if(isset($_GET['id'])){
    $get_pro_d = "SELECT * FROM produc WHERE p_id = '$p_id'";

    $run_pro_d = mysqli_query($content, $get_pro_d);

    $row_pro_d = mysqli_fetch_array($run_pro_d);
}

?>

<div class="panle r" style="width: 660px;">

    <div class="panle_title"><?php echo $row_pro_d['p_title']; ?></div>
    <div class="panle_body">
        <img src=<?php echo 'admin/images/'.$row_pro_d['p_img']; ?> width="640">
        <br/>
        <p><?php echo $row_pro_d['p_desc']; ?></p>
    </div>

</div>
<div class="panle r" style="width: 320px; margin-left: 10px;">
    <div class="panle_title">Product More</div>
    <div class="panle_body">
        <div id="p_info">Price : <?php echo $row_pro_d['p_price']; ?></div>
        <div id="p_info">Category : 
            <?php
                $cat = $row_pro_d['p_category'];

                $get_cat = "SELECT * FROM category WHERE c_id = '$cat'";

                $run_cat = mysqli_query($content, $get_cat);

                $row_cat = mysqli_fetch_array($run_cat);

                echo $row_cat['c_name'];
            ?>
        </div>
        <div id="p_info">Key Word : <?php echo $row_pro_d['p_key']; ?></div>
    </div>
</div>
<div class="c"></div>

<?php include("files/footer.php"); ?>