<!DOCTYPE html>
<?php include("../../../../variables.php"); ?>
<html lang="en">
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic" rel="stylesheet" type="text/css">
        <meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/bootstrap.css" rel="stylesheet" media="screen"> <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <title><?php echo siteName; ?></title>
    </head>
    <body>
        <div class="hidden-phone hidden-tablet" style="position: fixed; left: 0px; top: 0px; width: 15%; height: 100%; z-index: -1; background-image: url('<?php if(fadeHome != "nope") { echo "/assets/img/fade.png"; } ?>'), url('<?php echo file_get_contents("background.txt"); ?>'); background-position-x: right, left;">&nbsp;</div>
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
                <li><a href="/admin/panel/edit">Edit Existing Albums</a> <span class="divider">/</span></li>
                <li><a href="/admin/panel/edit">Image Order</a> <span class="divider">/</span></li>
                <li class="active"><?php echo substr($_GET["view"], 0, -4); ?></li>
            </ul>

            <form class="form-inline" action="edit.php" method="get">
                <textarea style="width: 100%; height: 300px;" id="cssNew" name="cssNew"><?php echo file_get_contents("../../../../content/".$_GET["view"]."/indexed.txt"); ?></textarea>
                <div class="input-prepend">
                    <span class="add-on">Album</span>
                    <input type="text" id="albumName" name="albumName" value="<?php echo $_GET["view"]; ?>">
                </div>
                <input type="submit" class="pull-right btn btn-primary">
            </form>
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
