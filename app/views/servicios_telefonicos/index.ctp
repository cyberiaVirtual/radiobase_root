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
<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title">Bit&aacute;cora de Servicios Telef&oacute;nicos</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p>
        <div class="form-group">
          <?php e($form->input('Phones.data',
                    array('type'=>'text',
                          'label'=>'Crear Registro',
                          'class'=>'form-control',
                          "onKeyPress"=>"return soloNumeros(event)",
                          'placeholder'=>'Crear registro => Ingresa Numero de Telefono o Numero de Movil separados por un punto (alt+shift+b)')));?>
        </div>
     </p>
  </div>
</div>

<?php e($form->end());?>
    <div id='divPhoneServices'><?php include('show_phone_services.ctp');?></div>

