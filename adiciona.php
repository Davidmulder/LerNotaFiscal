<?php require_once('includes/topo.php'); ?>

<br>
    
<form class="row g-3"enctype="multipart/form-data" action="gravarxml.php" method="POST">
  
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">ARQUVIO XML</label>
    <div class="input-group">      
      <input class="form-control" type="file" id="xml" name="xml">
    </div>
  </div>
  
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar </button>
  </div>
</form>

</body>
</html>