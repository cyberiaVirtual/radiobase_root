<?php //die(); ?>
<?php //pr($phones); ?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Phones",
                    "update"=>"divPhones",
                    "url"=>array("controller"=>'CallAndGo',"action"=>"SearchPhones"),
			            )
                   )
             )
 );
?>

<?php //Edit Call and Go ?>

<div id="action_menu">
  <ul>
  <li class='action_menu'>Telefonos Betados</li>
  &nbsp;&nbsp;
  <li class='action_menu'><?php e(date('Y-M-d'));?></li>
  </ul>
</div>
<table id="menu_info">
	<tr />
	  <td id="label" /><?php e($form->label('Phones.data','Edita Llama y cuelga',array('accesskey'=>'B')));?>
	  <td /><?php e($form->input('Phones.data',array('type'=>'text','label'=>false,'class'=>'in_phone',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Buscar registro => Ingresa Numero de Telefono (alt+shift+b)')));?>

</table>

<?php e($form->end());?>
    <div id='divPhones'><?php include('show_phones.ctp');?></div>
