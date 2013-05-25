<?php
    include("../../../../variables.php");
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
                <li><a href="/admin">Admin</a> <span class="divider">/</span></li>
                <li><a href="/admin">Other</a> <span class="divider">/</span></li>
                <li class="active">Rename Gallery</li>
            </ul>

            <?php if($_GET["done"] == 1) { ?>
            <div id="password" class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Excellent!</strong> Your site has been renamed as <?php echo siteName; ?>
            </div>
            <?php } ?>

            <div class="hero-unit" style="text-align: center;">
                <h1><?php echo siteName; ?></h1>
                <p>CURRENT SITE NAME</p>
                <form class="form-inline" action="rename.php" method="get">
                    <input type="text" id="newName" name="newName" placeholder="New Site Name">
                    <button type="submit" class="btn">Change</button>
                </form>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
