<?php
require "includes/common.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<?php
    function paymentConfirmation($usermail){
        $receiver = $usermail;
        $subject = "Your Order Is confirmed";
        $body = "your order is confirmed  and will be delivered to you in a week Thank You for shopping with bagify";
        $sender = "From:basitsolkar6@gmail.com";
        mail($receiver, $subject, $body, $sender);
 
        }
   
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bagify | Online bags shopping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'includes/header_menu.php';
?>
<div class="d-flex justify-content-center">
                <div class=" col-md-6  my-5 table-responsive p-5">
                    <table class="table table-striped table-bordered table-hover ">
                    <?php
$sum = 0;
$user_id = $_SESSION['user_id'];
$query = " SELECT products.price AS Price, products.id, products.name AS Name FROM users_products JOIN products ON users_products.item_id = products.id WHERE users_products.user_id='$user_id' and status='Added To Cart'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) >= 1) {
    ?>
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                                <?php
while ($row = mysqli_fetch_array($result)) {
        $sum += $row["Price"];
        $id = $row["id"] . ", ";
        echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>Rs " . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Remove</a></td></tr>";
    }
    $id = rtrim($id, ", ");
    echo "<tr><td></td><td>Total</td><td>Rs " . $sum . "</td><td><button  id='rzp-button1'   class = 'btn btn-primary'>Confirm Order</button></td></tr>";
    ?>
                            </tbody>
                            <?php
} else {
    echo "<div> <img src='images/emptycart.png' class='image-fluid' height='150' width='150'></div><br/>";
    echo "<div class='text-bold  h5'>Add items to the cart first!<div>";

}
?>


<!-- <style>
    .rzp-button1 {
        display: none;
    }
</style> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "rzp_test_6zv6r4xSCsV9YT", // Enter your Razorpay Key ID
        "amount": "<?php echo $sum * 100; ?>", // Convert the total amount to paise (multiplying by 100)
        "currency": "INR",
        "name": "Bagify",
        "image": "https://scontent.fpnq7-1.fna.fbcdn.net/v/t39.30808-6/305995763_411521837733232_7510347561464004323_n.png?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_ohc=KYD8Gp2lnHIAX_9eLux&_nc_ht=scontent.fpnq7-1.fna&oh=00_AfBy6ucquceY0FrISf-57lsBf5-GFku6fGgCrlvHvLkuxQ&oe=653E4C7C",
        "theme": {
            "color": "#3399cc"
        },
        "callback_url": "./success.php",
        

    };

    <?php paymentConfirmation($_SESSION['email'])?>
    var rzp1 = new Razorpay(options);
    

    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();

    } 

</script>



<!-- <script>
    $(document).ready(function () {
        $('.rzp-button1').click();
    });
</script> -->

                        <?php
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--footer -->
         <?php include 'includes/footer.php'?>
        <!--footer end-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

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
