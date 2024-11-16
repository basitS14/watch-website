<?php
    function display_products($product_id)  {
        require("common.php");
    
    // $user_id = $_SESSION['user_id']; 

    $query = "SELECT * FROM products WHERE id='$product_id' ";
    $result = mysqli_query($con ,$query );


    return $result;
    }

?>