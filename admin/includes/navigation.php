<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../admin">Admin</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    <!-- Amin name with a drop down option to logout -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?=$_SESSION['username'];?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>