<?php
include '../shred/header.php';
include '../shred/nav.php';
include '../general/env.php';
include '../general/function.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];   
    $password = $_POST['password'];    
    $select = "SELECT * FROM `admin` WHERE email = '$email' and password = '$password'";
    $s = mysqli_query($conn, $select);
    $numRow = mysqli_num_rows($s);
    if($numRow > 0){
        $_SESSION['admin'] = $email ;
    }
}

if(isset($_SESSION['admin'])){
    path('index.php');
}

?>


<h1 class="text-center display-4 mt-2">Login Page</h1>
<div class="container col-6 mt-3">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                

                <div class="form-group">
                    <label for="">Admin Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button class="btn btn-info" name="login">Login</button>

            </form>
        </div>

    </div>

</div>

<?php
include '../shred/footer.php';
?>