<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do</title>
    <link rel="shortcut icon" href="img/cylvenda.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary text-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Home.php">My To-Do</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <ul class="navbar-nav ms-auto mb-4 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pages/Login.php">Signin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pages/signup.php">Signup</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <main>

        <!-- Session message -->
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?? 'info' ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        ?>
        <?php endif; ?>

        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="img/note-to-do.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>To do Website</h5>
                        <p>Keep Yourself in better moment and record what you think</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/to-do2.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>To do Website</h5>
                        <p>We keep everything you want us to keep</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/plan-to-do.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>To do Website</h5>
                        <p>We ensure sucurity to all your details that you have provided</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="row p-3 mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card bg-secondary text-light">
                    <div class="card-body">
                        <h5 class="card-title">Welcome To My To-Do Website</h5>
                        <p class="card-text">Here You can save all your activities, plans, Wishes and other more from
                            your brain
                            before you forget
                        </p>
                        <a href="#" class="btn btn-primary">Get In Touch</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card bg-secondary text-light">
                    <div class="card-body">
                        <h5 class="card-title">Welcome To My To-Do Website</h5>
                        <p class="card-text">Our Website offers you a different activities, like writing your to do and
                            save it for
                            your future recall.
                        </p>
                        <a href="#" class="btn btn-primary">Get In Touch</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

</html>