<?php

use app\core\Application;

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Catalog - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/breadcrumb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/stars-progress-bar.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/dark-hive/jquery-ui.css">
</head>

<body>
<nav class="navbar navbar-expand-md sticky-top bg-body py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span style="font-weight: bold;font-size: 25px;">CCC</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="/gpus" style="font-size: 18px;color: var(--bs-emphasis-color);">Graphics cards</a></li>
                <li class="nav-item"><a class="nav-link" href="/cpus" style="font-size: 18px;color: var(--bs-emphasis-color);">Processors</a></li>
                <li class="nav-item"><a class="nav-link" href="/ssds" style="font-size: 18px;color: var(--bs-emphasis-color);">Storage</a></li>
                <?php
                    if(Application::$app->session->get('user')){
                        if($_SESSION['user'][0]['role'] == 'Admin'){
                            echo "<li class='nav-item'><a class='nav-link' href='/users' style='font-size: 18px;color: var(--bs-emphasis-color)'>Users</a></li>";
                        }
                    }
                ?>
            </ul>
            <?php
            if (Application::$app->session->get('user')) {
                echo'<a href="/processLogout"><button class="btn btn-primary" type="button">Log out</button></a>';
            } else {
                echo'<a href="/login"><button class="btn btn-primary" type="button">Sign IN</button></a>';
            }
            ?>

        </div>
    </div>
</nav>
{{ RENDER_SECTION }}
<footer class="text-center" style="background: #1a1a1a;height: 153px;">
    <div class="container text-white py-4 py-lg-5" style="color: var(--bs-body-bg);height: 152px;">
        <ul class="list-inline">
            <li class="list-inline-item me-4"><a class="link-light" href="#">Web design</a></li>
            <li class="list-inline-item me-4"><a class="link-light" href="#">Development</a></li>
            <li class="list-inline-item"><a class="link-light" href="#">Hosting</a></li>
        </ul>
        <p class="mb-0" style="font-size: 18px;color: var(--bs-body-bg);">Copyright © 2024 CCC</p>
    </div>

</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/bootstrap-slider.min.js"></script>
<script src="assets/js/range-clock-speed.js"></script>
<script src="assets/js/range-cores.js"></script>
<script src="assets/js/range-cpu-clock-speed.js"></script>
<script src="assets/js/range-cpu-price.js"></script>
<script src="assets/js/range-memory_bus_widht.js"></script>
<script src="assets/js/range-price.js"></script>
<script src="assets/js/range-seq-read.js"></script>
<script src="assets/js/range-seq-write.js"></script>
<script src="assets/js/range-ssd-price.js"></script>
<script src="assets/js/range-storage.js"></script>
<script src="assets/js/range-tb-written.js"></script>
<script src="assets/js/range-tdp.js"></script>
<script src="assets/js/range-texture-mapping-units.js"></script>
<script src="assets/js/range-threads.js"></script>
<script src="assets/js/range-vram-size.js"></script>
<script src="assets/js/stars-progress-bar-product_view.js"></script>
<script src="assets/js/test.js"></script>
</body>

<?php
Application::$app->session->showSuccessNotification();
Application::$app->session->showErrorNotification();
?>

</html>