<?php
$db['db_host'] = '185.98.131.176';
$db['db_user'] = "genie1829577_12bkj";
$db["db_pass"] = "Dwwm2022@1984";
$db['db_name'] = "genie1829577_12bkj";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$query = "SET NAMES utf8";
mysqli_query($connexion,$query);
// if($connexion){
//     echo "Vous êtes connectés";
// }else{
//     echo "Vous n'êtes pas connectés";
// }
?>