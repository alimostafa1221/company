<?php 
session_start(); 
if(isset($_GET['logOut'])){
  session_unset();

}

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/web/index.php">Company</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['admin'])): ?>
      <li>
        <a class="nav-link" href="/web/admin/add.php">Add Admin</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Employees
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/web/employees/add.php">Add</a>
          <a class="dropdown-item" href="/web/employees/list.php">List</a>
        </div>
      </li>
      <?php endif ?>
    </ul>
    <?php if(isset($_SESSION['admin'])): ?>
    <form class="form-inline my-2 my-lg-0">
      <button name="logOut" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Log Out</button>
      <?php else : ?>
      <a href="/web/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
    </form>
    <?php endif ?>
  </div>
</nav>