<?php
    include("../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic" rel="stylesheet" type="text/css">
        <meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/bootstrap.css" rel="stylesheet" media="screen"> <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <title><?php echo siteName; ?> &middot; Admin</title>
    </head>
    <body>
        <div style="max-width: 700px;" class="container">
            <div class="masthead">
                <ul class="nav nav-pills pull-right">
                    <li><a href="/admin/logout" title="Log out"><i class="icon-off"></i></a></li>
                    <li><a href="/"><i class="icon-home"></i></a></li>
                    <li><a href="/search"><i class="icon-search"></i></a></li>
                    <li class="active"><a href="/admin"><i class="icon-wrench"></i></a></li>
                </ul>
                <h3 class="muted"><?php echo siteName; ?></h3>
            </div>
            <hr />
        </div>
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li class="active">Admin</li>
            </ul>

            <div style="padding-left: 0px; padding-right: 0px;" class="well">
                <ul class="nav nav-list">
                    <li class="nav-header">Administrative</li>
                    <li><a href="/admin/panel/add"><i class="icon-pencil"></i> Add New Pictures</a></li>
                    <li><a href="/admin/panel/edit"><i class="icon-edit"></i> Edit Existing Albums</a></li>
                    <li class="nav-header">Other</li>
                    <li><a href="/admin/panel/other/password"><i class="icon-user"></i> Change Name or Password</a></li>
                    <li><a href="/admin/panel/other/rename"><i class="icon-star-empty"></i> Rename Gallery</a></li>
                    <li><a href="/admin/panel/other/home"><i class="icon-home"></i> Home Page</a></li>
                    <li><a href="/admin/panel/other/width"><i class="icon-resize-horizontal"></i> Image Width</a></li>
                </ul>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
