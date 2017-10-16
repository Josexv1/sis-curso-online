<?php
$date = new DateTime();
$to_date = $date->format('Y-m-d');
$date->modify('-7 days');
$from_date = $date->format('Y-m-d');
$password = '12345';
$salt     = str_replace('=', '.', base64_encode(mcrypt_create_iv(20)));
$password = hash('sha512', $password . $salt);
for ($round = 0; $round < 65536; $round++) {
    $password = hash('sha512', $password . $salt);
}
echo "<br>";
echo $salt;
echo "<br>";
echo $password;
