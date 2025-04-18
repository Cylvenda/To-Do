<?php 
 include 'action.php';
 error_reporting(1);

 if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    postUser($conn,$username, $email, $password);
}


if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    getUser($conn, $email, $password);
}

if(isset($_POST['addToDo'])){
    $user_id = $_SESSION['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    addToDo($conn, $title, $content, $user_id);
}

if(isset($_POST['update'])){
    $user_id = $_SESSION['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $data_id = $_POST['data_id'];

    UpdateToDo($conn, $title, $content, $user_id, $data_id);
}

if(isset($_POST['edit_user'])){
    $user_id = $_SESSION['user_id'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

  UpdateUser($conn, $username, $email,  $user_id);
}

