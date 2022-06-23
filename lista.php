<?php require_once('conn/inc_admin.php'); ?>

<?php require_once('includes/topo.php'); ?>

<?php

$query=LISTAGEM();
$row = mysqli_fetch_assoc($query);
?>

<h1>Listagem de Notas</h1>



<p>
<button type="button" class="btn btn-primary" onclick="window.location.href='adiciona.php' "  >Adicionar Nota</button>

<div >

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOTA FISCAL</th>
      <th scope="col">TIPO</th>
      <th scope="col">Data</th>
      <th scope="col">Valor</th>
      <th scope="col">Destinatario</th>
      <th scope="col">Arquivo XML</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
  <?php do { ?>
    <tr>
      <th scope="row"><?php  echo $row['Id'];  ?></th>
      <td><?php  echo $row['NotaFiscal'];  ?></td>
      <td><?php  echo $row['Procotolo'];  ?></td>
      <td><?php  echo $row['Data'];  ?></td>
      <td><?php  echo $row['Valor'];  ?></td>
      <td><?php  echo $row['Loja'];  ?></td>
      <td><?php  echo $row['Arquivo'];  ?></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='visualizarxml.php?v=<?php  echo $row['Arquivo'];  ?>' "  >Visualizar</button></td>
    </tr>
    <?php 
	 } while ($row = mysqli_fetch_assoc($query));
    ?>
  </tbody>
</table>
</div>
  
  
  </body>
</html>