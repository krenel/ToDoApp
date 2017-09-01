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

        <div class="box span12">
            <div class="box-header" data-original-title="">
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Create new Administrator</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Username:</label>
                            <div class="controls">
                                <input class="input-xlarge" id="focusedInput" name="admin_username" type="text" value="">
                                <?php if (array_key_exists('admin_username', $errors)): ?>
                                    <span class="help-inline"><?php echo $errors['admin_username'] ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Password</label>
                            <div class="controls">
                                <input class="input-xlarge" id="focusedInput" type="password" name="admin_password" value="">
                                <?php if (array_key_exists('admin_password', $errors)): ?>
                                    <span class="help-inline"><?php echo $errors['admin_password'] ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                    </fieldset>
                <div class="form-actions">
                    <button type="submit" name="createAdmin" class="btn btn-primary">Create</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
                </form>
            </div>
        </div>

<?php include '/../include/footer.php'; ?>