<?php
include '../shred/header.php';
include '../shred/nav.php';
include '../general/env.php';
include '../general/function.php';
$select = "SELECT * FROM `employees`";
$s = mysqli_query($conn, $select);
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM `employees` WHERE id = $id";
    mysqli_query($conn , $delete);
}
auth();


?>

<h1 class="text-center display-4 mt-2">list page</h1>
<div class="container col-6 mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($s as $data) { ?>
                    <tr>
                        <td> <?= $data['id'] ?></td>
                        <td> <?= $data['name'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/web/employees/show.php?show=<?= $data['id']?>" type="button" class="btn btn-info">show</a>
                                <a href="/web/employees/list.php?delete=<?= $data['id']?>" type="button" class="btn btn-danger">delete</a>
                                <a href="/web/employees/update.php?update=<?= $data['id']?>" type="button" class="btn btn-success">update</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>

</div>



<?php
include '../shred/footer.php';
?>