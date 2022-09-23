<?php
function path($go){
    echo "
    <script>
        window.location.replace('/web/$go/')
    </script>
    ";
}

function auth(){
    if(!isset($_SESSION['admin'])){
        path('admin/login.php');
    }
}
?>