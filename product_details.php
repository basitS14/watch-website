<?php 
  require("includes/common.php");
  session_start();
  $product_id = $_GET['pid'];
  $sql = "SELECT * FROM product_details WHERE pid = $product_id";
  $result = mysqli_query($con, $sql);
  $product = mysqli_fetch_assoc($result);

  // $sql2 = "SELECT * FROM products WHERE id = $product_id";
  // $result2 = mysqli_query($con, $sql2);
  // $product_details = mysqli_fetch_assoc($result2);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product | Details</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Delius Swash Caps"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Andika"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
    <!-- header  -->
    <?php
    include 'includes/header_menu.php';
    include 'includes/check-if-added.php';
    ?>
    <div class="details-container">
      <div class="row">
        <!-- images  -->
        <div class="col-6">
          <img src="<?php echo $product['pimage'];?>" alt="bp1" class="front-image"/>
          <div class="row">
            <div class="col-4">
              <img
                src="<?php echo $product['imagev1'];?>"
                class="img-thumbnail"
                alt=""
              />
            </div>
            <div class="col-4">
              <img
                src="<?php echo $product['imagev2'];?>"
                class="img-thumbnail"
                alt=""
              />
            </div>
            <div class="col-4">
              <img
                src="<?php echo $product['imagev3'];?>"
                class="img-thumbnail"
                alt=""
              />
            </div>
          </div>
        </div>
        <!-- details  -->
        <div class="col-6">
          <h1>
          <?php echo $product['ptitle'];?>
          </h1>
          <p class="blockquote">Price : Rs.<?php echo $product['pprice'];?></p>
          <?php if (!isset($_SESSION['email'])) {?>
            <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
            <?php
            } else {
            if (check_if_added_to_cart($product_id)) {
             echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
            } else {
                ?>
                  <p><a href="cart-add.php?id=<?php echo $product_id?>" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a><p>
                <?php
                }
            }
            ?>
            <div class="description">
                <h6>Description:</h6>
                <p><?php echo $product['description'];?></p>
            </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>
