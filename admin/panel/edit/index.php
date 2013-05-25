<!DOCTYPE html>
<?php include("../../../variables.php"); ?>
<html lang="en">
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic" rel="stylesheet" type="text/css">
        <meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/bootstrap.css" rel="stylesheet" media="screen"> <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <title><?php echo siteName; ?></title>
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
                <li class="active">Edit Existing Albums</li>
            </ul>

            <?php if($_GET["done"] == 1) { ?>
            <div id="password" class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Good!</strong> Your changes have been saved.
            </div>
            <?php } ?>

            <?php
                $albumList = file("../../../content/albums.txt", FILE_IGNORE_NEW_LINES);
                foreach($albumList as $current) {
                    //$current = $albumList[$i];
                    if(file_exists("../../../content/".$current."/cover.txt")) {
                        echo '
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    '.substr($current, 0, -4).'
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/panel/edit/css?view='.$current.'">album css</a></li>
                                    <li><a href="/admin/panel/edit/desc?view='.$current.'">description</a></li>
                                    <li><a href="/admin/panel/edit/feature?view='.$current.'">cover image</a></li>
                                    <li><a href="/admin/panel/edit/order?view='.$current.'">image order</a></li>
                                    <li><a href="/admin/panel/edit/delete?view='.$current.'">delete album</a></li>
                                </ul>
                            </div>&nbsp;<p/>
                            ';
                        
                        
                    }
                }
            ?>

            <hr/>
            <span class="muted">&copy; <?php 
                echo siteName;
                date_default_timezone_set('America/Los_Angeles'); //change time zone
                $date = getdate();
                echo " ".$date["year"]; //year
            ?></span>

        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
