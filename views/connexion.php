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
}



echo "<pre>";
var_dump($_POST);
echo "</pre>";
require_once "inc/header.php"; ?>
<title>connexion</title>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<?php require_once "inc/nav.php"; ?>
<img src="https://cdn.discordapp.com/avatars/<?= $result['id'] ?>/<?= $result['avatar'] ?>.jpg" alt="">

<div id="g_id_onload"
    data-client_id="224348978546-jki2a29kf80k1q441lp7khc05k67j8kt.apps.googleusercontent.com"
    data-context="signup"
    data-ux_mode="popup"
    data-login_uri="http://localhost/anilexs/connexion.php?type=google"
    data-auto_prompt="false">
</div>
    
<div class="g_id_signin"
    data-type="standard"
    data-shape="pill"
    data-theme="filled_blue"
    data-text="signin_with"
    data-size="large"
    data-logo_alignment="left">
</div>
<?php require_once "inc/footer.php"; ?>