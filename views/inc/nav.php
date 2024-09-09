</head>
<body>
<?php
if($_POST != []){ ?>
    <script>
        var postData = <?= json_encode($_POST) ?>;
        authentication(postData);
    </script>
<?php }
if(isset($_COOKIE['token'])){ ?>
    <nav>

    </nav>
<?php }else{ ?>
    <nav>
        <ul>
            <li class="logo"><a href="<?= $host ?>"><img src="<?= $host ?>views/asset/img/logo.png" alt=""></a></li>
            <li class="nav">
                <ul>
                    <li><button id="authentication">authentication</button></li>
                </ul>
            </li>
        </ul>
    </nav>
<?php } ?>