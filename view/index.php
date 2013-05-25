<?php
    
    include("../variables.php");
    $viewing = $_GET["view"];
    if(!file_exists("../content/".$viewing."/description.txt")) { header("Location: /404"); exit; }
?><!DOCTYPE html>
<html lang="en">
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic" rel="stylesheet" type="text/css">
        <meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <style type="text/css">
            <?php echo file_get_contents("../content/".$viewing."/css.txt"); ?>
            
        </style>
        <title><?php echo siteName." &middot; ".substr($viewing, 0, -4); ?></title>
    </head>
    <body>
        <div style="max-width: 700px; padding-left: 0px;" class="container">
            <div class="masthead">
                <ul class="nav nav-pills pull-right">
                    <li><a href="/"><i class="icon-home"></i></a></li>
                    <li><a href="/search"><i class="icon-search"></i></a></li>
                    <li><a href="/admin"><i class="icon-wrench"></i></a></li>
                </ul>
                <h3 class="muted"><?php echo siteName; ?></h3>
            </div>
            <hr />
        </div>
        <div class="container">
            <div class="page-header">
                <h1><a href="/" style="text-decoration:none;">&lsaquo;</a> <?php echo substr($viewing, 0, -4); ?> <small>posted <?php  $date = file("../content/".$viewing."/published.txt", FILE_IGNORE_NEW_LINES); echo $date[0]." ".$date[1].", ".$date[2]; ?></small></h1>
            </div>
            <?php if(file_get_contents("../content/".$viewing."/description.txt") != "") { ?>
            <div class="well">
                <?php echo file_get_contents("../content/".$viewing."/description.txt"); ?>
            </div>
            <?php } ?>
            <p />
            <ul class="thumbnails">
                <?php
                    $albumList = file("../content/".$viewing."/indexed.txt", FILE_IGNORE_NEW_LINES);
                    for($i=0; $i<=20; $i++) {
                        $current = $albumList[$i];
                        $p = strrpos($current, '.'); //get position of last period
                        if ((file_exists("../content/".$viewing."/".$current)) && (!$current == "")) {
                            echo '  <li class="span'.imgWidth.'">
                                    <a href="#modal" class="thumbnail" data-toggle="modal" onclick="change(\''.$current.'\')" style="text-decoration:none;">
                                        <div style="background-image: url(\''."/content/".$viewing."/".$current.'\'); background-position:center; background-repeat:no-repeat; background-size: cover; height:200px;">&nbsp;</div>
                                    </a>
                                    <div class="caption" style="word-wrap: break-word;">
                                        <h3>'.substr($current, 0, $p).'</h3>
                                    </div>
                                </li>';
                        }
                    }
                ?>
            </ul>

            <hr />
            <div style="text-align: center;">
                <span class="muted">&copy; <?php
                    date_default_timezone_set('America/Los_Angeles'); //change time zone
                    $date = getdate();
                    echo $date["year"]; //year
                    echo " ".siteName;
                    ?> &middot; <a href="<?php echo file_get_contents("../content/".$viewing."/perma.txt"); ?>">permalink</a>
                </span>
            </div>

            <div style="height: 20%;">&nbsp;</div>
        </div>

                    <!--<div id="modal" class="modal hide fade">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 id="modalHeader">Not Ready!</h3>
                        </div>
                        <div class="modal-body">
                            <p><img id="modalImage" src="/blah.png" alt="Not Ready!" /></p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                        </div>
                    </div>-->
        <div id="greyed" style="position: fixed; top: 0px; left: 0px; width: 100%; min-height: 100%; background-color: Grey; opacity: 0.9; z-index: 50; display: none;">&nbsp;</div>
        <div id="preview" class="hidden-phone" style="position: fixed; left: 0px; right: 0px; text-align: center; top: 20px; display: none; z-index: 51;">
            <img id="modalImage" src="/content/no full stops1017/firefox_os_pose_sketch.jpg" />
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var lol = "f";
            function change(what) {
                document.getElementById("modalImage").src = "/content/<?php echo $viewing; ?>/" + what;
                $('#preview').fadeIn('slow');
                $('#greyed').fadeIn('slow');
                var t=setTimeout(function(){lolIsT()},500);
            }
            function lolIsT() {
                lol = "t";
            }
            $('body').click(function(){
                if(lol == "t") {
                    $('#preview').fadeOut('fast');
                    $('#greyed').fadeOut('fast');
                    lol = "f";
                }
            });
        </script>
    </body>
</html>
