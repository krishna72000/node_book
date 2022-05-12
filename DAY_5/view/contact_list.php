<?php
include 'view/layout/header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Contact List</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <a class="btn btn-success" href="<?php echo $base_url . '?r=new-contact'; ?>">Create Contact</a>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <form action="<?php echo $base_url ?>?r=contact-list" method="get">
                            <input type="hidden" name="r" value="contact-list">
                            <div class="input-group">
                                <input type="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" name="search" class="form-control searchInput" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <table class="table table-striped tableSearch">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Create Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($contactData)) {
                            ?>
                            <tr>
                                <td colspan="5"><p class="text-center">No contacts found.</p></td>
                            </tr>
                            <?php
                        } else {    // in case if there are no notes.
                            $sno = 0;
                            //fetching all contact data into array
                            foreach ($contactData as $cd) {
                                $sno++;
                                ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $cd['name']; ?></td>
                                    <td><?php echo $cd['email']; ?></td>
                                    <td><?php echo $cd['address']; ?></td>
                                    <td><?php echo implode(", ", $cd['number']); ?></td>
                                    <td><?php echo date("d F, Y", $cd['create_date']); ?></td>
                                    <td>
                                        <a href="<?php echo $base_url . "?r=view-contact&id=" . $cd['contact_id'] ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="<?php echo $base_url . "?r=update-contact&id=" . $cd['contact_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a class="deleteButton" href="<?php echo $base_url . "?r=delete-contact&id=" . $cd['contact_id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
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
    $(document).on('input', '.searchInput', function () {
        var filter = $(this).val().trim();
        $(".tableSearch").find('tbody tr').each(function (key, value) {
            if ($(this).text().toUpperCase().indexOf(filter.toUpperCase()) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
</script>
<?php
include 'view/layout/footer.php';
?>
