<div id="divRegistraSP">
<?php
e($ajax->form(array("type"=>"post",
                       "options"=>array("model"=>"ServiciosProgramados",
                                        "update"=>"divRegistraSP",
                                        "url"=>array("controller"=>'ServiciosProgramados',"action"=>"RegistraNSP"),
                                        )
                       )
                )
 );
?>
<?php //ServiciosProgramados ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Servicios Programados</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p><div class="form-group"><?php e($form->input('ServiciosProgramados.hora',
					array('type'=>'text',
					      'label'=>'Ingresa la hora',
					      'class'=>'form-control',
					      'size'=>'10',
					      'MaxLength'=>'4',
					      "onKeyPress"=>"return soloNumeros(event)",
					      'placeholder'=>'Ingresa Hora (4 digitos en formato 24Hrs) => HHMM'
					      )
				     )
			);?></div></p>
  </div>
</div>
    
<!-- <fieldset> -->
<!--     <legend>Nuevo Servicio Programado</legend> -->
<div class="table-responsive">
<table id="menu_info" class="table table-striped table-bordered table-hover table-condensed">
    <thead>
  <tr align="center">
<!--     <td width="10%">HORA</td> -->
    <td width="50%">DIRECCIÓN</td>
    <td width="5%">Lun</td>
<!--     <td width="2">A</td> -->
    <td width="5%">Mar</td>
<!--     <td width="2">A</td> -->
    <td width="5%">Mie</td>
<!--     <td width="2">A</td> -->
    <td width="5%">Jue</td>
<!--     <td width="2">A</td> -->
    <td width="5%">Vie</td>
<!--     <td width="2">A</td> -->
    <td width="5%">Sab</td>
<!--     <td width="2">A</td> -->
    <td width="5%">Dom</td>
<!--     <td width="2">A</td> -->
  </tr>
  </thead>
  <tbody>
  <tr align="center">
       <!--<td valign="top"><?php
//                 e($form->input('ServiciosProgramados.hora',array("label"=>false,"type"=>"text","size"=>"10","MaxLength"=>"4")));
           ?>
       </td>-->
       <td valign="top">
           <table border="0" width="100%">
               <tr align="center">
                <td width="40%" valign="top"><?php e($form->input('ServiciosProgramados.id_colonia',array("id"=>"id_colonia","label"=>false,"type"=>"select","options"=>$Colonias,"empty"=>"-Colonias-","class"=>"form-control")));?></td>
                <td width="40%" valign="top"><div id="divCalles"><?php e($form->input('ServiciosProgramados.id_calle',array("label"=>false,"type"=>"select","options"=>$Calles,"empty"=>"-Calles-","class"=>"form-control")));?></div></td>
                <td width="20%" valign="top"><?php e($form->input('ServiciosProgramados.numero',array("label"=>false,"type"=>"text","size"=>"6",'placeholder'=>"Numero","class"=>"form-control")));?></td>
               </tr>
           </table>
       </td>
       <td valign="top"><?php e($form->input('ServiciosProgramados.lunes',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.LunGo",							
            array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
       <td valign="top"><?php e($form->input('ServiciosProgramados.martes',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.MarGo",
            array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
       <td valign="top"><?php e($form->input('ServiciosProgramados.miercoles',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.MieGo",
					array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
       <td valign="top"><?php e($form->input('ServiciosProgramados.jueves',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.JueGo",
					array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
       <td valign="top"><?php e($form->input('ServiciosProgramados.viernes',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.VieGo",
					array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
       <td valign="top"><?php e($form->input('ServiciosProgramados.sabado',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.SabGo",
					array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
       <td valign="top"><?php e($form->input('ServiciosProgramados.domingo',array("label"=>false,"type"=>"text","size"=>"3","class"=>"form-control")));?></td>
<!--        <td> -->
	    <?php
		e($form->input("ServiciosProgramados.DomGo",
					array('type'=>'hidden',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'value'=>$hir
						 )
			  )
	     );
	    ?>
<!--        </td> -->
   </tr>
   </tbody>
</table>
<?php e($form->submit("Registrar",array("class"=>"btn btn-info")));?>
<?php
e($ajax->observeField('id_colonia',
    array("url"=>array("controller"=>"ServiciosProgramados",
                       "action"=>"muestraCalles"
                       ),
          "update" => "divCalles"
         )
  ));
e($form->end());
?>
<!-- </fieldset> -->
    
<?php 


if(count($Registros)>0)
{
    e($ajax->form(array("type"=>"post",
                        "options"=>array("model"=>"ServiciosProgramados",
                        "update"=>"divRegistraSP",
                        "url"=>array("controller"=>'ServiciosProgramados',"action"=>"RegistraSP"),
                              )
                           )
                    )
     );
?>
    <br/>
<!-- <fieldset> -->
<!--     <legend>Servicios Programados</legend> -->
<table id="menu_info" border="0" width="100%">
  <tr align="center" >
    <td width="10%">HORA</td>
    <td width="35%">DIRECCIÓN</td>
    <td width="5%">Lun</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    </td>
    <td width="5%">Mar</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    <td width="5%">Mie</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    <td width="5%">Jue</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    <td width="5%">Vie</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    <td width="5%">Sab</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    <td width="5%">Dom</td>
    <td width="5">
    <?php
	e($html->image('icons/alarm_clock.png',
				array('title'=>'Activar Alerta',
				      'alt'=>'Activar Alerta',
				      'width'=>'15',
				      'height'=>'15'
				      )
		       )
	 );
    ?>
    <td width="5%">Eliminar</td>
  </tr>
<?php
  $bg_color = "#FFFFFF";
  foreach($Registros as $key=>$registro)
  {
     ?>
       <tr align="center" bgcolor="<?php e($bg_color)?>">
       <td><?php 
                e($form->input('ServiciosProgramados.'.$key.'.id',array("label"=>false,"type"=>"hidden","value"=>$registro['ServiciosProgramados']['id'])));
                e($form->input('ServiciosProgramados.'.$key.'.hora',array("label"=>false,"type"=>"text","value"=>$registro['ServiciosProgramados']['hora'],"size"=>"10")));
           ?>
       </td>
       <td><?php e(utf8_encode($registro['Calle']['calle'].' #'.$registro['ServiciosProgramados']['numero'].' Col. '.$registro['Calle']['Colonia']['colonia']));?></td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.lunes',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['lunes'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.LunGo",							array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['LunGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.martes',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['martes'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.MarGo",							array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['MarGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.miercoles',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['miercoles'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.MieGo",
					array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['MieGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.jueves',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['jueves'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.JueGo",
					array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['JueGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.viernes',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['viernes'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.VieGo",
					array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['VieGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.sabado',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['sabado'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.SabGo",
					array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['SabGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php e($form->input('ServiciosProgramados.'.$key.'.domingo',array("label"=>false,"type"=>"text","size"=>"3","value"=>$registro['ServiciosProgramados']['domingo'])));?></td>
       <td>
	    <?php
		e($form->input("ServiciosProgramados.$key.DomGo",
					array('type'=>'checkbox',
					      'label'=>false,
					      'style'=>'text-align:center;',
					      'checked'=>$registro['ServiciosProgramados']['DomGo']
						 )
			  )
	     );
	    ?>
       </td>
       <td><?php echo $this->Html->link('Borrar', array('action' => 'delete', $Registros[$key]['ServiciosProgramados']['id']), null, 'Estas seguro?' );?></td>
       </tr>
     <?php
     $bg_color = ($bg_color == "#FFFFFF") ? "#EEEEEE" : "#FFFFFF";
  }
?>
</table>
</div>
<?php e($form->submit("Act. Datos"));?>
<!-- </fieldset> -->
<?php
}
e($form->end());
?>
</div>