<?php
   if(!empty($operators)){
      e($ajax->form(array("type"=>"post",
		          "options"=>array("model"=>"UnidadesEnServicios",
                          "update"=>"divRegistraLista",
                          "url"=>array("controller"=>'UnidadesEnServicios',"action"=>"RegistraLista")
                          )
                       )
                )
 );

    App::Import('Vendor','radiobase/ServicioMenu');
?>
    <tr />
    <td width="3" />
    <?php e($form->create('UnidadesEnServicio',array('action'=>'RegistraLista')));?>
      <?php echo $form->input('UnidadesEnServicio.id_movil',
					array("value"=>$operators['Operadores']['id_movil'],
					      'label'=>false,
					      "type"=>"text",
					      "readonly"=>true,
                          "class" =>"form-control",
					      'style'=>'text-align:center;'
					      )
			      );
    ?>
    <td width="3" />
      <?php echo $form->input('UnidadesEnServicio.id_economico',
					array("value"=>$operators['Operadores']['id_economico'],
					      'label'=>false,
					      "type"=>"text",
					      "readonly"=>true,
 					      "class" =>"form-control",
					      'style'=>'text-align:center;'
					      )
			      );
      ?>
    <td />
      <?php echo $form->input('UnidadesEnServicio.nombre',
					array("value"=>$operators['Operadores']['nombre'],
					      'label'=>false,
					      "type"=>"text",
					      "readonly"=>true,
                          "class" =>"form-control",
					      'style'=>'text-align:center;'
					      )
			      );
      ?>
    <td />
      <?php echo $form->input('UnidadesEnServicio.entrada',
					array("value"=>$in,
					      'label'=>false,
					      "type"=>"text",
					      "readonly"=>$readonly_in,
					      "class" =>"form-control",
					      'style'=>'text-align:center;'
					      )
			      );
      ?>
          <td />
      <?php echo $form->input('UnidadesEnServicio.salida',
					array('label'=>false,
					      "type"=>"text",
					      "readonly"=>$readonly_out,
					      "class" =>"form-control",
					      'style'=>'text-align:center;',
					      'value'=>$salida
					      )
			      );
      ?>
          <td />
      <?php
	    e($form->label('UnidadesEnServicio.pase_de_lista',
				    '',
				    array('accesskey'=>'P')
			  )
	      );
   
	    e($form->input("UnidadesEnServicio.pase_de_lista",									
                    array('
            type'=>'checkbox',
						  'label'=>false,
						  'style'=>'text-align:center;',
						  'class'=>'form-control',
						  'checked'=>$hir
						 )
			  )
	     );
      ?>
      <?php /*echo $form->input('UnidadesEnServicio.pase_de_lista',
					array('label'=>false,
					      "type"=>"text",
					      "readonly"=>$readonly,
					      'size'=>'5',
					      "value"=>$hir,
					      'style'=>'text-align:center;',
					      "onKeyPress"=>"return soloNumeros(event)",
					      'class'=>'pase_de_lista'
					      )
			      );*/
      ?>
		
      <?php echo $form->input('UnidadesEnServicio.id',
					array("value"=>$UnidadesEnServicio['UnidadesEnServicio']['id'],
					      'label'=>false,
					      "type"=>"hidden",
					      "readonly"=>true
					      )
			      );
      ?>

      <?php for($i=0;$i<=5;$i++){ ?>
      <td />
      <?php

	    echo $form->input("FueraDeMomento.hora_ini_$i",
					array('label'=>false,
					      "type"=>"text",
					      "readonly"=>$readonly_ini[$i],
					      "class" =>"form-control",
					      'style'=>'text-align:center;',
					      'value'=>$FueraDeMomento['FueraDeMomento']["hora_ini_$i"]
					      )
			      );
      ?>
      <?php } for($i=0;$i<=5;$i++){ ?>
      <td />
      <?php echo $form->input("FueraDeMomento.hora_fin_$i",
					array('label'=>false,
					      "type"=>"text",
					      "readonly"=>$readonly_fin[$i],
					      "class" =>"form-control",
					      'style'=>'text-align:center;',
					      'value'=>$FueraDeMomento['FueraDeMomento']["hora_fin_$i"]
					      )
			      );
	   }
      ?>
      <?php for($i=0;$i<=3;$i++){ ?>
      <td />
      <?php echo $form->input("CambioCanal.canal_$i",
					array('label'=>false,
					      "type"=>"text",
					      "readonly"=>$readonly_ch[$i],
					      "class" =>"form-control",
					      'style'=>'text-align:center;',
					      'value'=>$canal['CambioCanal']["canal_$i"],
					      'lenght'=>'1'
					      )
			      );
	     }
      ?>
      <?php echo $form->input("FueraDeMomento.id",
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>true,
					      "class" =>"form-control",
					      'value'=>$FueraDeMomento['FueraDeMomento']['id']
					      )
			      );
      ?>
      <?php echo $form->input('FueraDeMomento.id_movil',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> "$id_movil"
					      )
			      );
      ?>
      <?php echo $form->input('FueraDeMomento.turno',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> "$turno"
					      )
			      );
      ?>
      <?php echo $form->input('FueraDeMomento.fecha',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> date('Y-m-d')
					      )
			      );
      ?>
      <?php echo $form->input('CambioCanal.id_movil',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> "$id_movil"
					      )
			      );
      ?>
      <?php echo $form->input('CambioCanal.turno',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> "$turno"
					      )
			      );
      ?>
      <?php echo $form->input('CambioCanal.fecha',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> date('Y-m-d')
					      )
			      );
      ?>
      <?php echo $form->input('CambioCanal.id',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> $canal['CambioCanal']['id']
					      )
			      );
      ?>
      <?php echo $form->input('UnidadesEnServicio.turno',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> $turno
					      )
			      );
      ?>
      <?php echo $form->input('UnidadesEnServicio.fecha',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      "class" =>"form-control",
					      'value'=> date('Y-m-d')
					      )
			      );
      ?>
<?php echo $form->input('UnidadesEnServicio.username',
					array('label'=>false,
					      "type"=>"hidden",
					      "readonly"=>false,
					      'size'=>'5',
					      'class'=>'pase_de_lista',
					      'value'=> $username
					      )
			      );
      ?>
<!--     <td colspan='19' />&nbsp; -->
  <?php
  App::Import('Vendor','radiobase/EndServicioMenu');
  e($form->submit('Enviar',array("class"=>"btn btn-info")));
  e('<br/>');

      e($form->end());
      }else{
	        e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Sin Resultados!</strong> Intente de nuevo...
              </div>');
      }
     
//       pr($UnidadesEnServicio);
//       pr($operators);
//       pr($canal);
//       pr($FueraDeMomento);
  ?>

  <div id="divRegistraLista"><?php include('show_units_on_duty.ctp');?></div>
