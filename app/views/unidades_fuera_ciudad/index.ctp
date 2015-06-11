<?php //index -> UnidadesFueraCiudad ?>
<?php
    e($ajax->form(array("type"=>"post",
			"options"=>array("model"=>"UnidadesFueraCiudad",
					 "update"=>"divUnidades",
					 "url"=>array("controller"=>'UnidadesFueraCiudad',
					 "action"=>"SearchUnidades"),
					)
			)
		 )
     );
?>

<?php //Edit Call and Go ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Unidades Fuera de la Ciudad</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p><div class="form-group"><?php
	e($form->input('UnidadesFueraCiudad.data',
			array('type'=>'text',
			      'label'=>'Buscar Unidad',
			      'class'=>'form-control',
			      "onKeyPress"=>"return soloNumeros(event)",
			      'placeholder'=>'Buscar registro => Ingresa Numero de Unidad (alt+shift+b)'
			     )
		      )
	  );
  
    ?></div></p>
  </div>
</div>


<?php e($form->end());?>
<div id='divUnidades'><?php include('show_unidades_fuera_ciudad.ctp');?></div>

