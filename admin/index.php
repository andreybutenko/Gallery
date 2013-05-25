<?php
    include("../variables.php");
    if($_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin/panel");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic" rel="stylesheet" type="text/css">
        <meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/bootstrap.css" rel="stylesheet" media="screen"> <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <title><?php echo siteName; ?> &middot; Login</title>
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
            <?php if($_GET["e"] == 1) { ?>
            <div id="password" class="alert alert-error fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh, my!</strong> Your password's wrong - check it and try again.
            </div>
            <?php } ?>
            <?php if($_GET["e"] == 3) { ?>
            <div id="password" class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Triumph!</strong> Your password has been changed! You'll have to log in again.
            </div>
            <?php } ?>

            <h4>Restricted area!</h4>
            <form class="form-horizontal" action="/admin/login.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="inputUser">Name</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input id="inputUser" name="inputUser" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPass">Password</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-lock"></i></span>
                                <input id="inputPass" name="inputPass" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button class="btn" type="submit">Log in</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
