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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Update User</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">First name:</label>
                        <div class="controls">
                            <input class="input-xlarge" id="focusedInput" name="user_first_name" type="text" value="<?php echo $insertInfo['user_first_name'] ?>">
                            <?php if (array_key_exists('user_first_name', $errors)): ?>
                                <span class="help-inline"><?php echo $errors['user_first_name'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Last name:</label>
                        <div class="controls">
                            <input class="input-xlarge" id="focusedInput" name="user_last_name" type="text" value="<?php echo $insertInfo['user_last_name'] ?>">
                            <?php if (array_key_exists('user_last_name', $errors)): ?>
                                <span class="help-inline"><?php echo $errors['user_last_name'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Email:</label>
                        <div class="controls">
                            <input class="input-xlarge" id="focusedInput" name="user_email" type="text" value="<?php echo $insertInfo['user_email'] ?>">
                            <?php if (array_key_exists('user_email', $errors)): ?>
                                <span class="help-inline"><?php echo $errors['user_email'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Password</label>
                        <div class="controls">
                            <input class="input-xlarge" id="focusedInput" type="password" name="user_password" value="">
                            <?php if (array_key_exists('user_password', $errors)): ?>
                                <span class="help-inline"><?php echo $errors['user_password'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Confirm password</label>
                        <div class="controls">
                            <input class="input-xlarge" id="focusedInput" type="password" name="confirm_password" value="">
                            <?php if (array_key_exists('confirm_password', $errors)): ?>
                                <span class="help-inline"><?php echo $errors['confirm_password'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">User is Admin</label>
                        <div class="controls">
                            <input type="checkbox" name="user_admin_status" <?php if ($insertInfo['user_admin_status'] == 1) {echo 'checked';} ?> value="1" >Make user admin<br>
                        </div>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <button type="submit" name="user_update" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
            </form>
        </div>
    </div>

<?php include '/../include/footer.php'; ?>