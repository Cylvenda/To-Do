<?php 

include  '../config/post_login.php'; include '../config/cssheaders.php'; include '../config/fetch.php';

if(!isset($_SESSION['username'])){
    $_SESSION['message'] = "You have to Login First in order to continue exploring!";
    $_SESSION['message_type'] = "danger";
   header('Location: ../');
}
$user_id = $_SESSION['user_id'];


?>

<main>

<div class="container p-3">
     <h3>Welcome <a href="data.php?user=<?php echo $user_id ?>"><?php echo $_SESSION['username'] ?></a> </h3>
</div>

    <div class="container mt-3">
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
        <div class="d-flex justify-content-between ">
            <h2><?php echo $_SESSION['username'] ?> To-Do's List</h2>
            <button onclick="showForm()" class="btn btn-success">Add</button>
        </div>
        <table class="table table-secondary mt-2 rounded">
            <tbody>

                <tr>
                    <th>##</th>
                    <th>Tittle</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php $_SESSION['user_id'] = $user_id; fetchToDo($conn, $user_id) ?>
            </tbody>
        </table>

    </div>



<div class="container top-5 d-none start-50 translate-middle p-5 w-50 m-auto bg-secondary shadow-lg bg-gradient rounded text-dark position-absolute"
    id="AddForm">

    <h3>Add New To-Do</h3>
    <form action="../config/formHandler.php" method="post" class="needs-validation text-dark">
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
        </div>

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Description</label>
            <textarea class="form-control" rows="4" name="content" placeholder="Enter Description "
                id="content"></textarea>
        </div>

        <div class="d-flex justify-content-around">
            <button type="submit" name="addToDo" class="btn btn-primary">Submit</button>
            <button type="button" onclick="closeForm()" class="btn btn-danger">Cancel</button>
        </div>
    </form>
</div>
</main>
<script src="../style/js.js"></script>
</body>

</html>