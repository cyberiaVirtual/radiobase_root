<?php //SearchOperator.ctp ?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Operadores",
                    "update"=>"divOperators",
                    "url"=>array("controller"=>'Operators',"action"=>"EditOperators"),
			            )
                   )
             )
 );
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Actualizar Datos</h3>
  </div>
    <div class="panel-body">
<div class="table-responsive">
<table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr />
	<th />ID-Movil
	<th />ID-Economico
	<th />Nombre
	<th />Apellido Paterno
	<th />Apellido Materno
    </thead>
    <tbody>
    <tr />
	    <?php
		e($form->input('Operadores.id',
				array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$operador['Operadores']['id']
				     )
			      )
		 );
	    ?>
	<td />
	    <?php
	    if(!empty($select)){
		e($form->input('Operadores.id_movil',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'readonly'=>true,
				     'value'=>$operador['Operadores']['id_movil']
				     )
			      )
		 );
	    }else{
		e($form->input('Operadores.id_movil',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'value'=>$movil
				     )
			      )
		 );
	    }
	    ?>

	<td />
	    <?php
		e($form->input('Operadores.id_economico',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'value'=>$operador['Operadores']['id_economico']
				     )
			      )
		 );
	    ?>
	<td />
	    <?php
		e($form->input('Operadores.nombre',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'value'=>$operador['Operadores']['nombre']
				     )
			      )
		 );
	    ?>
	<td />
	    <?php
		e($form->input('Operadores.ap_paterno',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'value'=>$operador['Operadores']['ap_paterno']
				     )
			      )
		 );
	    ?>
	<td />
	    <?php
		e($form->input('Operadores.ap_materno',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'value'=>$operador['Operadores']['ap_materno']
				     )
			      )
		 );
	    ?>
    </tbody>
</table>

<?php
	e($form->submit('Actualizar',array("class"=>"btn btn-info pull-right")));
	e($form->end());
    
?>
    <br/><br/><br/>
<div id='divOperators'><?php include('show_operators.ctp');?></div>
 </div>
</div>
</div>