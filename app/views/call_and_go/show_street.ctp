<?php
  e($ajax->observeField('PhonesIdCalle',
			      array("url"=>array("controller"=>"CallAndGo",
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
                'class'=>'form-control',
				"options"=>$Calles,
				"empty"=>"Seleccionar Calle"
			       )
			)
	   );

    ?>
</div>
