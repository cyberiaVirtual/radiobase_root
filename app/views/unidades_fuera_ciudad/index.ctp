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

<div id="action_menu">
<ul>
<li class='action_menu'>Unidades Fuera de la Ciudad</li>
&nbsp;&nbsp;
<li class='action_menu'><?php e(date('Y-M-d'));?></li>
</ul>
</div>
<table id="menu_info">
<tr />
<td id="label" />
    <?php
	e($form->label('UnidadesFueraCiudad.data',
		       'Buscar Unidad',
		       array('accesskey'=>'B'
		       )
		      )
	  );
    ?>
<td />
    <?php
	e($form->input('UnidadesFueraCiudad.data',
			array('type'=>'text',
			      'label'=>false,
			      'class'=>'in_buscar',
			      "onKeyPress"=>"return soloNumeros(event)",
			      'placeholder'=>'Buscar registro => Ingresa Numero de Unidad (alt+shift+b)'
			     )
		      )
	  );
    ?>

</table>

<?php e($form->end());?>
<div id='divUnidades'><?php include('show_unidades_fuera_ciudad.ctp');?></div>

