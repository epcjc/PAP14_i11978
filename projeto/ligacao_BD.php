<?php

/* conexão à base de dados vendas*/
$mysql_id = mysql_connect('localhost', 'i11978', 'AbFiwus1');
mysql_select_db('i11978',$mysql_id );

if(!$mysql_id){ die('erro ao ligar à base de dados'.mysql_error());
}

if($mysql_id){
print('A ligação à base de dados foi efectuada com sucesso');
}


?>
