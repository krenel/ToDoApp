<?php include '/../include/header.php'; ?>
<?php include '/../include/menu.php'; ?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1>Create new List</h1>
        <form action="" method="post">
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Title</label>
                    <input type="hidden" name="list_user_id" value="<?php echo $_SESSION['user']->getUserId(); ?>">
                    <input type="text" class="form-control" placeholder="List Title" name="list_title" required="" data-validation-required-message="Please enter your phone number.">
                    <?php if (array_key_exists('list_title', $errors)): ?>
                        <p class="help-block text-danger"><?php echo $errors['list_title']?></p>
                    <?php endif; ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-xs-12">
                    <button type="submit" name="list_create" class="btn btn-default">Create</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

<?php include '/../include/footer.php'; ?>
