<?php
$tplM = file_get_contents("template/main2.tpl");
$tplMenu = file_get_contents("template.php");
$tplC= file_get_contents("template/conteudo2.tpl");

$conteudo1 =  str_replace("_Title_","Empresa imobliaria ",$tplC);
$conteudo1 = str_replace("_Conteudo_", "informacoes sobre a empresa", $conteudo1);

$tplM= str_replace("_Menu_",$conteudo1,$tplM);
print $tplM;
?>
