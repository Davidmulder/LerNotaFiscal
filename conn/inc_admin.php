<?php 
global $MySQL; //Torna a vari�vel acess�vel em todas as fun��es
function MyCONN(){ //faz a conex�o com o servidor 
	$hostname_conexao = "localhost";

$database_conexao = "testephp";

$username_conexao = "root";

$password_conexao = "root";

ob_start();
$conexao=mysqli_connect ($hostname_conexao, $username_conexao, $password_conexao,$database_conexao) or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ($database_conexao);
return $conexao;
};









function LISTAGEM() {

$conexao=MyCONN();
$query_busca = "select * from nota ";
$vlog= mysqli_query($conexao,$query_busca) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysqli_num_rows($vlog);
$row_vlog = mysqli_fetch_assoc($vlog);
return $row_vlog;

}


function GRAVAR($CNPJ,$Arquivo,$Procotolo,$NotaFiscal,$Loja,$Email,$Prod,$Valor,$Data) {

$conexao=MyCONN();
$query_busca = "insert into nota(CNPJ,Arquivo,Procotolo,NotaFiscal,Loja,Email,Prod,Valor,Data) values ( '$CNPJ','$Arquivo','$Procotolo','$NotaFiscal','$Loja','$Email','$Prod','$Valor','$Data'); ";
$vlog= mysqli_query($conexao,$query_busca) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysqli_num_rows($vlog);
$row_vlog = mysqli_fetch_assoc($vlog);
return $row_vlog;

}


function DELFOTO($id) {

$conexao=MyCONN();
$query_busca = "delete  from bd_imagem 
                where id = '$id' ";
$vlog= mysqli_query($conexao,$query_busca) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysqli_num_rows($vlog);
$row_vlog = mysqli_fetch_assoc($vlog);
return $row_vlog;

}


function GETDATA($data) {
 $exp= explode("/",$data); 
$day=$exp[0];
$mes=$exp[1];
$ano=$exp[2];
$DATA=$ano."/".$mes."/".$day ;
return $DATA;
}

function NORMALDATA($data) {
 $exp= explode("-",$data); 
$day=$exp[2];
$mes=$exp[1];
$ano=$exp[0];
$DATANORMAL=$day."/".$mes."/".$ano;
return $DATANORMAL;
}




?>