<!DOCTYPE html>
<html>

<head lang="en">
    <? 
    require "../includes/siteBlocks.php"; 
    echo documentHead('ag-Grid Online Payments', 'ag-Grid payment', 'Payment portal for ag-Grid', array( 'angularjs' ));
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="./payments.js"></script>
</head>

<body class="big-text">

<?php
    $navKey = "";
    include '../includes/navbar.php';

    $headerTitle = "Online Payments";
    include '../includes/headerRow.php';

    include './setupSecrets.php';

    global $stripe_publishable_key;
?>

<script>
    var stripe_publishable_key = '<?=$stripe_publishable_key?>';
</script>

<div class="container info-page" ng-app="paymentsApp">

    <div class="row">
        <div class="col-md-12">

            <h2>
                Payments via Stripe.com
            </h2>

            <div style="float: right;">
                <img src="../images/poweredByStripe.png"/>
            </div>

            <p>
                ag-Grid uses Stripe.com for online payments. Your transaction is safe.
            </p>

        </div>
    </div>

    <div style="padding: 20px">
    </div>

    <make-payment></make-payment>

</div>


<?php include("../includes/footer.php"); ?>

</body>

<?php include_once("../includes/analytics.php"); ?>

</html>