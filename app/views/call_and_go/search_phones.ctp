<?php
 //SearchPhones
 //pr($phones);
//  pr($colonia);
//  pr($street);
?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Phones",
                    "update"=>"divPhones",
                    "url"=>array("controller"=>'CallAndGo',"action"=>"EditPhones"),
			            )
                   )
             )
 );
?>
<table id="menu_info">
<?php
if(!empty($FindPhone)){
?>
    <tr />
      <th />ID
      <th />Municipio
      <th />Colonia
      <th />Calle
      <th />N&uacute;mero
      <th />Lada
      <th />Telefono
      <th />Celular
      <th />Nombre
      <th />Llama y cuelga
    <tr />
      <td />
	    <?php
		e($FindPhone['Phones']['id']);
		e($form->input('Phones.id',							array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['id']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e('Coatepec');
		e($form->input('Phones.id_localidad',							array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['id_localidad']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.id_colonia',							array('type'=>'select',
				      'label'=>false,
				      'options'=>$colonia,
				      'selected'=>$FindPhone['Phones']['id_colonia']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.id_calle',
				array('type'=>'select',
				      'label'=>false,
				      'options'=>$street,
				      'selected'=>$FindPhone['Phones']['id_calle']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.numero',
				array('type'=>'text',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['numero']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.lada',
				array('type'=>'text',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['lada']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.phone',
				array('type'=>'text',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['phone']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.cellphone',
				array('type'=>'text',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['cellphone']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.name',
				array('type'=>'text',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['name']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.call_and_go',							array('type'=>'select',
				      'label'=>false,
				      'options'=>array(0=>'No',1=>'Si'),
				      'selected'=>$FindPhone['Phones']['call_and_go']
				     )
			      )
		 );
	    ?>
	    
<?php 
}else{
  e($ajax->observeField('CallesColonia',
    array("url"=>array("controller"=>"CallAndGo",
                       "action"=>"ShowStreet"
                       ),
          "update" => "divStreet"
         )
  ));
?>
    <tr />
      <th />Municipio
      <th />Colonia
      <th />Calle
      <th />N&uacute;mero
      <th />Lada
      <th />Telefono
      <th />Celular
      <th />Nombre
      <th />Llama y cuelga
    <tr />
      <td />Coatepec
	    <?php

		e($form->input('Phones.id_localidad',
				array('type'=>'hidden',
				      'label'=>false,
				      'value'=>38
				     )
			      )
		 );
		e($form->input('Calles.id_localidad',
				array('type'=>'hidden',
				      'label'=>false,
				      'value'=>38
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		 e($form->input('Calles.colonia',
						array('type'=>'select',
						      'label'=>false,
						      'class'=>'calles',
						      'options'=>$colonia,
						      'empty'=>'Seleccionar Colonia'
						      )
			      )
		 );
	    ?>
      <td /><div id="divStreet">
	    <?php
		e($form->input('Street.id',
				array('type'=>'select',
				      'label'=>false,
				      'options'=>array('Seleccionar Calle')
// 				      'selected'=>'empty'
				     )
			      )
		 );
	    ?>
	    </div>
      <td />
	    <?php

		e($form->input('Phones.numero',
				array('type'=>'text',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.lada',
				array('type'=>'text',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.phone',
				array('type'=>'text',
				      'label'=>false,
				      'value'=>$this->data['Phones']['data']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.cellphone',
				array('type'=>'text',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.name',
				array('type'=>'text',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.call_and_go',							array('type'=>'select',
				      'label'=>false,
				      'options'=>array(0=>'No',1=>'Si'),
				      'selected'=>0
				     )
			      )
		 );
	    ?>
<?php } ?>
</table>
<?php
	e($form->submit('Actualizar'));
	e($form->end());
?>
<div id='divPhones'><?php include('show_phones.ctp');?></div>












