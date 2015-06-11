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

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Operadores</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p><div class="form-group"><?php e($form->input('Operadores.data',array('type'=>'text','label'=>'Edita/Agrega Operador','class'=>'form-control',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Buscar Operador => Ingresa Numero de Movil (alt+shift+b)')));?></div></p>
  </div>
</div>

<?php e($form->end());?>
    <div id='divOperators'><?php include('show_operators.ctp');?></div>
