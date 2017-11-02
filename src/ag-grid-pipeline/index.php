<!DOCTYPE html>
<html>
<head lang="en">
<? 
require "../includes/siteBlocks.php"; 
echo documentHead('ag-Grid Pipeline', 'ag-Grid javascript grid pipeline changelog release notes', 'ag-Grid - Pipeline / Changelog of Work.');
?>

    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="cache-control" content="max-age=86400" />

    <link rel="stylesheet" href="../dist/aui/css/aui.min.css" media="all">
    <link rel="stylesheet" href="../dist/aui/css/aui-experimental.min.css" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body class="big-text">

<?php
date_default_timezone_set('Europe/London');

$navKey = "pipeline";
include '../includes/navbar.php'; ?>

<?php $headerTitle = "Pipeline";
include '../includes/headerRow.php'; ?>

<div class="container info-page" >
    <div class="row">
        <div class="col-md-12">
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
                if($reporter === "") {
                    return "ag-Grid";
                }
                switch ($reporter) {
                    case "Client Request (email, telephone, etc)":
                        return "Enterprise Request";
                        break;
                }
                return $reporter;
            }

            function mapStatus($status) {
                if($status === 'Selected for Development') {
                    return 'Backlog';
                }
                return $status;
            }

            function toDate($str_value)
            {
                $date = new DateTime($str_value, new DateTimeZone('GMT'));
                return $date->format('j M Y');
            }

            ?>
                    <table class="aui">
                        <tbody>
                        <?php
                        $firstReport = true;
                        $reportTitle = "Completed - Will be Released Soon";
                        $csvFile = "next_version_done.json";
                        include './../jira_report.php';
                        ?>
                        <?php
                        $reportTitle = "Open - Targeted For A Future Release";
                        $csvFile = "next_version_notdone.json";
                        include '../jira_report.php';
                        ?>
                        <?php
                        $reportTitle = "Backlog";
                        $csvFile = "backlog.json";
                        include '../jira_report.php';
                        ?>
                        </tbody>
                    </table>
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>

</body>

<?php include_once("../includes/analytics.php"); ?>

</html>