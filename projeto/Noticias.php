<?php
error_reporting(E_ALL);
session_start();

    //redirecionar para pagina de login
    include_once 'admin/cof/cfg.php';
    include_once 'template.php';

    $link= mysql_connect($_cfg['mySv'],$_cfg['myUser'], $_cfg['mypw']) or die('0correu o seguinte erro a ligar á base de dados:<br> ');
    mysql_select_db($_cfg ['myBD'],$link);
//----------------------------------  
$sql = 'select * from Noticias';
$query = mysql_query($sql);

 //-------------------------------------------
$tplM= str_replace("_Conteudo_", 'noticia drdfd', $tplM);
?>

