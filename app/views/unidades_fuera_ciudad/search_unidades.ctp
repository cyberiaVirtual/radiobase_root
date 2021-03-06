<?php //SearchUnidades ?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"UnidadesFueraCiudad",
                    "update"=>"divAddUnit",
                    "url"=>array("controller"=>'UnidadesFueraCiudad',"action"=>"AddUnit"),
			            )
                   )
             )
 );
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Resultados</h3>
  </div>
    <div class="panel-body">

<div class="table-responsive">
<table id="menu_info" class="table table-striped table-bordered table-hover table-condensed">
<?php
if(!empty($UnidadesFueraCiudad)){
?>
    <thead>
    <tr />
      <th />Movil
      <th />Destino
      <th  />Tipo de Servicio
      <th />Salida
      <th />llegada
      <th />Mon
    <tr />
    </thead>
    <tbody>
       
      <td />
	    <?php
		e($UnidadesFueraCiudad['UnidadesEnServicio']['id_movil']);
		e($form->input('UnidadesFueraCiudad.id_movil',
                 array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$UnidadesFueraCiudad['UnidadesEnServicio']['id_movil']
				     )
			      )
		 );
	    ?>
	<!-- Observed field if need Add localidad-->
<?php
  e($ajax->observeField('UnidadesFueraCiudadIdLocalidad',
			    array("url"=>array("controller"=>"UnidadesFueraCiudad",
					       "action"=>"AddLocale"
					      ),
				  "update" => "divLocalidad"
				 )
			)
   );
?>
    <td />
	<div id="divLocalidad">
	    <?php
		e($form->input('UnidadesFueraCiudad.id_localidad',						
                array('type'=>'select',
                      'class'=>'form-control',
				      'label'=>false,
				      'options'=>$localidades,
				      'empty'=>'localidad'
				     )
			      )
		 );
	    ?>
	</div>
	<!-- Observed field if need Add localidad-->
<?php
  e($ajax->observeField('UnidadesFueraCiudadIdTpoServicioA',
    array("url"=>array("controller"=>"UnidadesFueraCiudad",
                       "action"=>"AddServicioA"
                       ),
          "update" => "divServicioA"
         )
  ));

?>
    <td  />
	<div id="divServicioA">

	    <?php
		e($form->input('UnidadesFueraCiudad.id_tpo_servicio_a',						
                array('type'=>'select',
                      'class'=>'form-control',
				      'label'=>false,
				      'options'=>$TpoServicio,
				      'empty'=>'Servicio'
				     )
			      )
		 );
	    ?>
    </div>
    <td />
	    <?php
		e($form->input('UnidadesFueraCiudad.hora_salida',						
                array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'placeholder'=>'Ingresa hora de Salida',
				      'value'=>date('H:i')
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('UnidadesFueraCiudad.hora_llegada',						
                array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false,
				      'placeholder'=>'Ingresa hora de llegada',
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('UnidadesFueraCiudad.mom_r',						
                array('type'=>'checkbox',
                      'class'=>'form-control',
				      'label'=>false,
				      'title'=>'option'
				     )
			      )
		 );
	    ?>
<?php
		e($form->input('UnidadesFueraCiudad.username',						
                array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$username
				     )
			      )
		 );
	    ?>
<?php
}// End if
?>
    </tbody>
</table>
</div>
<?php
e($form->submit('Agregar',array("class"=>"btn btn-info pull-right")));
?>
<?php
	
	e($form->end());
?>
    <br/><br/><br/>
<div id='divAddUnit'><?php include('show_unidades_fuera_ciudad.ctp');?></div>
  </div>
</div>