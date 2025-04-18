<?php session_start(); include '../config/cssheaders.php' ; include '../config/pre_loginHeader.php'  ?>

<div class="container mt-5 p-5 w-50 bg-secondary bg-gradient rounded text-dark">
  
  <div class="container">
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

    <h3>Register To My To-Do</h3>
  <form action="../config/formHandler.php" method="post" class="needs-validation ">
  <div class="mb-3 mt-3">
      <label for="username" class="form-label">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" >
    </div>

    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter username" name="email" >
    </div>

    <div class="mb-3">
      <label for="pass" class="form-label">Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass" >
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="myCheck"  name="remember" >
      <label class="form-check-label" for="myCheck">I agree on the Terms and Conditions</label>
    </div>

  <div class="d-flex justify-content-around">
  <button type="submit" name="register" class="btn btn-primary">Submit</button>
   <a class="btn btn-info" href="Login.php">Login</a>
  </div>
  </form>
</div>