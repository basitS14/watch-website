<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bagify | Online Bags Shopping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
include 'includes/display_products.php';
?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome to NovaChrono !</h1>
            <p>We have wide range of Watches for you.No need to hunt around,we have all in one place</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>
    <!--menu list-->
     
    <div class="row text-center" id="backpacks">
       <?php for ($i=1; $i <=16 ; $i++): ?>
       <?php
                    $result = display_products($i);
                    $row = $result->fetch_assoc();
                    $product_name = $row["name"];
                    $product_price = $row["price"];
                    $p_image = $row["src"];
                    ?>
        <div class="col-md-3 col-6 py-2">
                
                <div class="card">
    
                    <img src=<?php echo "$p_image"?> alt="" class="card-img-top img-fluid pb-1 " >
                    <div class="figure-caption">
                        <h6><?php echo"$product_name"?></h6>
                        <h6>Price : <?php echo"$product_price"?> /-</h6>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <?php if (!isset($_SESSION['email'])) {?>
                                <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add Item</a></p>
                                <?php
                                } else {
                                    if (check_if_added_to_cart($i)) {
                                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                                    } else {
                                    ?>
                                    <p><a href=<?php echo "cart-add.php?id=$i"?> name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                                    <?php
                                    }
                                }
                                ?>
            
                        </div>
                        <div class="col-6">
                            <p><a href=<?php echo"product_details.php?pid=$i"?> role="button" class="btn btn-warning text-white">Details</a></p>
                        </div>
    
                    </div>
    
    
                </div>
        
           
            </div>
       <?php endfor?>

      
      <!--menu list ends-->
      <!-- footer-->
<footer class="footer">
    <div class="container text-center"><span class="text-muted"><b>Copyright&copy;NovaChrono Ltd | All Rights Reserved | Contact Us: +91 8888 888888</b></span></div>
</footer>
    
      <!--footer ends-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>