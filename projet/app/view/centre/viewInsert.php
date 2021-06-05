
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
    ?> 


    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='centreCreated'>        
        <label for="label">Label : </label><input type="text" name='label' size='75' value='Descente' class="form-control" style="width: 200px">                           
        <label for="adresse">adresse : </label><input type="text" name='adresse' value='DropKick' class="form-control" style="width: 200px">              
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Ajouter le centre</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewInsert -->



