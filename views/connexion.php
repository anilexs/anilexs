<?php 
// https://console.cloud.google.com/apis/dashboard?hl=fr&pli=1&authuser=3&project=anilexs&supportedpurview=project
$discord_link = "https://discord.com/oauth2/authorize?client_id=1277208767645220916&response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fanilexs%2Fconnexion&scope=identify+guilds";

if(!empty($_GET['code'])){
    $discord_code = $_GET['code'];
    $payload = [
        'code' => $discord_code,
        'client_id' => '1277208767645220916',
        'client_secret' => 'dvls2DpwpkU7eBLcyOVyHFz3cCkwQYFM',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://localhost/anilexs/connexion',
        'scope' => 'identify%20guilds',
    ];
    
    $payload_string = http_build_query($payload);
    $discord_token_url = "https://discordapp.com/api/oauth2/token";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $discord_token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    $result = curl_exec($ch); 
    
    if(!$result){
        echo curl_error($ch);
    }
    
    $result = json_decode($result, true);
    $access_token = $result['access_token'];
    if($access_token){
        $discord_user_url = "https://discordapp.com/api/users/@me";
        $header = array("Authorization: Bearer $access_token", "Content-Type: application/x-www-form-urlencoded");
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $discord_user_url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        $result = curl_exec($ch); 
        
        $result = json_decode($result, true);
        
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
    }else{
        header("Location: http://localhost/anilexs/connexionbbb");
    }
    ?>
    <!-- <img src="https://cdn.discordapp.com/avatars/<?= $result['id'] ?>/<?= $result['avatar'] ?>.jpg" alt=""> -->
    <?php
}else if(isset($_POST['credential'])){
    $credential = $_POST['credential'];

    list($header, $payload, $signature) = explode('.', $credential);

    $decodedHeader = base64_decode($header);
    $decodedPayload = base64_decode($payload);
    
    $headerData = json_decode($decodedHeader, true);
    $payloadData = json_decode($decodedPayload, true);
    
    $name = $payloadData['given_name'] ?? '';
    $prenom = $payloadData['family_name'] ?? '';
    $email = $payloadData['email'] ?? '';
    $picture = $payloadData['picture'] ?? '';
    $sub = $payloadData['sub'] ?? '';
    $hashedSub = password_hash($sub, PASSWORD_DEFAULT);
    echo "<pre>";
    var_dump($payloadData);
    echo "</pre>";
    

    // $user = User::googleAconteVerify($email, $sub);
    // if($user[0]){
        // echo "il a un compte <br>";
        // echo 'id google : '. $sub . '<br>';

        
        // echo "Nom: $name<br>";
        // echo "Prénom: $prenom<br>";
        // echo "Email: $email<br>";
        // echo 'id google  hach: '. $hashedSub . '<br>';
        // echo '<img src="'.$picture.'" alt="" style="width: 100px; height: 100px"><br>';
        // if($user[1]){
        //     // $userInfo = User::loginGoogle($email);
        // }else{
        //     echo "false";
        // }
    // }
}



// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
require_once "inc/header.php"; ?>
<link rel="stylesheet" href="asset/css/connexion.css">
<script src="https://accounts.google.com/gsi/client" async defer></script>
<title>connexion</title>
<?php require_once "inc/nav.php"; ?>

<div class="contenaire">
    <div class="left">
        
    </div>
    <div class="right">
        <div class="loginDiscord"><a href="https://discord.com/oauth2/authorize?client_id=1277208767645220916&response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fanilexs%2Fconnexion&scope=identify+guilds"><img src="asset/img/discord_logo.png" alt=""></a></div>
        
        <div class="googleContenaire">
            <div id="g_id_onload"
                 data-client_id="417235652555-bb9ctdul0e58mfvq7odc1538efji7ap7.apps.googleusercontent.com"
                 data-context="signin"
                 data-ux_mode="popup"
                 data-login_uri="http://localhost/anilexs/connexion.php"
                 data-auto_prompt="false">
            </div>
            
            <div class="g_id_signin"
                 data-type="icon"
                 data-shape="circle"
                 data-theme="filled_blue"
                 data-text="signin_with"
                 data-size="large">
            </div>
        </div>
    </div>
</div>

<?php require_once "inc/footer.php"; ?>