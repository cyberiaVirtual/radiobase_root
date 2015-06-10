<?php //die(); ?> 
<?php if(count($ServiciosTelefonicos) > 0 ){?>
<table id="menu_info">
    <tr />
      <th />ID
      <th />ID-Movil
      <th />ID-Economico
      <th />Calle
      <th />N&uacute;mero
      <th />Telefono
      <th />Hora
    <?php $idx = 1;?>
    <?php foreach($ServiciosTelefonicos as $key => $value){?>
    <tr />
      <td /><?php e($idx++);?>
      <td /><?php e($ServiciosTelefonicos[$key]['ServiciosTelefonicos']['id_movil']);?>
      <td /><?php e($ServiciosTelefonicos[$key]['ServiciosTelefonicos']['id_economico']);?>
      <td /><?php e($ServiciosTelefonicos[$key]['ServiciosTelefonicos']['calle']);?>
      <td /><?php e($ServiciosTelefonicos[$key]['ServiciosTelefonicos']['numero']);?>
      <td /><?php e($ServiciosTelefonicos[$key]['ServiciosTelefonicos']['telefono']);?>
      <td /><?php e($ServiciosTelefonicos[$key]['ServiciosTelefonicos']['hora']);?>
    <?php }?>
</table>
<?php } ?>