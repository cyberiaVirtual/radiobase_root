<?php
  e($ajax->observeField('PhonesIdCalle',
			      array("url"=>array("controller"=>"ServiciosTelefonicos",
						 "action"=>"NoStreet"
						),
				    "update" => "divNoStreet"
				   )
		       )
   );
?>

<div id="divNoStreet">

    <?php
	  e($form->input('Phones.id_calle',
			  array("label"=>false,
				"type"=>"select",
				"options"=>$Calles,
				"empty"=>"Seleccionar Calle"
			       )
			)
	   );

    ?>
</div>
