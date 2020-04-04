<?php
if (isset($_SESSION['level'])) {
    $level = $_SESSION['level'];
} else {
    $level = '';
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Aplikasi Cari Rute Wisata</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php" style="color: white">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?page=module/tempat/list" style="color: white">List Wisata</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?page=module/caritempat/index" style="color: white">Cari Tempat</a>
                </li>
                <?php
                if ($level == 'admin') { ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?page=module/tempat/index" style="color: white">Tempat</a>
                    </li>

                <?php } ?>
                <?php
                if ($level == TRUE) {
                ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?page=module/login/logout" style="color: white">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?page=module/login/login" style="color: white">Login</a>
                    </li>
                <?php } ?>
                <!-- <li class="nav-item ">
                    <a class="nav-link" href="index.php?page=module/jarak_tempat/index" style="color: white">Jarak Tempat</a>
                </li> -->

            </ul>

        </div>
    </div>
</nav>