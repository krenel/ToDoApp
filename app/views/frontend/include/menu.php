<!-- Navigation -->
<nav style="background-color: #3A3A3A;" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['user'])) { ?>
                <li>
                    <a href="index.php?c=loginuser&m=register">Register</a>
                </li>
                <li>
                    <a href="index.php?c=loginuser&m=login">Log In</a>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && isset($_SESSION['user'])) { ?>
                <li>
                    <a>Hello <?php echo $_SESSION['user']->getUserFirstName().' '.$_SESSION['user']->getUserLastName() ?></a>
                </li>
                <li>
                    <a href="index.php?c=lists&m=index">TO DO</a>
                </li>
                <li>
                    <a href="index.php?c=loginuser&m=logout">Log out</a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<br/>
<br/>