<?php
include_once 'valida.php';
include_once'template.php';
$tplC = file_get_contents("template/conteudo.tpl");
$conteudo= str_replace("_Title_", "Menu", $tplC);

if(isset($_POST['Nome'])){
   $dados = 'Nome:'.$_POST['Nome'].'<br>';
   $dados .= 'Morada:'.$_POST['Morada'].'<br>';
   $dados .= 'Sexo:'.((isset($_POST['Sexo']))?'Masculino':'Feminino').'<br>';
   $dados .= 'Idade'.$_POST['Idade'].'<br>';
   $conteudo= str_replace("_Conteudo_", $dados, $conteudo);
}else{
   $conteudo= str_replace("_Conteudo_", file_get_contents('template/form.tpl'), $conteudo);
}

$tplM = str_replace("_Conteudo_", $conteudo, $tplM);



print $tplM;
?>