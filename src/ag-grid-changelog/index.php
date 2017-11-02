<!DOCTYPE html>
<html>
<head lang="en">
<? 
require "../includes/siteBlocks.php"; 
echo documentHead('ag-Grid Changelog', 'ag-Grid javascript grid changelog release notes', 'ag-Grid - Changelog of Work.');
?>
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="cache-control" content="max-age=86400"/>

    <link rel="stylesheet" href="../dist/aui/css/aui.min.css" media="all">
    <link rel="stylesheet" href="../dist/aui/css/aui-experimental.min.css" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular-cookies.min.js"></script>
    <link rel="stylesheet" href="../documentation-main/documentation.css">
    <script src="../documentation-main/documentation.js"></script>
</head>

<body class="big-text" ng-app="documentation">

<?php
date_default_timezone_set('Europe/London');

$navKey = "changelog";
include '../includes/navbar.php'; ?>

<?php $headerTitle = "Changelog";
include '../includes/headerRow.php'; ?>

<div class="container info-page">
    <div class="row">
        <div class="col-md-12">
            <note>This page covers the full Changelog for all items for 8.x and above. For the Summary Changelog, or
                the legacy changelog covering versions 7.x and above before go <a href="../change-log/changeLogIndex.php">here</a>.
            </note>

            <?php
            function mapIssueType($issueType)
            {
                switch ($issueType) {
                    case "Task":
//                        return "Feature Request/Improvement";
                        return "Feature Request";
                        break;
                }
                return $issueType;
            }

            function mapReporter($reporter)
            {
                if ($reporter === "" || $reporter === "Internal") {
                    return "ag-Grid";
                }
                switch ($reporter) {
                    case "Client Request (email, telephone, etc)":
                        return "Enterprise Request";
                        break;
                }
                return $reporter;
            }

            function toDate($str_value)
            {
                $date = new DateTime($str_value, new DateTimeZone('GMT'));
                return $date->format('j M Y');
            }

            ?>
            <table class="aui">
                <tbody><?php $showFixVersion = true;
                $firstReport = true;
                $reportTitle = "";
                $csvFile = "changelog.json";
                include '../jira_report.php'; ?></tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>

</body>

<?php include_once("../includes/analytics.php"); ?>

</html>