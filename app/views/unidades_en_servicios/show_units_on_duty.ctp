<?php //die();?>
<!-- <div id="divRegistraSalida"> -->
<?php
// if(count($Registros)>0)
// {
//     e($ajax->form(array("type"=>"post",
//                         "options"=>array("model"=>"UnidadesEnServicio",
//                         "update"=>"divother",
//                         "url"=>array("controller"=>'UnidadesEnServicio',"action"=>"RegisterOther"),
//                               )
//                            )
//                     )
//      );
?>

<div class="table-responsive">
<table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
<thead>
<tr />
  <th />ID
  <th colspan="4"/>Unidades En Servicio
  <th />Lista
  <th colspan='6'/>Fuera de Momento
  <th colspan='6'/>En Servicio Nuevamente
  <th colspan='4' />Cambio de Canal
<tr />

  <td />Mov
<!--     under Unidades En Servicio -->
  <td />Unidad
  <td />Nombre
  <td />Inicio
  <td />Fin
  <td /><center>P</center>
    <?php 
      for($i=0;$i<=11;$i++){
	e('<td />Hora');
      }
    ?>
    <?php 
      for($i=0;$i<=2;$i++){
	e('<td />Uni');
      }
    ?>
  <td />C/U
<?php
    if(!empty($all)){
	$i = null;
?>	
</thead>
<tbody>
<?php foreach($all as $key => $value):;?>

    <tr>
    <td width="3" />

	<?php echo $all[$key]['Operadores']['id_movil']; ?>

    <td width="3" />
	  <?php echo $all[$key]['Operadores']['id_economico'];?>
	  
    <td />
	  <?php echo $all[$key]['Operadores']['nombre']; ?>

    <td />
	  <?php echo $all[$key]['UnidadesEnServicio']['entrada']; ?>

    <td />
      <?php echo $all[$key]['UnidadesEnServicio']['salida']; ?>

    <td /><center>
      <?php
	    $chk=$all[$key]['UnidadesEnServicio']['pase_de_lista'];

	    if($chk == null){
		e(null);
	    }else{
		if($chk == '1'){
		    $img = 'check.png';
		}if($chk == '0'){
		    $img = 'spam-2';
		}
		e($html->image("icons/$img",
					array('title'=>'Lista',
					      'alt'=>'Lista',
					      'width'=>'15',
					      'height'=>'15'
					      )
			       )
		 );
	    }
      ?>
	  </center>
      <?php for($i=0;$i<=5;$i++){ ?>

    <td />
      <?php echo $all[$key]['FueraDeMomento']["hora_ini_$i"];
	    }

	    for($i=0;$i<=5;$i++){
  e('<td />');
	    echo $all[$key]['FueraDeMomento']["hora_fin_$i"];
	    }

	    for($i=0;$i<=3;$i++){ ?>
    <td />
      <?php echo $all[$key]['CambioCanal']["canal_$i"];
	     }
      ?>
     </tr>

<?php
      endforeach;
?>
     </tbody>
</table>

<?php

    }else{

            e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Sin Registros aún!</strong>
              </div>');

    }
?>
</div>