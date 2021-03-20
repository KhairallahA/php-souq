<?php include("inc/header.php"); ?>
<?php

    

    // insert category
    if(isset($_POST['addcat'])){
        // post value
        $c_name = $_POST['c_name'];

        $insert_cat = "INSERT INTO category(c_name) VALUE('$c_name')";

        $run_cat = mysqli_query($db, $insert_cat);

        if(isset($run_cat)){
            header("location: addcat.php");
        }
    }

?>



<div class="adminBody">
    <form action="addcat.php" method="POST">
        <label>إسم التصنيف</label>
        <input type="text" name="c_name">
        <button type="submit" name="addcat">إضافة التصنيف</button>
    </form>
</div>

<?php include("inc/footer.php"); ?>