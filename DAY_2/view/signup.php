<?php
include 'view/layout/header.php';
?>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Sign Up</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $base_url ?>?r=signup" method="post">
                    <p>Name <input oninvalid="this.setCustomValidity('Enter User Name Here')"
                                   oninput="setCustomValidity('')"  class="form-control" 
                                   type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"
                                   placeholder="enter name"  ></p>
                    <p>Email <input class="form-control" type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" 
                                    placeholder="enter email" required=""></p>
                    <p>Password <input class="form-control" type="password" name="password" value="" placeholder="enter password" required=""></p>
                    <p>Address <input class="form-control" type="text" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" 
                                      placeholder="enter address" required=""></p>
                    <p>Phone <input class="form-control" type="text" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>"
                                    placeholder="enter phone" required=""></p>
                    <p>Gender <input type="radio" name="gender" value="Male">&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Sign up">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'view/layout/footer.php';
?>