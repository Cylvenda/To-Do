<?php 
    include 'conn.php';

        //Function for user register
function postUser($conn, $username, $email, $password){

    if(empty($username) && empty($email) && empty($password)){
        $_SESSION['message'] = "All Field must be filled!";
        $_SESSION['message_type'] = "danger";
       header('Location: ../pages/signup.php');
    }else{
        $table_users =  mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (user_id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR (100) NOT NULL,
        time_joined DATETIME DEFAULT CURRENT_TIMESTAMP)" );
        
        if($table_users){

            $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email LIKE '$email' ");
            $user_fetch = mysqli_num_rows($check_user);

            if($user_fetch > 0){
                $_SESSION['message'] = "User with that Email Already Exist!";
                $_SESSION['message_type'] = "danger";
               header('Location: ../pages/signup.php');
            }else{
    
                $hash_one = password_hash($password,PASSWORD_DEFAULT);
    
                $pushUser = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES 
                ('$username', '$email', '$hash_one') ");
                
                if($pushUser){
                $_SESSION['message'] = "You have Registered successfully, Now You can Login!";
                $_SESSION['message_type'] = "success";
                header('Location: ../pages/Login.php');
               }
            }
        }else{
            $_SESSION['message'] = "Something Went wrong with the server, Try Again Later!!";
            $_SESSION['message_type'] = "danger";
            header('Location: ../Inpages/');
        }

    }
}

            //Function for users Login
function getUser($conn, $email, $password){

    if( empty($email) && empty($password)){
        $_SESSION['message'] = "All Field must be filled!";
        $_SESSION['message_type'] = "danger";
       header('Location: ../pages/Login.php');
    }else{
        
        try {
            $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
            $user_fetch = mysqli_num_rows($check_user);
    
            if($user_fetch > 0){
                $row = mysqli_fetch_array($check_user);
    
                if(password_verify($password,$row['password'])){
                
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['message'] = "You have Loggedin successfully!!";
                    $_SESSION['message_type'] = "success";
                    header('Location: ../Inpages/');
    
                }else{
                    $_SESSION['message'] = "Incorrect Password, Make sure your password written is correctly";
                    $_SESSION['message_type'] = "danger";
                   header('Location: ../pages/Login.php');
                }
    
    
            }else{
                $_SESSION['message'] = "Incorrect Email, Make sure your email is written is correctly";
                $_SESSION['message_type'] = "danger";
               header('Location: ../pages/Login.php');
            }
        } catch (mysqli_sql_exception) {
            $_SESSION['message'] = "Invalid Email, You have to Register First";
            $_SESSION['message_type'] = "danger";
           header('Location: ../pages/Login.php');
        }

    }
}

    // Function to add new user's to do
function addToDo($conn, $title, $content, $user_id){
    
    if(empty($title) && empty($content)){
        $_SESSION['message'] = "You have to provide a Title and Description, To add to your To Do List!";
        $_SESSION['message_type'] = "danger";
        header('Location: ../Inpages/');
    }else{
        $table =  mysqli_query($conn, "CREATE TABLE IF NOT EXISTS activities (activity_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        title VARCHAR(50) NOT NULL,
        content VARCHAR(255) NOT NULL,
        time_added DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE CASCADE
    ) ENGINE=InnoDB");

    if($table){
        $add_activity = mysqli_query($conn, "INSERT INTO activities (title, content, user_id) VALUES 
        ('$title', '$content', '$user_id') ");

        if($add_activity){
            $_SESSION['message'] = "New Activity added successfully";
            $_SESSION['message_type'] = "success";
            header('Location: ../Inpages/');
        }else{
            $_SESSION['message'] = "Error Adding New activity!";
            $_SESSION['message_type'] = "danger";
            header('Location: ../Inpages/');
        }
    }else{
        $_SESSION['message'] = "Something Went wrong with the server, Try Again Later!!";
        $_SESSION['message_type'] = "danger";
        header('Location: ../Inpages/');
    }

    }

}

// function for updating user to-do's data
function UpdateToDo($conn, $title, $content, $user_id, $data_id){

    
    if(empty($title) && empty($content)){
        $_SESSION['message'] = "You can not leave blank you have to only change";
        $_SESSION['message_type'] = "danger";
        header('Location: ../Inpages/');
    }else{

        $update_activity = mysqli_query($conn, " UPDATE activities SET title = '$title', content = '$content' 
        WHERE activity_id = '$data_id' AND user_id = '$user_id'  ");

        if($update_activity){
            $_SESSION['message'] = "Your data Updated Successfully";
            $_SESSION['message_type'] = "success";
            header('Location: ../Inpages/');
        }else{
            $_SESSION['message'] = "Error Updating A List!";
            $_SESSION['message_type'] = "danger";
            header('Location: ../Inpages/');
        }

    }

}

// function for updateing users profile data

// function UpdateUser($conn, $username, $email, $user_id){
//     if(empty($username) && empty($email) ){
//         $_SESSION['message'] = "All Field must be filled!";
//         $_SESSION['message_type'] = "danger";
//        header('Location: ../Inpages/');
//     }else{

//             $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email LIKE '$email' ");
//             $user_fetch = mysqli_num_rows($check_user);

//             if($user_fetch > 0){
//                 $_SESSION['message'] = "User with that Email Already Exist!";
//                 $_SESSION['message_type'] = "danger";
//                header('Location: ../Inpages/');
//             }else{

    
//                 $EditUser = mysqli_query($conn, "UPDATE users SET username ='$username',
//                 email = '$email' WHERE user_id = '$user_id'  ");
                
//                 if($EditUser){
//                 $_SESSION['message'] = "You have Updated successfully Your Profile!";
//                 $_SESSION['message_type'] = "success";
//                 header('Location: ../Inpages/');
//                }
//             }


//     }
// }

function UpdateUser($conn, $username, $email, $user_id) {
    // Check if another user already uses this email
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
    $stmt->bind_param("si", $email, $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['message'] = "Email already taken by another user.";
        $_SESSION['message_type'] = "danger";
        header('Location: ../Inpages/');
        exit;
    }

    $stmt->close();

    // Proceed with update
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE user_id = ?");
    $stmt->bind_param("ssi", $username, $email, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Update failed. Try again.";
        $_SESSION['message_type'] = "danger";
    }

    $stmt->close();
    header('Location: ../Inpages/');
    exit;
}
