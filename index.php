<?php 
    if($_GET["p"] < 1) { if($_GET["p"] != "") { header("Location: /"); exit; } } //dont allow viewing of pages too small
    $pages = file_get_contents("content/total.txt") / 20; if($_GET["p"] > $pages + 1) { $oneSmaller = $_GET["p"] - 1; header("Location: /?p=".$oneSmaller); exit; } //dont allow viewing of pages too big
?>
<!DOCTYPE html>
<?php include("variables.php"); ?>
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
                    <li class="active"><a href="/"><i class="icon-home"></i></a></li>
                    <li><a href="/search"><i class="icon-search"></i></a></li>
                    <li><a href="/admin"><i class="icon-wrench"></i></a></li>
                </ul>
                <h3 class="muted"><?php echo siteName; ?></h3>
            </div>
            <hr />
        </div>
        <div class="container">
            <ul class="thumbnails">
            <?php
                $page = $_GET["p"];
                if($page == "") { $page = 1; }
                $albumList = file("content/albums.txt", FILE_IGNORE_NEW_LINES);
                for($i=$page*20-20; $i<=$page*20; $i++) { //limits
                    if(file_exists("content/".$albumList[$i]."/cover.txt")) {
                        $imgs++;
                        $current = $albumList[$i];
                        $cover = file_get_contents("content/".$current."/cover.txt");
                        echo '  <li class="span'.imgWidth.'">
                                    <a href="/view?view='.$current.'" class="thumbnail" style="text-decoration:none;">
                                        <div style="background-image: url(\''."/content/".$current."/".$cover.'\'); background-position:center; background-repeat:no-repeat; background-size: cover; height:200px;">&nbsp;</div>
                                    </a>
                                    <div class="caption">
                                        <h1>'.substr($current, 0, -4).'</h1>
                                    </div>
                                </li>';
                    }
                }
            ?>
            </ul>

            <ul class="pager">
                <?php if ($page > 1) { ?>
                <li class="previous">
                    <a href="<?php  echo "/?p=";
                                    echo $page - 1; ?>">&larr; Older</a>
                </li>
                <?php } ?>
                <?php if($_GET["p"] <= $pages) { ?>
                <li class="next">
                    <a href="<?php  echo "/?p=";
                                    echo $page + 1; ?>">Newer &rarr;</a>
                </li>
                <?php } ?>
            </ul>

            <hr/>
            <div style="text-align: center;">
                <span class="muted">&copy; <?php
                    date_default_timezone_set('America/Los_Angeles'); //change time zone
                    $date = getdate();
                    echo $date["year"]; //year
                    echo " ".siteName;
                    ?>
                </span>
            </div>

        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
