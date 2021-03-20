<?php
include("db.php");

// get ip

function getIp(){
    $ip = $_SERVER['REMOTE_ADDR'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
    return $ip;
}


// cart function

function cart(){
    global $content;

    if(isset($_GET['add_cart'])){
        $ip = getIp();

        $pro_id = (int)$_GET['add_cart'];

        $get_cart = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$pro_id'";

        $run_cart = mysqli_query($content, $get_cart);

        if(mysqli_num_rows($run_cart) > 0){

            echo '';

        }
        else{

            $insert_cart = "INSERT INTO cart(p_id,ip_add) VALUES('$pro_id','$ip')";

            $run_i_cart = mysqli_query($content,$insert_cart);

            if(isset($run_i_cart)){
                
                echo '<meta http-equiv="refresh" content="2; url=\'index.php\'">';

            }

        }
    }
}


/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

// total item

function total_item(){
    if(isset($_GET['add_cart'])){
        global $content;

        $ip = getIp();

        $get_total = "SELECT * FROM cart WHERE ip_add = '$ip'";

        $run_total = mysqli_query($content, $get_total);

        $total_item = mysqli_num_rows($run_total);
    }
    else{
        global $content;

        $ip = getIp();

        $get_total = "SELECT * FROM cart WHERE ip_add = '$ip'";

        $run_total = mysqli_query($content, $get_total);

        $total_item = mysqli_num_rows($run_total);
    }

    echo $total_item;
}


// total price

function total_price(){
    global $content;

    $ip = getIp();

    $total = 0;

    $t_price = "SELECT * FROM cart WHERE ip_add = '$ip'";

    $run_price = mysqli_query($content, $t_price);

    while($row_t_price = mysqli_fetch_array($run_price)){
        $pro_id = $row_t_price['p_id'];

        $price_pro = "SELECT * FROM produc WHERE p_id = '$pro_id'";

        $run_price_pro = mysqli_query($content, $price_pro);

        while($row_price_pro = mysqli_fetch_array($run_price_pro)){
            $pro_price = array($row_price_pro['p_price']);

            $values = array_sum($pro_price);

            $total += $values;
        }
    }

    echo $total;

}




/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////


// get category

function get_cat(){

    global $content;

    $get_cat = "SELECT * FROM category";

    $run_cat = mysqli_query($content, $get_cat);

    while($row_cat = mysqli_fetch_array($run_cat)){
        echo '<li><a href="index.php?cat='.$row_cat['c_id'].'">'.$row_cat['c_name'].'</a></li>';
    }
}


/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////


// get pro

function get_pro(){
    global $content;

    if(!isset($_GET['cat'])){

        $get_pro = "SELECT * FROM produc";

        $run_pro = mysqli_query($content, $get_pro);

        while($row_pro = mysqli_fetch_array($run_pro)){
            echo '
                <li>
                    <div class="product">
                        <div id="pro_img">
                            <a href="#"><img src="admin/images/'.$row_pro['p_img'].'" width="320px" height="150px"></a>
                        </div>
                        <div id="pro_title">
                            <a href="ditels.php?id='.$row_pro['p_id'].'">'.$row_pro['p_title'].'</a>
                        </div>
                        <div id="pro_bay">
                            <a href="index.php?add_cart='.$row_pro['p_id'].'"><button>Buy Now</button></a>
                        </div>
                    </div>
                </li>
            ';
        }
    }

}




/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////


// get product by category

function get_pro_cat(){
    global $content;

    if(isset($_GET['cat'])){
        $cat = $_GET['cat'];

        $get_pro_cat = "SELECT * FROM produc WHERE p_category = '$cat'";

        $run_pro_cat = mysqli_query($content, $get_pro_cat);

        if(mysqli_num_rows($run_pro_cat) > 0){

            while($row_pro_cat = mysqli_fetch_array($run_pro_cat)){
                echo '
                    <li>
                        <div class="product">
                            <div id="pro_img">
                                <a href="#"><img src="admin/images/'.$row_pro_cat['p_img'].'" width="320px" height="150px"></a>
                            </div>
                            <div id="pro_title">
                                <a href="#">'.$row_pro_cat['p_title'].'</a>
                            </div>
                            <div id="pro_bay">
                                <a href="#"><button>Buy Now</button></a>
                            </div>
                        </div>
                    </li>
                ';
            }

        }
        else{
            echo '<div style="background-color: red; border: 1px solid #fc5d33; padding: 10px; font-family: tahoma; font-size: 13px; color: white; text-align: center;">عذا لايوجد منتجات لعرضها</div>';
        }
    }
}





/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////




// get product by search

function get_pro_search(){
    global $content;

    if(isset($_GET['search'])){
        $searchArea = $_GET['searchArea'];

        $get_pro_search = "SELECT * FROM produc WHERE p_key LIKE '$searchArea'";

        $run_pro_search = mysqli_query($content, $get_pro_search);

        if(mysqli_num_rows($run_pro_search) > 0){

            while($row_pro_search = mysqli_fetch_array($run_pro_search)){
                echo '
                    <li>
                        <div class="product">
                            <div id="pro_img">
                                <a href="#"><img src="admin/images/'.$row_pro_search['p_img'].'" width="320px" height="150px"></a>
                            </div>
                            <div id="pro_title">
                                <a href="#">'.$row_pro_search['p_title'].'</a>
                            </div>
                            <div id="pro_bay">
                                <a href="#"><button>Buy Now</button></a>
                            </div>
                        </div>
                    </li>
                ';
            }
        }
        else{
            echo '<div style="background-color: red; border: 1px solid #fc5d33; padding: 10px; font-family: tahoma; font-size: 13px; color: white; text-align: center;">عذا لايوجد منتجات لعرضها</div>';
        }
    }
}



?>