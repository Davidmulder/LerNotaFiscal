<?php
$xml=simplexml_load_file("xml/649646464646.xml") or die("Error: Cannot create object");


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

    echo "S NFe"."<br>";
    $emit= ((array)$children->infNFe->emit);
    $ide=((array)$children->infNFe->ide);
    $dest=((array)$children->infNFe->dest);
    $prod=((array)$children->infNFe->det->prod); 
    


 } else{

    echo "C NFe "."<br>";
    $emit= ((array)$children->NFe->infNFe->emit); 
    $ide=((array)$children->NFe->infNFe->ide);
    $dest=((array)$children->NFe->infNFe->dest);
    $prod=((array)$children->NFe->infNFe->det->prod);
    
   
}


echo $emit['CNPJ']."<br>";

if($emit['CNPJ']!="09066241000884"){

    echo "Arquivo não autorizado para uploads<br>"; 

  //  unlink("xml/31200803616814000305550040004918211087789127.xml");

}



if(isset($children->protNFe->infProt)) {

    $autorizacao=((array)$children->protNFe->infProt);

}else{
   
    $autorizacao['nProt'] = "Sistemas não validado <nProt> não preenchido";
}









echo "<p>------Dados da nota fiscal------<br>";

echo $ide['cNF']. "<br>";
echo $ide['dhEmi']. "<br>";

echo "------Remetente------<br>";

echo $emit['CNPJ']."<br>";
echo $emit['xNome']."<br>";

echo "-----Destinatario-------<br>";
echo $dest['xNome']."<br>";
if(isset ($dest['email'])){ echo $dest['email']."<br>"; }

echo "-----produto-------<br>";
echo $prod['xProd']."<br>";
echo $prod['vProd']."<br>";

echo "-----------<br>";

echo $autorizacao['nProt']."<br>";

?>