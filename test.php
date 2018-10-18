<?php
    if (isset($_GET["code"])) {
        $client_id = 'cb2c9e991cc543e59770961e556b202f';
        $client_secret = '99552e21beb944adbd5cf1fa149a190d';
        $grant_type = 'authorization_code';
        $redirect_uri = 'http://localhost/authIG/test.php';
        $code = $_GET["code"];

        $curl = curl_init('https://api.instagram.com/oauth/access_token');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "client_id=$client_id&client_secret=$client_secret&grant_type=$grant_type&redirect_uri=$redirect_uri&code=$code");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        echo $result;
        $r = json_decode($result, true);

        // get tag search
        echo '<a href="https://api.instagram.com/v1/tags/search?q=snowy&access_token='.$r["access_token"].'">Link</a>';
        echo $r["access_token"];
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="insta-default">
        <a id="login" href="https://api.instagram.com/oauth/authorize/?client_id=cb2c9e991cc543e59770961e556b202f&redirect_uri=http://localhost/authIG/test.php&response_type=code">
            Login with Instagram
        </a>
    </div>

    <script>
        
    </script>
</body>
</html>
