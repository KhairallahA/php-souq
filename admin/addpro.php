<?php include("inc/header.php"); ?>

<?php

if(isset($_POST['addpro'])){
    // post value
    $p_title = $_POST['p_title'];
    $p_category = $_POST['p_category'];
    $p_img = $_FILES['p_img']['name'];
    $p_img_tmp = $_FILES['p_img']['tmp_name'];
    $p_price = $_POST['p_price'];
    $p_desc = $_POST['p_desc'];
    $p_key = $_POST['p_key'];

    if(empty($p_title) || empty($p_category) || empty($p_img) || empty($p_price) || empty($p_key)){
        echo "<script> alert('الرجاء ملى جميع الحقول'); </script>";
    }
    else{
        // move uplude img
        move_uploaded_file($p_img_tmp, "images/$p_img");

        // insert pro
        $insert_pro = "INSERT INTO produc (p_title,p_category,p_img,p_price,p_desc,p_key)
        VALUES('$p_title','$p_category','$p_img','$p_price','$p_desc','$p_key')";

        $run_pro = mysqli_query($db,$insert_pro);

        header("location: addpro.php");
    }
}

?>

<div class="adminBody">
    <form action="addpro.php" method="POST" enctype="multipart/form-data">

        <label>عنوان المنتج</label>
        <input type="text" name="p_title">

        <label>تصنيف المنتج</label>  <br/>
        <select name="p_category" style="margin-top: 5px;">
            <?php

                $get_c = "SELECT * FROM category";

                $run_c = mysqli_query($db,$get_c);
                
                while($row_c = mysqli_fetch_array($run_c)){
                    echo '<option value="'.$row_c['c_id'].'">'.$row_c['c_name'].'</option>';    
                }
            ?>
        </select> <br/>

        <label>صورة المنتج</label> <br/>
        <input type="file" name="p_img"> <br/>

        <label>سعر المنتج</label>
        <input type="text" name="p_price"> <br/>

        <label>وصف المنتج</label> <br/>
        <textarea name="p_desc"></textarea> <br/>

        <label>كلمات مفتاحية</label>
        <input type="text" name="p_key"><br/>

        <button type="submit" name="addpro">إضافة المنتج</button>
    </form>
</div>

<?php include("inc/footer.php"); ?>