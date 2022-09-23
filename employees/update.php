<?php
include '../shred/header.php';
include '../shred/nav.php';
include '../general/env.php';
include '../general/function.php';

if(isset($_GET['update'])){
    $id = $_GET['update'];
    $selectUpdate = "SELECT * FROM `employees` WHERE id = $id";
    $employee = mysqli_query($conn , $selectUpdate);
    $update = mysqli_fetch_assoc($employee);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];   
    $depId = $_POST['depId'];
    if(empty($_FILES['image']['name'])){
        $image_name = $update['image'];
    }else {
        $image_name = time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./uploaded/";
        move_uploaded_file($tmp_name , $location . $image_name); 
    }
      
    $edit = "UPDATE `employees` SET `name`='$name',`email`='$email',`image`='$image_name',`depId`='$depId' WHERE id = $id";
    mysqli_query($conn, $edit);
}
$select = "SELECT * FROM `department`";
$departments = mysqli_query($conn, $select);

auth();

?>


<h1 class="text-center display-4 mt-2">Upadte Page</h1>
<div class="container col-6 mt-3">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Employee Name</label>
                    <input type="name" class="form-control" value="<?= $update['name'] ?>" name="name">
                </div>

                <div class="form-group">
                    <label for="">Employee Email</label>
                    <input type="email" class="form-control" value="<?= $update['email'] ?>" name="email">
                </div>

                <div class="form-group">
                    <label for="">Image Profile</label>
                    <input type="file" class="form-control" value="<?= $update['image'] ?>" name="image">
                </div>

                <div class="form-group">
                    <label for="">Department</label>
                    <select class="form-control" name="depId">
                        <?php foreach ($departments as $data) { ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-info" name="update">Update</button>

            </form>
        </div>

    </div>

</div>

<?php
include '../shred/footer.php';
?>