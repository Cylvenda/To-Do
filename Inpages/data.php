<?php include '../config/fetch.php'; include  '../config/post_login.php'; include '../config/cssheaders.php';


if(isset($_GET['dataLs_id'])){
    $data_id = $_GET['dataLs_id'];
    $user_id = $_SESSION['user_id'];

    fetchToDoData($conn, $user_id, $data_id);
}

if(isset($_GET['data_id'])){
    $data_id = $_GET['data_id'];
    $user_id = $_SESSION['user_id'];

    fetchToDoDataToUpdate($conn, $user_id, $data_id);
}

if(isset($_GET['user'])){
    $user_id = $_GET['user'];

    getUserProfile($conn, $user_id);

}

// user To-Do's data delete
if(isset($_GET['deleteData'])){
    $user_id = $_SESSION['user_id'];
    $dataToDelete = $_GET['deleteData'];

    $delete = mysqli_query($conn, "DELETE FROM activities WHERE activity_id = '$dataToDelete' ");
    if($dataToDelete){
        $_SESSION['message'] = "Data Deleted successfully";
        $_SESSION['message_type'] = "success";
       header('Location: ../Inpages/');
    }else{
        $_SESSION['message'] = "Count Delete data, Error Occured.";
        $_SESSION['message_type'] = "danger";
       header('Location: ../Inpages/');
    }
}

if(isset($_GET['deleteUser'])){
    $user_id = $_GET['deleteUser'];

    $delete = mysqli_query($conn, "DELETE FROM users WHERE user_id = '$user_id' ");
    if($dataToDelete){
        $_SESSION['message'] = "User Deleted successfully";
        $_SESSION['message_type'] = "success";
        session_destroy();
       header('Location: ../');
       exit;
    }else{
        $_SESSION['message'] = "Couldn't Delete User, Error Occured.";
        $_SESSION['message_type'] = "danger";
       header('Location: ../Inpages/');
       exit;
    }
}