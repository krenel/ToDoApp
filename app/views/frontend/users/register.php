<?php include '/../include/header.php'; ?>
<?php include '/../include/menu.php'; ?>

<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <p>User registration page</p>
    <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
    <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
    <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
    <form action="" method="post">
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>First name</label>
                <input type="text" class="form-control" placeholder="First name" id="name" name="user_first_name" required="" data-validation-required-message="Please enter your name.">
                <?php if (array_key_exists('user_first_name', $errors)): ?>
                    <p class="help-block text-danger"><?php echo $errors['user_first_name']?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Last name</label>
                <input type="text" class="form-control" placeholder="Last name" id="name" name="user_last_name" required="" data-validation-required-message="Please enter your name.">
                <?php if (array_key_exists('user_last_name', $errors)): ?>
                    <p class="help-block text-danger"><?php echo $errors['user_last_name']?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="user_email" required="" data-validation-required-message="Please enter your email address.">
                <?php if (array_key_exists('user_email', $errors)): ?>
                    <p class="help-block text-danger"><?php echo $errors['user_email']?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="user_password" required="" data-validation-required-message="Please enter your phone number.">
                <?php if (array_key_exists('user_password', $errors)): ?>
                    <p class="help-block text-danger"><?php echo $errors['user_password']?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Confirm password</label>
                <input type="password" class="form-control" placeholder="Confirm password" id="password" name="confirm_password" required="" data-validation-required-message="Please enter your phone number.">
                <?php if (array_key_exists('confirm_password', $errors)): ?>
                    <p class="help-block text-danger"><?php echo $errors['confirm_password']?></p>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="row">
            <div class="form-group col-xs-12">
                <button type="submit" name="user_register" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
</div>

<?php include '/../include/footer.php'; ?>
