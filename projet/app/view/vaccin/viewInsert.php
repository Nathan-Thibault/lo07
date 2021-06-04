
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
        <input type="hidden" name='action' value='vaccinCreated'>        
        <label for="cru">Label : </label><input type="text" name='label' size='75' value='Goudal'>                           
        <label for="annee">doses : </label><input type="number" name='doses' value='3'>              
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Ajouter le vaccin</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewInsert -->



