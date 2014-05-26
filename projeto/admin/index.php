<?php
$tpl = file_get_contents('html/main.html');
include_once'cof/cfg.php';
if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_nome'])){
    //login esta feito, apresenta menus
    
}else{
    //login por fazer
    $tpl = str_replace('_Menu_', '', $tpl);
    $tpl = str_replace('_Conteudo_', file_get_contents('template/loginadmin.tpl'), $tpl);
    
}
if(isset($_SESSION['admin_mensagem'])){
    //substitui msg
    $msg = $_SESSION['admin_mensagem'];
    $tpl = str_replace('_Mensagem_', $msg, $tpl);
}else{
    $tpl = str_replace('_Mensagem_', '', $tpl);
}

print $tpl;

?>
