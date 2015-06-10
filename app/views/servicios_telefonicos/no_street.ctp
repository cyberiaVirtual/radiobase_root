<?php
// pr($nostreet);
// pr($opt);
    if(!empty($nostreet)){

	  e($form->input('Phones.id_calle',
			    array("label"=>false,
				  "type"=>'select',
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
				  "type"=>"text"
				 )
			)
	    );
// 	    e($form->input('Phones.lada',
// 			    array("label"=>false,
// 				  "type"=>"text"
// 				 )
// 			  )
// 	     );
	  e($form->input('Phones.id_colonia',
			    array("label"=>false,
				  "type"=>'hidden',
				  'value'=>$nostreet['Colonia']['id_colonia']
				 )
			)
	    );
    
    }
?>