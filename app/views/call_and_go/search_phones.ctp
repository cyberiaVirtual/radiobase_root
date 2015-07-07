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
$label = (!empty($FindPhone)) ? 'Actualizar' : 'Registrar';
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php e($label);?></h3>
  </div>
    <div class="panel-body">
<div class="table-responsive">
<table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
<?php
if(!empty($FindPhone)){
?>
    <thead>
    <tr />
      <th />ID
      <th />Municipio
      <th />Colonia
      <th />Calle
      <th />Número
      <th />Lada
      <th />Telefono
      <th />Celular
      <th />Nombre
      <th />Llama/Cuelga
    </thead>
    <tbody>
    <tr />
    
    
      <td />
	    <?php
		e($FindPhone['Phones']['id']);
		e($form->input('Phones.id',							
                array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['id']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e('Coatepec');
		e($form->input('Phones.id_localidad',							
                array('type'=>'hidden',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['id_localidad']
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.id_colonia',							
                array('type'=>'select',
                      'class'=>'form-control',
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
                      'class'=>'form-control',
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
                      'class'=>'form-control',
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
                      'class'=>'form-control',
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
                      'class'=>'form-control',
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
                      'class'=>'form-control',
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
                      'class'=>'form-control',
				      'label'=>false,
				      'value'=>$FindPhone['Phones']['name']
				     )
			      )
		 );
	    ?>
      <td align="center" />
      
	    <?php
		e($form->input('Phones.call_and_go',							
                array('type'=>'select',
                      'class'=>'form-control',
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
    <thead>
    <tr />
      <th />Municipio
      <th />Colonia
      <th />Calle
      <th />Número
      <th />Lada
      <th />Telefono
      <th />Celular
      <th />Nombre
      <th />Llama/Cuelga
    </thead>
    <tbody>
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
						      'class'=>'form-control',
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
                      'class'=>'form-control',
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
                      'class'=>'form-control',
				      'label'=>false
                    
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.lada',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.phone',
				array('type'=>'text',
                      'class'=>'form-control',
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
                      'class'=>'form-control',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php

		e($form->input('Phones.name',
				array('type'=>'text',
                      'class'=>'form-control',
				      'label'=>false
				     )
			      )
		 );
	    ?>
      <td />
	    <?php
		e($form->input('Phones.call_and_go',
                array('type'=>'select',
                      'class'=>'form-control',
				      'label'=>false,
				      'options'=>array(0=>'No',1=>'Si'),
				      'selected'=>0
				     )
			      )
		 );
	    ?>
<?php } ?>
    </tbody>
</table>
<?php
	e($form->submit('Actualizar',array("class"=>"btn btn-info pull-right")));
	e($form->end());
?>
    <br/><br/><br/>
    <div id='divPhones'><?php include('show_phones.ctp');?></div>
    </div>
</div>
</div>










