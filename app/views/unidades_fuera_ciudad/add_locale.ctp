<?php
//     AddLocale
// var_dump($NoLocale);
?> 
<td />
    <?php
	if(!empty($NoLocale)){
	  e($form->input('Localidades.localidad',
				    array("label"=>false,
					  "type"=>"text"
					 )
			)
	    );
	}else{
	  e($form->input('UnidadesFueraCiudad.id_localidad',
				    array("label"=>false,
					  "type"=>"select",
					  'options'=>$localidades,
					  'selected'=>$id_localidad
					 )
			)
	    );
	}
    ?>