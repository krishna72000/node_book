<?php
include 'layout/header.php';
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h4>ERROR..!!!</h4>
    </div>
    <div class="panel-body text-danger">
        <h2><?php echo $error['title'] ?></h2>
        <p><?php echo $error['description'] ?></p>
    </div>
</div>
<?php
include 'layout/footer.php';
?>