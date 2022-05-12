<?php
include 'view/header.php';
?>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Login</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $base_url ?>?r=login" method="post">
                    <p>E mail <input class="form-control" type="email" name="email" value="" placeholder="enter email" required=""></p>
                    <p>Password <input class="form-control" type="password" name="password" value="" placeholder="enter password" required=""></p>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'view/footer.php';
?>