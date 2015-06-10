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
<table id="menu_info">
    <tr />
	<th />ID-Movil
	<th />ID-Economico
	<th />Nombre
	<th />Apellido Paterno
	<th />Apellido Materno
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
				      'label'=>false,
				      'readonly'=>true,
				     'value'=>$operador['Operadores']['id_movil']
				     )
			      )
		 );
	    }else{
		e($form->input('Operadores.id_movil',
				array('type'=>'text',
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
				      'label'=>false,
				      'value'=>$operador['Operadores']['ap_materno']
				     )
			      )
		 );
	    ?>
</table>

<?php
	e($form->submit('Actualizar'));
	e($form->end());
?>
<div id='divOperators'><?php include('show_operators.ctp');?></div>