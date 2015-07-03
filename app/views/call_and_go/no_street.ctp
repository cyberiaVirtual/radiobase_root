<?php
// pr($nostreet);
// pr($opt);
    if(!empty($nostreet)){

	  e($form->input('Phones.id_calle',
			    array("label"=>false,
                      "type"=>'select',
                      'class'=>'form-control',
				      'options'=>$opt,
				      'selected'=>$nostreet['Calles']['id_calle']
				 )
			)
	    );
	  e($form->input('Phones.id_colonia',
			    array("label"=>false,
				  "type"=>'hidden',
				  'value'=>$nostreet['Colonia']['id_colonia']
				 )
			)
	    );

    }else{
    	  e($form->input('Phones.calle',
			    array("label"=>false,
				  "type"=>"text",
                  'class'=>'form-control'
				 )
			)
	    );
	  e($form->input('Phones.id_colonia',
			    array("label"=>false,
				  "type"=>'hidden',
				  'value'=>$nostreet['Colonia']['id_colonia']
				 )
			)
	    );
    
    }