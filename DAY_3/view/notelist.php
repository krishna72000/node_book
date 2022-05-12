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
                <a class="btn btn-success" href="<?php echo $base_url . '?r=create-note'; ?>">Create Note</a>
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
                        <tr>
                            <td>xyz</td>
                            <td>xyz</td>
                            <td>xyz</td>
                            <td>xyz</td>
                            <td>xyz</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'view/footer.php';
?>
