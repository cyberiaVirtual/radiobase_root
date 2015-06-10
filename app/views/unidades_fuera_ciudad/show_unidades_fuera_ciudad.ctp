<?php //ShowUnidadesFueraCiudad ?>

    <?php if(!empty($unidades)){
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"UnidadesFueraCiudad",
				     "update"=>"divEditUnit",
				     "url"=>array("controller"=>'UnidadesFueraCiudad',
						  "action"=>"EditUnit"
					    ),
			            )
                   )
             )
 );
?>
<table id="menu_info">
    <tr />
      <th />Movil
      <th />Destino
      <th />Tipo de Servicio
      <th />Salida
      <th />Llegada
      <th />Mon
      <th />Borrar
    <?php foreach($unidades as $key => $value){?>
    <tr />
      <td /><?php e($unidades[$key]['UnidadesFueraCiudad']['id_movil']);?>
      <td /><?php e($localidades[$unidades[$key]['UnidadesFueraCiudad']['id_localidad']]);?>
      <td /><?php e($unidades[$key]['UnidadesFueraCiudad']['tpo_servicio']);?>
      <td /><?php e($unidades[$key]['UnidadesFueraCiudad']['hora_salida']);?>
      <div id="divEditUnit">
      <td id="update" /><span>
	<?php
       	    e($form->input("UnidadesFueraCiudad.$key.id",										array('type'=>'hidden',
						  'label'=>false,
						  'value'=>$unidades[$key]['UnidadesFueraCiudad']['id']
						 )
			   )
	      );
    	    e($form->input("UnidadesFueraCiudad.$key.hora_llegada",								array('type'=>'text',
						  'label'=>false,
						  'value'=>$unidades[$key]['UnidadesFueraCiudad']['hora_llegada']
				     )
			      )
		 );
        ?>
	    </span>
      <td id="update" /><span>
	<?php
	    e($form->input("UnidadesFueraCiudad.$key.mom_r",									array('type'=>'checkbox',
						  'label'=>false,
						  'checked'=>$unidades[$key]['UnidadesFueraCiudad']['mom_r']
						 )
			  )
	     );
	?>
	    </span>
      </div>
      <td /><?php echo $this->Html->link('Borrar', array('action' => 'delete', $unidades[$key]['UnidadesFueraCiudad']['id']), null, 'Estas seguro?' );?>
    <?php } //end foreach?>

</table>
<?php
	e($form->submit('Actualizar'));
	e($form->end());
	e('<br /><br />');
    }else{
	e('<div id="warning"> Aun no existen Registros </div>');
      }
?>

