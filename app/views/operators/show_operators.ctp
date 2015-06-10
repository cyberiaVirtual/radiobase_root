<?php //ShowOperators ?>
<table id="menu_info">
    <tr />
      <th />ID-Movil
      <th />ID-Economico
      <th />Nombre
      <th />Apellido Paterno
      <th />Apellido Materno
    <?php foreach($op as $key => $value){?>
    <tr />
      <td /><?php e($op[$key]['Operadores']['id_movil']);?>
      <td /><?php e($op[$key]['Operadores']['id_economico']);?>
      <td /><?php e($op[$key]['Operadores']['nombre']);?>
      <td /><?php e($op[$key]['Operadores']['ap_paterno']);?>
      <td /><?php e($op[$key]['Operadores']['ap_materno']);?>
    <?php } //end foreach?>
</table>
