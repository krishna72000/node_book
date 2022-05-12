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
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="<?php echo $base_url ?>"><img src="<?php echo $base_url ?>/resource/image/logo.png" height="30px" width="35px"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo $base_url ?>">Home</a></li>
                        <!--                        <li><a href="#">About</a></li>
                                                <li><a href="#">Gallery</a></li>
                                                <li><a href="#">Contact</a></li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo $base_url ?>?r=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                        <li><a href="<?php echo $base_url ?>?r=signup">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="margin: 20px auto;"> 
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
            