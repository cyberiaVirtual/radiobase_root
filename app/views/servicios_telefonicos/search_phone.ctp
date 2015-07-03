<?php //SearchPhone
//     pr($street);
//     pr($colonia);
?>
<?php
//    if(!empty($operators)){
      e($ajax->form(array("type"=>"post",
		          "options"=>array("model"=>"ServiciosTelefonicos",
                          "update"=>"RegistraPhoneServices",
                          "url"=>array("controller"=>'ServiciosTelefonicos',"action"=>"PhoneServices")
                          )
                       )
                )
 );
 ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Resultados</h3>
  </div>
    <div class="panel-body">
        <div class="table-responsive"  >
        <table id="menu_info" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr />
                    <th />Municipio
                    <th />Colonia
                    <th />calle
                    <th />N&uacute;mero
                    <th />Lada
                    <th />Telefono
                    <th />Taxi
                    <th />Hora
                <tr />
            </thead>
        <!-- 	<td />getid -->
            <tbody>
            <tr/>
            <td />Coatepec
                <?php
                  if(!empty($phones)){
                e($form->input('ServiciosTelefonicos.id_localidad',						array('type'=>'hidden',
                              'label'=>false,
                              'value'=>$phones['Phones']['id_localidad']
                             )
                          )
                 );

                e('<td />');
                e($colonia[$phones['Phones']['id_colonia']]);

                e('<td />');
                e($street[$phones['Phones']['id_calle']]);

                e($form->input('ServiciosTelefonicos.id_colonia',
                          array('label'=>false,
                            'type'=>'hidden',
                            'value'=>$phones['Phones']['id_colonia'],
                            'readonly' => true
                            )
                          )
                 );
                e($form->input('ServiciosTelefonicos.id_calle',
                          array('label'=>false,
                            'type'=>'hidden',
                            'value'=>$phones['Phones']['id_calle'],
                            'readonly' => true
                            )
                          )
                 );

                  }else{
          e($ajax->observeField('CallesIdColonia',
            array("url"=>array("controller"=>"ServiciosTelefonicos",
                               "action"=>"ShowStreet"
                               ),
                  "update" => "divStreet"
                 )
            )
           );
                e($form->input('ServiciosTelefonicos.id_localidad',						array('type'=>'hidden',
                              'label'=>false,
                              'value'=>'38'
                             )
                          )
                 );
                e('<td />');
                 e($form->input('Calles.id_colonia',
                            array('type'=>'select',
                                  'label'=>false,
                                  'class'=>'form-control',
                                  'options'=>$colonia,
                                  'empty'=>'Seleccionar Colonia',
                                  'selected'=>$phones['Phones']['id_colonia']
                                 )
                          )
                 );

                e('<td />');
                ?>
                <div id="divStreet">
                <?php
                e($form->input('Street.id',
                        array('type'=>'select',
                              'class'=>'form-control',
                              'label'=>false,
                              'options'=>array('Seleccionar Calle')
                             )
                          )
                 );
                ?>
                </div>
                <?php
        // 		 e($form->input('Calles.calle',
        // 						array('type'=>'hidden',
        // 						      'label'=>false,
        // 						      'value'=>$street[$phones['Calles']['id_calle']]
        // 						      )
        // 			      )
        // 		 );
        // 		 e($form->input('Phones.id_calle',
        // 						array('type'=>'hidden',
        // 						      'label'=>false,
        // 						      'class'=>'calles'
        // 						      )
        // 			      )
        // 		 );
        // 		 e($form->input('Calles.colonia',
        // 						array('type'=>'hidden',
        // 						      'label'=>false,
        // 						      'class'=>'calles'
        // 						      )
        // 			      )
        // 		 );
        // 		 e($form->input('Phones.id_localidad',
        // 						array('type'=>'hidden',
        // 						      'label'=>false,
        // 						      'options'=>array('localidad')
        // 						      )
        // 			      )
        // 		 );

                  }
                ?>
            <td />
                <?php
                  if(!empty($phones)){
                e($phones['Phones']['numero']);
                e($form->input('ServiciosTelefonicos.numero',
                                array('type'=>'hidden',
                                      'label'=>false,
                                      'readonly'=>true,
                                      'value'=>$phones['Phones']['numero']
                                      )
                          )
                 );
                  }else{
                e($form->input('ServiciosTelefonicos.numero',
                                array('type'=>'text',
                                      'class'=>'form-control',
                                      'label'=>false,
                                      'placeholder'=>'Numero'
                                      )
                          )
                 );
                 e($form->input('Phones.numero',
                                array('type'=>'hidden',
                                      'label'=>false
                                      )
                          )
                 );
                  }
                ?>
            <td />
                <?php
                  if(!empty($phones)){
                e($phones['Phones']['lada']);
                e($form->input('ServiciosTelefonicos.lada',
                                array('type'=>'hidden',
                                      'label'=>false,
                                      'readonly'=>true,
                                      'value'=>$phones['Phones']['lada']
                                      )
                          )
                 );
                  }else{
                e($form->input('ServiciosTelefonicos.lada',
                                array('type'=>'text',
                                      'class'=>'form-control',
                                      'label'=>false
                                      )
                          )
                 );
                  }
                ?>
            <td />
                <?php
                  if(!empty($phones)){

                e($phones['Phones']['phone']);
                e($form->input('ServiciosTelefonicos.telefono',
                                array('type'=>'hidden',
                                      'label'=>false,
                                      'readonly'=>true,
                                      'value'=>$phones['Phones']['phone']
                                      )
                          )
                 );
                  }else{
                e($form->input('ServiciosTelefonicos.telefono',
                                array('type'=>'text',
                                      'class'=>'form-control',
                                      'label'=>false,
                                      'readonly'=>false,
                                      'value'=>$telephone
                                      )
                          )
                 );
                e($form->input('Phones.phone',
                        array('type'=>'hidden',
                              'label'=>false,
                              'value'=>$telephone
                              )
                          )
                 );
                  }
                ?>
            <td />
                <?php
                e($form->input('ServiciosTelefonicos.id_movil',
                                array('type'=>'text',
                                      'class'=>'form-control',
                                      'label'=>false,
                                      'value'=>$movil
                                      )
                          )
                 );
                e($form->input('ServiciosTelefonicos.id_economico',
                                array('type'=>'hidden',
                                      'label'=>false,
                                      'value'=>$id_economico
                                      )
                          )
                 );
                ?>
            <td />
                <?php
                e($form->input('ServiciosTelefonicos.hora',
                                array('type'=>'text',
                                      'class'=>'form-control',
                                      'label'=>false,
                                      'value'=>date('H:i')
                                      )
                          )
                 );
                ?>
            </tbody>
        </table>
        </div>
        <?php
            e($form->submit('Registrar',array("class"=>"btn btn-info pull-right")));
            e($form->end());
        ?>
         <br/><br/><br/>
        <div id="RegistraPhoneServices"><?php include('show_phone_services.ctp');?></div>
    </div>
</div>