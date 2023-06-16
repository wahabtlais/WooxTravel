<?php require "includes/header.php" ?>
<?php require "config/config.php" ?>
<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    //redirect them to the index page
    header('location: http://localhost/wooxtravel/');
    exit;
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container" style="margin-top: 200px;">
        <a class="navbar-brand  text-white" href="#">Pay Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
    </div>
</nav>

<div class="container" style="margin-top: 200px;">
    <!-- Replace " test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '300' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {

                    window.location.href = 'index.php';
                });
            }
        }).render('#paypal-button-container');
    </script>

</div>


<?php require "includes/footer.php" ?>