<?php
include 'view/header.php';
?>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Update Note</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $base_url . "?r=update-note&id=" . $noteData['id'] ?>" method="post">
                    <p>Title<input oninvalid="this.setCustomValidity('Enter title Here')"
                                   oninput="setCustomValidity('')"  class="form-control" type="text"
                                   name="title" value="<?php echo $noteData['title'] ?>" placeholder="Enter title" required=""></p>
                    <p>Description 
                        <textarea rows="12" class="form-control" name="description"
                                  placeholder="Enter your day here..."
                                  required=""><?php echo $noteData['description'] ?></textarea>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'view/footer.php';
?>