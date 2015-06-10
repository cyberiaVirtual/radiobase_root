<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Phones",
                    "update"=>"divPhoneServices",
                    "url"=>array("controller"=>'ServiciosTelefonicos',"action"=>"SearchPhone"),
			            )
                   )
             )
 );
?>

<?php //Bitacora de Servicios Telefonicos ?>

<div id="action_menu">
  <ul>
  <li class='action_menu'>Bit&aacute;cora de Servicios Telefonicos</li>
  &nbsp;&nbsp;
  <li class='action_menu'><?php e(date('Y-M-d'));?></li>
  </ul>
</div>

<table id="menu_info">
	<tr />
	  <td id="label" /><?php e($form->label('Phones.data','Crear Registro Nuevo',array('accesskey'=>'B')));?>
	  <td /><?php e($form->input('Phones.data',array('type'=>'text','label'=>false,'class'=>'in_phone',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Crear registro => Ingresa Numero de Telefono o Numero de Movil separados por un punto (alt+shift+b)')));?>
	
</table>
<?php e($form->end());?>
    <div id='divPhoneServices'><?php include('show_phone_services.ctp');?></div>

