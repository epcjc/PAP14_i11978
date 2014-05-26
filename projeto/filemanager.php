<?php
include_once 'valida.php';
include_once'template.php';
$tplCL = file_get_contents("template/linha_fxmgr.tpl");
$tplC = "";
$dir = dirname(__FILE__)."/upl/";
clearstatcache();


if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'del' : unlink($dir.'/'.$_GET['name']); break;
        default :break;
    }
}


//Open a Know directory and proceed to read it´s contents

if(is_dir($dir)){
    if($dh = opendir($dir)) {
        while(($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {
             $ll = str_replace("#nome", $file, $tplCL);
             $ll = str_replace("#url", $dir.'/'.$file , $ll);
             $ll = str_replace("#ops","<a href = 'filemanager.php?op=del&name=$file'>Remover</a>",$ll);
             $tplC .= $ll ;
             } 
        }
        closedir($dh);
        $tplC = str_replace("#lista",$tplC,  file_get_contents("template/fxmgr.tpl"));
     
    }
}


$tplM = str_replace("_Conteudo_", $tplC, $tplM);


print $tplM;

?>
