<?php

include '../shred/header.php';
include '../shred/nav.php';
include '../general/env.php';
include '../general/function.php';

if(isset($_POST['add'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $insert = "INSERT INTO `admin`(`id`, `email`, `password`, `role`) VALUES (null,'$email','$password',$role)";
    mysqli_query($conn , $insert);

}


?>

 
<h1 class="text-center display-4 mt-2">Add Admin Page</h1>
<div class="container col-6 mt-3">
    <div class="card">
        <div class="card-body">
            <form action="./addadmin.php" method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="">Admin Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="">Admin Access</label>
                    <input type="radio" value="1" name="role"> All Access
                    <input type="radio" value="2" name="role"> Simi Access
                </div>

                <button class="btn btn-info" name="add">Add Admin</button>

            </form>
        </div>

    </div>

</div>




<?php
include '../shred/footer.php';
?>