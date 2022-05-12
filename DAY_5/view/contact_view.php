<?php
include 'view/layout/header.php';
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3><?php $contactData["name"] ?></h3>
        </div>
        <div class="panel-body">
            <p>
                <a class="btn btn-danger deleteButton" href="<?php echo $base_url . "?r=delete-contact&id=" . $contactData['contact_id'] ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                <a class="btn btn-primary" href="<?php echo $base_url . "?r=update-contact&id=" . $contactData['contact_id'] ?>"><span class="glyphicon glyphicon-edit"></span> Update</a>
            </p>
            <hr>
            <p class="pull-right"><b>Date:</b> <?php echo date('d F, Y H:i', $contactData["create_date"]); ?></p>
            <p><b>Name: </b> <?php echo $contactData["name"]; ?></p>
            <p><b>Email: </b> <?php echo $contactData["email"]; ?></p>
            <p><b>Phone: </b><?php echo implode(", ", $contactData["number"]); ?></p>
            <p><b>Address: </b><?php echo $contactData["address"]; ?></p>
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
include 'view/layout/footer.php';
