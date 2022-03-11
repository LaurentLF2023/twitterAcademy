<?php
require_once '../Model/log.class.php';
        $log = new LogActions();
            // echo $_SESSION['id'];
?>

    <div class="nav-container bg-white col-3 border-end position-sticky py-5 mx-0">
        <ul class="nav flex-column align-items-end m-auto w-75 ">
            <a class="navbar-brand mb-4" href="home_page.php"><img src="../assets/perrot.png" alt=""></a>
            <li class="nav-item">
                <a class="d-flex justify-content-around nav-link text-dark active py-3 fw-bold btn-success bg-white" href="home_page.php"> <i class="bi bi-house"></i><div class="d-sm-none d-md-block"> HOME</div></a>
            </li>
            <li class="nav-item">
                <a class="d-flex justify-content-around nav-link text-dark py-3 fw-bold" href="chat.php"><i class="bi bi-chat-left-text"></i> MESSAGE</a>
            </li>
            <li class="nav-item">
                <a class="d-flex justify-content-around nav-link text-dark py-3 fw-bold" href="profile.php"><i class="bi bi-person"></i><div class="d-sm-none d-md-block"> PROFIL</div></a>
            </li>
            <li class="nav-item">
                <a href="../Controller/connexion/log_out.php" class="btn btn-violet nav-link mt-4">Log out</a>
            </li>
        </ul>
    </div>
