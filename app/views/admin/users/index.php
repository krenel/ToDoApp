<?php include '/../include/header.php'; ?>
<?php include '/../include/sidebar.php'; ?>
    <!-- start: Content -->
    <div id="content" class="span10">

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Striped Table</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <a href="index.php?c=users&m=create" class="glyphicons-icon user_add pull-right"></a>
                <table class="table table-striped">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-sort="ascending"
                            aria-label="Username: activate to sort column descending" style="width: 181px;">First name
                        </th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-sort="ascending"
                            aria-label="Username: activate to sort column descending" style="width: 181px;">Last name
                        </th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-sort="ascending"
                            aria-label="Username: activate to sort column descending" style="width: 181px;">Email
                        </th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-sort="ascending"
                            aria-label="Username: activate to sort column descending" style="width: 181px;">Admin status
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending"
                            style="width: 307px;">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td class="  sorting_1"><?php echo $user->getUserFirstName(); ?></td>
                            <td class="  sorting_1"><?php echo $user->getUserLastName(); ?></td>
                            <td class="  sorting_1"><?php echo $user->getUserEmail(); ?></td>
                            <td class="  sorting_1"><?php echo $user->getUserAdminStatus() == true ? 'YES' : 'NO' ?></td>
                            <td class="center ">
                                <a class="btn btn-success" href="index.php?c=users&m=change&id=<?php echo $user->getUserId(); ?>">
                                    <i class="halflings-icon white pencil"></i>
                                </a>
                                <a class="btn btn-info" href="index.php?c=users&m=update&id=<?php echo $user->getUserId(); ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="index.php?c=users&m=delete&id=<?php echo $user->getUserId(); ?>">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include '/../include/footer.php'; ?>