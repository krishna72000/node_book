<?php
include 'view/header.php';
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3><?php $noteData["title"] ?></h3>
        </div>
        <div class="panel-body">
            <p>
                <a class="btn btn-danger deleteButton" href="<?php echo $base_url . "?r=delete-note&id=" . $noteData['id'] ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                <a class="btn btn-primary" href="<?php echo $base_url . "?r=update-note&id=" . $noteData['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Update</a>
            </p>
            <hr>
            <p class="pull-right"><b>Date:</b> <?php echo date('F m, Y', $noteData["create_date"]); ?></p>
            <p><b>Title:</b> <?php echo $noteData["title"]; ?></p>
            <p><b>Description</b></p>
            <div style="padding: 15px 20px;background:#eeefff">
                <p><?php echo $noteData["description"]; ?></p>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.deleteButton', function (e) {
        var r = confirm("Are you sure you want to delete this item!");
        if (r == false) {
            return false;
        }
    });
</script>
<?php
include 'view/footer.php';
