<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Note Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $base_url ?>resource/bootstrap/css/bootstrap.css">
        <script src="<?php echo $base_url ?>resource/js/jquery-3.2.1.js"></script>
        <script src="<?php echo $base_url ?>resource/bootstrap/js/bootstrap.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }
        </style>
    </head>
    <body class="theme-blue">
        <?php
        if (empty($_SESSION['login'])) {
            ?>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="<?= $base_url ?>"><img src="<?php echo $base_url ?>/resource/image/logo.png" height="30px" width="35px"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo $_SESSION['active_url'] == 'home' ? 'active' : '' ?>"><a href="<?= $base_url . '?r=home' ?>">Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php echo $_SESSION['active_url'] == 'login' ? 'active' : '' ?>"><a href="<?= $base_url ?>?r=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                            <li class="<?php echo $_SESSION['active_url'] == 'signup' ? 'active' : '' ?>"><a href="<?= $base_url ?>?r=signup">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
        } else {
            ?>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="<?= $base_url ?>"><img src="<?php echo $base_url ?>/resource/image/logo.png" height="30px" width="35px"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo $_SESSION['active_url'] == 'home' ? 'active' : '' ?>"><a href="<?= $base_url . '?r=home' ?>">Home</a></li>
                            <li  class="<?php echo $_SESSION['active_url'] == 'contact-list' ? 'active' : '' ?>" ><a href="<?= $base_url ?>?r=contact-list">Contacts</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><p  style="margin: 7px;padding: 5px;color: #fff"><?php echo $_SESSION['user_name'] ?></p></li>
                            <li><a style="margin: 7px;padding: 5px;" href="<?php echo $base_url ?>?r=logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
        }
        ?>
        <div class="container-fluid" style="margin: 20px;min-height: 500px;"> 
            <?php
            if (hasFlash('message')) {
                $falshError = getFlash('message');
                foreach ($falshError as $fe) {
                    ?>
                    <div class="alert alert-<?php echo $fe['type']; ?> fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?php
                        echo empty($fe['title']) ? '' : "<strong>" . $fe['title'] . "</strong> ";
                        echo $fe['body'];
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
            