<?
require_once dirname(__FILE__) . '/../example-runner/utils.php';

function documentHead($title, $keywords, $description, $socialImage = 'https://www.ag-grid.com/images/ag-Grid2-200.png', $socialUrl = 'https://www.ag-grid.com/') {
    $ogDescription = "Enterprise Javascript data grid that's feature rich, blazing fast and with a brilliant API. Supports Plain Javascript, React, AngularJS 1.x & 2 and Web Components.";
    $prefix = SITE_PREFIX;

    return <<<HEAD
    <meta charset="UTF-8">
    <title>$title</title>

    <meta name="description" content="$description">
    <meta name="keywords" content="$keywords"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="https://www.ag-grid.com/favicon.ico"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link href="$prefix/style.css" rel="stylesheet">

    <meta property="og:description" content="$description" />
    <meta property="og:image" content="$socialImage" />
    <meta property="og:site_name" content="www.ag-grid.com" />
    <meta property="og:title" content="$title" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="$socialUrl" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@ceolter" />
    <meta name="twitter:description" content="$description" />
    <meta name="twitter:image" content="$socialImage" />
    <meta name="twitter:site" content="@ceolter" />
    <meta name="twitter:title" content="$title" />
    <meta name="twitter:url" content="$socialUrl" />
HEAD;
}
?>
