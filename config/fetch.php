<?php

include 'conn.php';


// function to fetch user data (to-do's)
function fetchToDo($conn, $user_id){

    try {
        $select = mysqli_query($conn, "SELECT * FROM activities WHERE user_id = '$user_id' ");
        if($select){
            
        if(mysqli_num_rows($select) <= 0){
            ?>
<table class="text-center">
    No Data Found Now, But You Start to Add Now <button onclick="showForm()" class="btn btn-info">Add</button>
    </ta>
    <?php
        }else{
            while($row = mysqli_fetch_array($select)){
                ?>
    <tr>
        <td class="row-number"></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['time_added'] ?></td>
        <td class=" justify-content-around">
            <a href=""></a>
            <a href="data.php?dataLs_id=<?php echo $row['activity_id'] ?> " class="btn btn-info "><img class="img-icon"
                    src="../img/show.svg" alt="View"></a>
            <a href="data.php?data_id=<?php echo $row['activity_id'] ?> " class="btn btn-warning"><img class="img-icon"
                    src="../img/pen.svg" alt="Edit"></a>
            <a href="data.php?deleteData=<?php echo $row['activity_id'] ?> " class="btn btn-danger "><img
                    class="img-icon" src="../img/trash.svg" alt="Delete"></a>
        </td>
    </tr>
    <?php
            }
        }
        }
    } catch (mysqli_sql_exception) {
        $_SESSION['message'] = "Internal Server Error Occured with the server, Try Again Later";
        $_SESSION['message_type'] = "danger";
        header('Location: ../Inpages/index.php');
    }

}

// function for fecting user data as readonly
function fetchToDoData($conn, $user_id, $data_id){

    $data_fetch = mysqli_query($conn, "SELECT * FROM activities WHERE user_id = '$user_id'
     AND activity_id = '$data_id' ");

    $row = mysqli_fetch_assoc($data_fetch);
    ?>

    <div class="container mt-5 p-5 w-50 bg-secondary bg-gradient rounded text-dark" id="AddForm">

        <h3>Read More About your To-Do</h3>
        <form class="needs-validation text-dark">
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" value="<?php echo $row['title'] ?>"
                    placeholder="Enter Title" name="title" readonly>
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Description</label>
                <textarea class="form-control" rows="4" name="content" placeholder="Enter Description " id="content"
                    readonly><?php echo $row['content'] ?></textarea>
            </div>

            <div class="d-flex justify-content-around">
                <a href="data.php?data_id=<?php echo $row['activity_id'] ?> " type="submit" class="btn btn-primary">Edit
                    /
                    Update</a>
                <a type="button" href="./" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
    <?php
    
}

// Function to fetch user data and update it
function fetchToDoDataToUpdate($conn, $user_id, $data_id){

    $data_fetch = mysqli_query($conn, "SELECT * FROM activities WHERE user_id = '$user_id'
     AND activity_id = '$data_id' ");

    $row = mysqli_fetch_assoc($data_fetch);
    ?>

    <div class="container mt-5 p-5 w-50 bg-secondary bg-gradient rounded text-dark" id="AddForm">
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

        <h3>Update To-Do List</h3>
        <form action="../config/formHandler.php" method="post" class="needs-validation text-dark">
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" value="<?php echo $row['title'] ?>"
                    placeholder="Enter Title" name="title">
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Description</label>
                <textarea class="form-control" rows="4" name="content" placeholder="Enter Description "
                    id="content"><?php echo $row['content'] ?></textarea>
            </div>


            <div class="d-flex justify-content-around">
                <input type="hidden" name="data_id" value="<?= $row['activity_id'] ?>">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <a type="button" href="./" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
    <?php
    
}

function getUserProfile($conn, $user_id){

    $data_fetch = mysqli_query($conn, " SELECT * FROM users WHERE user_id = '$user_id' ");
    
        
    if($row = mysqli_fetch_array($data_fetch)){

        ?>
    <div class="container p-3 d-flex justify-content-around">

        <h3>Welcome <a class="btn btn-primary" href="data.php?user=<?php echo $_SESSION['user_id'] ?>"><?php echo $_SESSION['username'] ?></a>
        </h3>
            
        <h3>Delete Your Account  <a class="btn btn-danger" href="data.php?deleteUser=<?php echo $_SESSION['user_id'] ?>">Delete Account</a></h3>
    </div>
            
    <div class="container mt-5 p-5 w-50 bg-secondary bg-gradient rounded text-dark">

        <div class="container">
            <!-- Session message -->
            <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?? 'info' ?> alert-dismissible fade show"
                role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
            ?>
            <?php endif; ?>

            <h3><?php echo $_SESSION['username'] ?> Profile Edit</h3>
            <form action="../config/formHandler.php" method="post" class="needs-validation ">
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" value="<?php echo $row['username'] ?>" id="uname"
                        placeholder="Enter username" name="username">
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" value="<?php echo $row['email'] ?>" id="email"
                        placeholder="Enter username" name="email">
                </div>

                <div class="d-flex justify-content-around">
                    <input type="hidden" id="user" name="user" value="<?= $row['user_id'] ?>">
                    <button type="submit" name="edit_user" class="btn btn-primary">Submit</button>
                    <a class="btn btn-info" href="../Inpages/">Back Home</a>
                </div>
            </form>
            
        </div>
        <?php
    }else{
        $_SESSION['message'] = "Error with the server";
        $_SESSION['message_type'] = "danger";
       header('Location: ../Inpages/');
    }
}