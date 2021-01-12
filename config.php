<?php 

$db_user = 'hah too private to put here';
$db_pass = 'hah too private to put here';
$db_name = 'hah too private to put here';
$db_serv = 'hah too private to put here';
$db_char = 'hah too private to put here';

$db = new PDO('mysql:host='.$db_serv.';dbname='.$db_name.';charset='.$db_char, $db_user, $db_pass);

//set some atributes
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

define('APP_NAME', 'PHP REST API TUTORIAL');

 ?>