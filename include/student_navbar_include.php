<!--Staff Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">
        Exam-in
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>">
                <div id="profile" class="container my-4">
                    <img class="mb-2" src="../img/profile5.png" width="60%" >
                    <h6 class="nav-link-text text-muted"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></h6>
                </div>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="../student/student_index.php">
                    <i class="fas fa-th mr-1"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
                <a class="nav-link" href="#">
                    <i class="fas fa-user mr-1"></i>
                    <span class="nav-link-text">My Profile</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Test Bank">
                <a class="nav-link" href="../test-system/test_bank.php">
                    <i class="fas fa-folder mr-1"></i>
                    <span class="nav-link-text">Test Bank</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <a class="nav-link" id="logout">
                <i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
