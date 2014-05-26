<?php
include_once 'cof/cfg.php';

if(!isset($_SESSION['admin_nome']) || !isset($_SESSION['admin_id'])){
    //redirecionar para pagina de login
    
  
    $link= mysql_connect($_cfg['mySv'],$_cfg['myUser'], $_cfg['mypw']) or die('0correu o seguinte erro a ligar á base de dados:<br> ');
    mysql_select_db($_cfg ['myBD'],$link);
    if(isset($_POST['nome']) && isset($_POST['password'])){
        $res = mysql_query('select * from utlizadores where username=\''.$_POST['nome'].'\'and pass=\''. sha1($_POST['password'].'\;'),$link);
        if($res != null && mysql_num_rows($res)>0)
       {
           while($result = mysql_fetch_assoc($res)){
               $_SESSION['admin_nome'] = $result['username'];
               $_SESSION['admin_id'] = $result['id_utilizador'];
               $_SESSION['admin_mensagem'] = 'bem-vindo';
           }
           
       } else {
           $_SESSION['admin_mensagem'] = 'Nome ou pass errados';
       }       
    
        } 

       }
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SEFT']),'/\\');
    $extra = 'si/admin/index.php';
    header("Location: http://$host$uri/$extra");
    //echo "<script> window.location='index.php' </script>";
?>