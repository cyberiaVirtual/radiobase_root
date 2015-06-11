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
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Control de Unidades en Servicio</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p><div class="form-group"><?php e($form->input('Operadores.id_movil',array('type'=>'text','label'=>'Numero de Movil','class'=>'form-control',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Buscar por Numero de Movil (alt+shift+b)')));?></div></p>
  </div>
</div>

<?php e($form->end());?>

<div id ="divpase_de_lista"><?php include('show_units_on_duty.ctp');?></div>
<!-- make the full data show -->