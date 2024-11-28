<?php 
// session_set_cookie_params(60 * 60 * 24 * 365);
session_start();
if(isset($_SESSION['anilexsT'])){
    require_once "../inc/header.php"; ?>
    <title>Boutique</title>
    <?php require_once "../inc/nav.php"; ?>

    <?php require_once "../inc/footer.php"; 
}else{
    echo "session null";
    header("Location: http://localhost/anilexs/");
    exit;
}
