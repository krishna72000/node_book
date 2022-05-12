<?php
include 'view/header.php';
?>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3>Create Note</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $base_url ?>?r=new-note" method="post">
                    <p>Title<input oninvalid="this.setCustomValidity('Enter title Here')"
                                   oninput="setCustomValidity('')"  class="form-control" type="text"
                                   name="title" value="" placeholder="Enter title" required=""></p>
                    <p>Description <textarea rows="12" class="form-control" name="description"
                                             value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?>"
                                             placeholder="Enter your day here..." required=""></textarea>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'view/footer.php';
?>