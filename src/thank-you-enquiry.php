<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

<? 
require "includes/siteBlocks.php"; 
echo documentHead('Thanks!', 'ag-Grid Javascript Grid Enquiry', 'Thank you page for new enquiry');
?>

</head>

<body ng-app="index" class="big-text">

<?php $navKey = "thankYouEnquiry";
include 'includes/navbar.php'; ?>

<?php $headerTitle = "Enquiry Received...";
include 'includes/headerRow.php'; ?>

<div class="container info-page">

    <div class="row">
        <div class="col-md-12">

            <h1>
                Thank you for your enquiry.
            </h1>

            <p>
                We appreciate you getting in touch. We have received your enquiry and we will be back in touch shortly. 
            </p>
            <p>
                In the meantime, why not take a look at some of the other parts of our website that might be of interest:
            <ul>
                <li>
                    You can play around with a full working demo of ag-Grid on our <a href="/example.php" >Demo Page</a>.
                </li>
                <li>
                    Browse through our extensive <a href="/documentation-main/documentation.php" >Documentation</a> which describes all of features in details.
                </li>
                <li>
                    You can read about the <a href="/about.php" >Company</a> or check out some of our <a href="/media/media.php">Blog Posts.</a>
                </li>
                <li>
                    See some of the <a href="/testimonials.php" >Testimonials</a> from our existing customers.
                </li>
            </ul>
            </p>
        </div>
    </div>

</div>


<?php include("includes/footer.php"); ?>

</body>

<?php include_once("includes/analytics.php"); ?>

</html>