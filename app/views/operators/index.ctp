<?php //operators ?> 
<?php //die(); ?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Operators",
                    "update"=>"divOperators",
                    "url"=>array("controller"=>'Operators',"action"=>"SearchOperator"),
			            )
                   )
             )
 );
?>
<?php //Edit Operadores ?>

<div id="action_menu">
  <ul>
  <li class='action_menu'>Operadores</li>
  &nbsp;&nbsp;
  <li class='action_menu'><?php e(date('Y-M-d'));?></li>
  </ul>
</div>

<table id="menu_info">
	<tr />
	  <td id="label" /><?php e($form->label('Operadores.data','Edita/Agrega Operador',array('accesskey'=>'B')));?>
	  <td /><?php e($form->input('Operadores.data',array('type'=>'text','label'=>false,'class'=>'in_buscar',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Buscar Operador => Ingresa Numero de Movil (alt+shift+b)')));?>

</table>
<?php e($form->end());?>
    <div id='divOperators'><?php include('show_operators.ctp');?></div>
