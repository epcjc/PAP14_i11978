<?php
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['username'])||!isset($_SESSION['admin'])){
    //redirecionar para pagina de login
    include_once 'admin/cof/cfg.php';
    include_once 'template.php';
    $tplM= str_replace("_Conteudo_", file_get_contents('template/login.tpl'), $tplM);
    $link= mysql_connect($_cfg['mySv'],$_cfg['myUser'], $_cfg['mypw']) or die('0correu o seguinte erro a ligar á base de dados:<br> ');
    mysql_select_db($_cfg ['myBD'],$link);
    if(isset($_POST['nome']) && isset($_POST['password'])){
        $res = mysql_query('select admin from utilizador where username=\''.$_POST['nome'].'\' and pass=\''. sha1($_POST['password']).'\'',$link);
        if($res != null && mysql_num_rows($res)>0)
       {
           $tplM= str_replace("_Conteudo_", 'Bem Vindo!', $tplM);
           $_SESSION ['username'] = $_POST['Nome']; 
           $_SESSION['admin']= mysql_result($res, 0,'admin');
       } else {
           $tplM= str_replace("_Conteudo_", 'Utilizador ou chave inválida!' . mysql_error(), $tplM);
       }       
    }else{
       $tplM= str_replace("_Conteudo_", '', $tplM);
    }

    $tplM= str_replace("_Conteudo_", '', $tplM);

print $tplM;
} else {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    //echo "<script> window.location='index.php' </script>";
}
?>
