<?php
//     AddLocale
// var_dump($NoLocale);
?> 
<td />
    <?php
	if(!empty($NoLocale)){
	  e($form->input('Localidades.localidad',
				    array("label"=>false,
					  "type"=>"text",
                      'class'=>'form-control'  
					 )
			)
	    );
	}else{
	  e($form->input('UnidadesFueraCiudad.id_localidad',
				    array("label"=>false,
					  "type"=>"select",
                      'class'=>'form-control',
					  'options'=>$localidades,
					  'selected'=>$id_localidad
					 )
			)
	    );
	}
    ?>