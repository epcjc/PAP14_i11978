
<!DOCTYPE html>
<html>
<head>
<style>

{
float:left;
width:100%;
padding:0;
margin:0;
list-style-type:none;
}
a
{
float:left;
width:6em;
text-decoration:none;
color:white;
background-color:#0000CD;
padding:0.2em 0.6em;
border-right:1px solid white;
}
a:hover {background-color:#4876FF;}
li {display:inline;}
</style>
</head>


<body>

    
</body>
</html>


<?php
$tplM = file_get_contents("template/main.tpl");
$tplMenu = file_get_contents("template/menu.tpl");

$menuItems = array(
    'index2.php' => 'Empresa imobliaria ',
    'index.php' => 'Principal',
    'upload.php' => 'Upload',
    'filemanager.php' => 'File Manager',
    'galeria.php' => 'Galeria',
    'login.php' => 'Login',
    'ligacao_BD.php'=> 'base dados',
    'Noticias.php'=>'Noticias',
    'logout.php' => 'Sair',);

$menu="";
foreach ($menuItems as $key => $value) {
    $tmp = str_replace("_URL_", $key, $tplMenu);
    $tmp = str_replace("_Nome_", $value, $tmp);
    $menu .=$tmp;
}
$tplM = str_replace("_Menu_", $menu, $tplM);

?>

