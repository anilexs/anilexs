<?php 
require_once "inc/header.php"; ?>
<link rel="stylesheet" href="asset/css/index.css">
<script src="asset/js/structure.js" defer></script>
<title>Accueil</title>
<?php require_once "inc/nav.php"; ?>

    <div class="divertissement">
        <a href="<?= $host ?>reference" class="opt"></a>
        <a href="<?= $host ?>objectif" class="opt" id="cut">
            <img src="asset/img/solei.png" alt="">
            <img src="asset/img/butterflyKnifeMarbleFade.png" alt="">
            <div class="legande">
                <p>ma progression sur mon couteau</p>
            </div>
        </a>
        <a href="<?= $host ?>shop/" class="opt"></a>
    </div>
    <div class="all"></div>

<?php require_once "inc/footer.php"; ?>