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
                <li class="active">Change Name or Password</li>
            </ul>

            <?php if($_GET["e"] == 1) { ?>
            <div id="password" class="alert alert-error fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh, no!</strong> The password you entered into the "Verify Password" field was incorrect! Check it and try again. <a href="#" onclick="$('#password').alert('close')">Okay.</a>
            </div>
            <?php } ?>

            <div class="hero-unit" style="text-align: center; ">

                <h1><?php echo adminUser; ?></h1>
                <p>
                    YOUR NAME<br />
                    <span class="muted">[you should know this by now]</span><br />
                </p>
                <p>
                    Your password is <?php echo strlen(adminPass); ?> characters long.<br />
                    Edit the textboxes to have the data that you'd like, but you'll have to verify your password!
                </p>
                <form class="form-horizontal" action="/admin/panel/other/password/change.php" style="text-align: left;" method="post" autocomplete="off" >
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="inputUser">Name</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-user"></i></span>
                                    <input id="inputUser" name="inputUser" type="text" value="<?php echo adminUser; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPass">Password</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-lock"></i></span>
                                    <input id="inputPass" name="inputPass" type="password" value="<?php echo str_repeat("*", strlen(adminPass)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputVerPass">Verify Password</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-ok"></i></span>
                                    <input id="inputVerPass" name="inputVerPass" type="password" placeholder="To check who you are.">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn" type="submit">Change</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
