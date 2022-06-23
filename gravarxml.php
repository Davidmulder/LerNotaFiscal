<?php require_once('conn/inc_admin.php'); ?>

<?php require_once('includes/topo.php'); ?>







    <?php


if ($_FILES['xml']['type'] != 'text/xml') { die("Somente arquivo xml");

    
    
}   


if ($_FILES['xml']['name']!= "")  {   // enviar para pasta 

  $d=$_SERVER['DOCUMENT_ROOT'];
$dir= "$d/xml/";

@copy($_FILES['xml']['tmp_name'] ,$dir.$_FILES['xml']['name'])   or die("Caminho do Arquivo Invalido.");


// ler xml


$xml=simplexml_load_file($dir.$_FILES['xml']['name']) or die("Error: Cannot create object");


if (!$xml) {
    echo "Erro ao abrir arquivo!";
    exit;
} 
//echo '<pre>';
//print_r($xml);
    
$attributes = $xml->attributes(); 

//$Id= ((array)$children->infNFe->attributes);
//$Id= strval($attributes['Id']);


$children = $xml->children();


$emit= ((array)$children->infNFe->emit); 


if(isset($children->infNFe)) {

   // echo "S NFe"."<br>";
    $emit= ((array)$children->infNFe->emit);
    $ide=((array)$children->infNFe->ide);
    $dest=((array)$children->infNFe->dest);
    $prod=((array)$children->infNFe->det->prod); 
    $END=((array)$children->infNFe->dest->enderDest); 


 } else{

    //echo "C NFe "."<br>";
    $emit= ((array)$children->NFe->infNFe->emit); 
    $ide=((array)$children->NFe->infNFe->ide);
    $dest=((array)$children->NFe->infNFe->dest);
    $prod=((array)$children->NFe->infNFe->det->prod);
    $END=((array)$children->NFe->infNFe->dest->enderDest); 
    
   
}







if(isset($children->protNFe->infProt)) {

    $autorizacao=((array)$children->protNFe->infProt);

}else{
   
    $autorizacao['nProt'] = "--"; 

    echo "<script type ='text/JavaScript'>";  
  echo "alert('Sistemas não validado <nProt> não preenchido')";  
  echo "</script>";

  echo "<script>
document.location.href='adiciona.php';
</script>";
  
}


$Arquivo=$_FILES['xml']['name'];


//echo "<h2>Arquivo ".$Arquivo."</h2>";

//echo "<h2>------Dados da nota fiscal------</h2> <br>";

//echo $ide['cNF']. "<br>";
//echo $ide['dhEmi']. "<br>";
$Procotolo=$ide['natOp'];   
$NotaFiscal=$ide['cNF'];
$Data= $ide['dhEmi'];

//echo "<h2>------Remetente------</h2>";

//echo $emit['CNPJ']."<br>";
//echo $emit['xNome']."<br>";

$CNPJ=$emit['CNPJ'];


//echo "<h2>-----Destinatario-------</h2>";
//echo $dest['xNome']."<br>";
if(isset ($dest['email'])){ $Email=$dest['email']; } else{ $Email = "Sem Email";}

$Loja=$dest['xNome'];
//echo $Email;

//echo "<h2>-----produto-------</h2>";
//echo $prod['xProd']."<br>";
//echo $prod['vProd']."<br>";

$Prod=$prod['xProd'];
$Valor=$prod['vProd'];

//echo "-----------<br>";

//echo $autorizacao['nProt']."<br>";






}
?>









<div class="my-3 p-3 bg-body rounded shadow-sm">

<h6 class="border-bottom pb-2 mb-0">Nº <?=$NotaFiscal?>  (<?=$Arquivo?>) Data:  <?=$ide['dhEmi']?>   </h6>

<div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">Remetente</strong>
        <?=$emit['CNPJ']?><br>
        Nome : <?=$emit['xNome']?> <br>
      </p>
    </div>

    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">Destinatario</strong>
        Nome: <?=$dest['xNome']?><br>
        Email: <?=$Email?><br>
        END <?=$END['xLgr']?>  nº:<?=$END['nro']?> UF: <?=$END['UF']?> MUN: <?=$END['cMun']?>   BAIRRO: <?=$END['xBairro']?>   CEP <?=$END['CEP']?>
      </p>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">Produto</strong>
        <?=$prod['xProd']?><br>
        Valor: <?=$prod['vProd']?> <br>
      </p>
    </div>
     AUTORIZAÇÃO : <?=$autorizacao['nProt']?>
  </div>

  
</div>

<?php



if($emit['CNPJ']!="09066241000884"){    


  echo "<script type ='text/JavaScript'>";  
  echo "alert('Arquivo não autorizado para uploads')";  
  echo "</script>";
  $err=1;
// unlink($dir.$_FILES['xml']['name']);
echo "<script>
document.location.href='adiciona.php';
</script>";

}


$ADD=GRAVAR($CNPJ,$Arquivo,$Procotolo,$NotaFiscal,$Loja,$Email,$Prod,$Valor,$Data);

?>







<button type="button" class="btn btn-primary" onclick="window.location.href='adiciona.php' "  >Adicionar Nota</button>

<button type="button" class="btn btn-danger" onclick="window.location.href='lista.php' "  >Voltar</button>
</body>
</html>