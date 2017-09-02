<?php include '/../include/header.php'; ?>
<?php include '/../include/menu.php'; ?>
<h1>Lists</h1>

<div class="row">
    <div class="form-group col-xs-3"></div>
    <div class="form-group col-xs-3">
        <h2>Add new List</h2>
    </div>
    <div class="form-group col-xs-3">
        <a href="index.php?c=lists&m=create" type="submit" class="btn btn-default">Add</a>
    </div>
    <div class="form-group col-xs-3"></div>

</div>
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <table>
            <?php if (!empty($lists)) { ?>
            <?php foreach($lists as $list) {?>
            <tr>
                <td>
                    <h2><?php echo $list->getListTitle(); ?></h2>
                </td>
                <td>
                    <div class="form-group col-xs-12">
                        <a href="index.php?c=lists&m=view&id=<?php echo $list->getListId(); ?>" type="submit" class="btn btn-info">View</a>
                    </div>
                </td>
                <td>
                    <div class="form-group col-xs-12">
                        <a href="index.php?c=lists&m=delete&id=<?php echo $list->getListId(); ?>" type="submit" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <?php } else {?>
                <td>
                    <td colspan="3">No lists!</td>
                </td>
            <?php } ?>
        </table>
    </div>
    <div class="col-xs-4"></div>
</div>

<?php include '/../include/footer.php'; ?>
