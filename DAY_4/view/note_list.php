<?php
include 'view/header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Note List</h3>
            </div>
            <div class="panel-body">
                <a class="btn btn-success" href="<?php echo $base_url . '?r=new-note'; ?>">Create Note</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($noteData) {
                            $sno = 0;
                            //fetching all note data into table
                            while ($nd = $noteData->fetch_assoc()) {
                                $sno++;
                                ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $nd['title']; ?></td>
                                    <td><?php echo $nd['description']; ?></td>
                                    <td><?php echo date("d F, Y", $nd['create_date']); ?></td>
                                    <td>
                                        <a href="<?php echo $base_url . "?r=view-note&id=" . $nd['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="<?php echo $base_url . "?r=update-note&id=" . $nd['id'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a class="deleteButton" href="<?php echo $base_url . "?r=delete-note&id=" . $nd['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {    // in case if there are no notes.
                            ?>
                            <tr>
                                <td colspan="5"><p class="text-center">No notes found.</p></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.deleteButton', function () {
        var r = confirm("Are you sure you want to delete this item!");
        //if pressed ok button r will have true value else false;
        //when return false anchor won't call delete controller;
        return r;
    });
</script>
<?php
include 'view/footer.php';
?>
