<?php
//     AddServicioA
  e($ajax->observeField('UnidadesFueraCiudadIdTpoServicioB',
    array("url"=>array("controller"=>"UnidadesFueraCiudad",
                       "action"=>"AddServicioB"
                       ),
          "update" => "divServicioB"
         )
  ));
?>
<?php
if(isset($NoService)){
    e($form->input('TpoServicio.tpo_servicio',
			array("label"=>false,
			      "type"=>"text"
			)
		  )
     );
}if( isset($Notext) && !isset($NoService) ){
    e($form->input('UnidadesFueraCiudad.id_tpo_servicio_a',
			array("label"=>false,
			      "type"=>"select",
			      'options'=>$TpoServicio,
			      'selected'=>$id_tpo_servicio
			)
		  )
    );
}elseif( isset($id_tpo_servicio) && !isset($NoService) && !isset($Notext) ){
    e($form->input('UnidadesFueraCiudad.id_tpo_servicio_a',
			array("label"=>false,
			      "type"=>"select",
			      'options'=>$TpoServicio,
			      'selected'=>$id_tpo_servicio
			)
		  )
    );
    e($form->input('UnidadesFueraCiudad.num_tpo_servicio_a',								    array('type'=>'text',
				      'label'=>false,
				      'placeholder'=>'Cantidad separados por punto',
				      'title'=>'Ingresa el numero de Ocupantes'
	  		        )
		  )
     );
?>
    <td />
      <div id="divServicioB">
	    <?php
		$count=count($TpoServicio);
		for($i=0 ; $i <= $count ; $i++){
		    if( ( $i === 1) OR ($i === 2) ){
			$TpoServicio_aux = $TpoServicio[$i];
		    }else{
			unset($TpoServicio[$i]);
		    }
		}
		e($form->input('UnidadesFueraCiudad.id_tpo_servicio_b',						array('type'=>'select',
				      'label'=>false,
				      'options'=>$TpoServicio,
				      'empty'=>'Servicio'
				     )
			      )
		 );
	    ?>
      </div>
<?php

}
?>
