<?php
include '../shred/header.php';
include '../shred/nav.php';
include '../general/env.php';
include '../general/function.php';
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `employeesjoinWithDepart` WHERE empId=$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}

?>

<h1 class="text-center display-4 mt-2">show page :<?= $row['empName']?></h1>
<div class="container col-4 mt-3">
    <div class="card">
        <img src="/web/employees/uploaded/<?= $row['empImage'] ?>" alt="" class="card-img-top" >
        <div class="card-body">
            <h2><?= $row['empName'] ?></h2>
            <h4><?= $row['empEmail'] ?></h4>
            <span><?= $row['empId'] ?></span>
        </div>

    </div>

</div>



<?php
include '../shred/footer.php';
?>