<!DOCTYPE html>
<html>
<head lang="en">
<? 
require dirname(__FILE__) . "/siteBlocks.php"; 
echo documentHead($pageTitle, $pageKeyboards, $pageDescription, $socialImage, $socialUrl);
?>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular-cookies.min.js"></script>
    <script src="../documentation-main/documentation.js"></script>
    <script src="../dist/site.js"></script>
</head>

<body  class="big-text" ng-app="documentation">
<!--<body ng-app="index" class="big-text">-->

<?php
    // if the user has not set a root folder, set it to the default
    if (!isset($rootFolder)) {
        $rootFolder = '..';
    }

    $navKey = "blog"; include 'navbar.php';

    $headerTitle = "ag-Grid Blog"; include 'headerRow.php';
?>

<div class="container">