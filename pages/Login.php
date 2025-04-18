<?php session_start(); include '../config/cssheaders.php'; include '../config/pre_loginHeader.php' ?>

<div class="container mt-5 p-5 w-50 bg-secondary bg-gradient rounded text-dark">
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
  <h3>My To Do Login Form</h3>
    
  <form action="../config/formHandler.php" method="post" class="needs-validation ">

    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter username" name="email" >
    </div>

    <div class="mb-3">
      <label for="pass" class="form-label">Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass" >
    </div>

    <div class="d-flex justify-content-evenly">
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
  <a class="btn btn-info" href="signup.php" >Signup</a>
  </div>
  </form>
</div>