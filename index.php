<?php
// telegram logs
$token = '5113568724:AAHo1QQxk9XkyvQ2D6JwO9gj6YlpUVbfeFM';
$user_id = 667407369;

function GetIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
  else return $_SERVER['REMOTE_ADDR'];
}

$ip = GetIP();
$country = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"))->country;
$time = date('H:i d.m.Y');

$stats = json_decode(file_get_contents('stats.json'), true);
$short_ip = implode('.', array_slice(explode('.', $ip), 0, 3));

if(!in_array($short_ip, $stats[$country])){
file_get_contents("https://api.telegram.org/bot$token/sendMessage?".http_build_query(['chat_id'=>$user_id, 'text'=>"$country / $ip / $time"]));
}

$stats[$country][] = $short_ip;
$stats[$country] = array_unique($stats[$country]);
file_put_contents('stats.json', json_encode($stats));
?>

<!DOCTYPE html>
<html>
<head>
    <script src="static\rythm.js"></script>
    <link rel="stylesheet" href="static\s.css">
    <link rel="shortcut icon" type="image/x-icon" href="static\1.ico">
    <meta charset="utf-8">
    <script type="text/javascript" src="js/dat.gui.min.js"></script>
    <style>
        * {
            user-select: none;
        }

        html, body {
            overflow: hidden;
            background-color: #000;
        }

        body {
            margin: 0;
            position: fixed;
            width: 100%;
            height: 100%;
        }

        canvas {
            width: 100%;
            height: 100%;
        }

        .dg {
            opacity: 0.9;
        }

            .dg .property-name {
                overflow: visible;
            }

        @font-face {
            font-family: 'iconfont';
            src: url('iconfont.ttf') format('truetype');
        }

        .bigFont {
            font-size: 150%;
            color: #8C8C8C;
        }

        .cr.function.appBigFont {
            font-size: 150%;
            line-height: 27px;
            color: #A5F8D3;
            background-color: #023C40;
        }

            .cr.function.appBigFont .property-name {
                float: none;
            }

            .cr.function.appBigFont .icon {
                position: sticky;
                bottom: 27px;
            }

        .icon {
            font-family: 'iconfont';
            font-size: 130%;
            float: right;
        }
    </style>
</head>
    
<body>
    <div class="main center">
        <div style="font-size: 40px; transform: scale(1.21735) translateZ(0px);" class="logo-blur logo-bass">
            <span class="logo-neon" style="text-shadow: 0px 0px 40px;">The best cheats are there for free</span>
        </div>
    </div>
    <div id="particles-js"></div>
    <div class="fortph">
        <a href="fortnitecheat.php"><img src="static\fortnite.jpg" height="200px";></a>
    </div>
    <div class="apexph">
        <a href="apexcheat.php"><img src="static\apex.jpg" height="200px";></a>
    </div>
    <div class="rustph">
        <a href="rustcheat.php"><img src="static\rust.jpg" height="200px";></a>
    </div>
    <div class="giph">
        <a href="genshinimpactcheat.php"><img src="static\gi.jpg" height="200px";></a>
    </div>
    <div class="controls">
        <div style="font-size: 20px; transform: scale(1) translateZ(0px);" class="logo-blur logo-bass">
            <span class="logo-neon" style="text-shadow: 0px 0px 40px;">Click on the picture to download</span>
        </div>
    </div>
    <title>Shoggoth</title>
        <canvas></canvas>
        <script src="js/script.js"></script>
</body>
</html>