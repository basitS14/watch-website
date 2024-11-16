<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<button id="rzp-button1">Pay</button>
<style>
    .rzp-button1 {display : none;}
</style>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_6zv6r4xSCsV9YT", // Enter the Key ID generated from the Dashboard
    "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "",
    "image": "https://plus.unsplash.com/premium_photo-1664358190450-2d84d93b9546?auto=format&fit=crop&q=80&w=1770&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
  
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
<script>
    $(document).ready(function() {
        $('.rzp-button1').click();
    })
</script>