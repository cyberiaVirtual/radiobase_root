<?php

e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Operadores",
                    "update"=>"divpase_de_lista",
                    "url"=>array("controller"=>'UnidadesEnServicios',"action"=>"searchOperadores"),
			            )
                   )
             )
 );
?>
<?php //ControlDeUnidadesEnServicio ?>

<div id="action_menu">
  <ul>
  <li class='action_menu'>Control de Unidades en Servicio</li>
  &nbsp;&nbsp;
  <li class='action_menu'><?php e(date('Y-M-d'));?></li>
  </ul>
</div>

<table id='menu_info'>
  <tr />
    <td id="label" /><?php e($form->label('Operadores.id_movil','Numero de Movil',array('accesskey'=>'B')));?>
<!--     <td /><label>ID</label> -->
    <td colspan="2"/>
      <?php e($form->input('Operadores.id_movil',array('type'=>'text','label'=>false,'class'=>'in_buscar',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Buscar por Numero de Movil (alt+shift+b)')));?>
</table>
<?php e($form->end());?>

<div id ="divpase_de_lista"><?php include('show_units_on_duty.ctp');?></div>
<!-- make the full data show -->