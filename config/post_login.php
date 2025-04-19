<?php  ?>
<nav class="navbar navbar-expand-lg bg-primary text-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../Inpages/">My To-Do</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="data.php?user=<?php echo $user_id ?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../config/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>