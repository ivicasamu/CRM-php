<?php

$naslovAPP = "AVinstal CRM";
$tvrtka = "AVinstal d.o.o.";


$putanjaAPP = "/avinstal_crm/";
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "db_avinstal_crm";



foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($connection,"utf8");

?>