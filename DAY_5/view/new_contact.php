<?php
include 'view/layout/header.php';
?>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3>Create Contacts</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $base_url ?>?r=new-contact" method="post">
                    <p>Name<input oninvalid="this.setCustomValidity('Enter name Here')"
                                  oninput="setCustomValidity('')"  class="form-control" type="text"
                                  name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Enter title" required=""></p>
                    <p>Email<input oninvalid="this.setCustomValidity('Enter email Here')"
                                   oninput="setCustomValidity('')"  class="form-control" type="email"
                                   name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Enter title" required=""></p>
                    <p>Address<textarea rows="3" class="form-control" name="address" placeholder="Enter address..." required="">
                            <?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>
                        </textarea>
                    <div class="row phoneNumber">
                        <div class="col-lg-9">
                            Number<input class="form-control" type="text" name="number[]" placeholder="Enter number" required="">
                        </div>
                        <div class="col-lg-3">
                            <br>
                            <button type="button" class="btn bg-success addNumber"><span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn bg-danger removeNumber"><span class="glyphicon glyphicon-minus"></span></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".addNumber", function () {
        $(".phoneNumber:last").after($(".phoneNumber:first").clone());
    });
//    $(".addNumber").click(function () {
//        $(".phoneNumber:last").after($(".phoneNumber:first").clone());
//    });
    $(document).on("click", ".removeNumber", function () {
        $(this).parents(".phoneNumber").remove();
    });
</script>
<?php
include 'view/layout/footer.php';
?>