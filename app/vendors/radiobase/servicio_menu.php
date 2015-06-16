<?php ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Resultados</h3>
  </div>
  <div class="panel-body">
      <div class="table-responsive">
<table id="menu_info" class="table table-striped table-bordered table-hover table-condensed">
    <thead>
  <th />ID
  <th colspan="4"/>Unidades En Servicio
  <th />Lista
  <th colspan='6'/>Fuera de Momento
  <th colspan='6'/>En Servicio Nuevamente
  <th colspan='4' />Cambio de Canal
  <tr />
    <td />Mov
<!--     under Unidades En Servicio -->
    <td />Unidad
    <td />Nombre
    <td />Inicio
    <td />Fin

    <td /><center>P</center>
    <?php 
      for($i=0;$i<=11;$i++){
	e('<td />Hora');
      }
    ?>
    <?php 
      for($i=0;$i<=2;$i++){
	e('<td />Uni');
      }
    ?>
    <td />C/U
</thead

<!--     code of the form..... -->
<!-- </table> -->

</div>
  </div>
</div>
