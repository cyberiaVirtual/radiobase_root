<?php //ShowOperators ?>
<table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr />
          <th />ID-Movil
          <th />ID-Economico
          <th />Nombre
          <th />Apellido Paterno
          <th />Apellido Materno
    </thead>
    <tbody>
        <?php foreach($op as $key => $value){?>
        <tr />
          <td /><?php e($op[$key]['Operadores']['id_movil']);?>
          <td /><?php e($op[$key]['Operadores']['id_economico']);?>
          <td /><?php e($op[$key]['Operadores']['nombre']);?>
          <td /><?php e($op[$key]['Operadores']['ap_paterno']);?>
          <td /><?php e($op[$key]['Operadores']['ap_materno']);?>
        <?php } //end foreach?>
    </tbody>
</table>
