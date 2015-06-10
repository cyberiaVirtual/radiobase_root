<?php //show_phones.ctp ?>
<?php if(!empty($phones)){?>
<table id="menu_info">
<?php
//     if(!empty($paginate_phones)){
//     $cells = array(
// 		    $this->Paginator->sort('ID', 'id'),
// 		    $this->Paginator->sort('Colonia', 'id_colonia'),
// 		    $this->Paginator->sort('Calle', 'id_calle'),
// 		    $this->Paginator->sort('Número', 'numero'),
// 		    $this->Paginator->sort('Telefono', 'phone'),
// 		    $this->Paginator->sort('Llama y Cuelga', 'call_and_go'),
// 		    $this->Paginator->sort('Borrar', '')
// 		  );
//     echo $this->Html->tableHeaders($cells);
//     }
?>
    <tr />
      <th />ID
      <th />Colonia
      <th />Calle
      <th />N&uacute;mero
      <th />Telefono
      <th />Llama y cuelga
      <th />Borrar
    <?php $idx=1;?>
    <?php foreach($phones as $key => $value){?>
    <tr />
      <td /><?php e($idx++);?>
      <td /><?php e($colonia[$phones[$key]['Phones']['id_colonia']]);?>
      <td /><?php e($street[$phones[$key]['Phones']['id_calle']]);?>
      <td /><?php e($phones[$key]['Phones']['numero']);?>
      <td /><?php e($phones[$key]['Phones']['phone']);?>
      <td />
	    <?php
		$chk=$phones[$key]['Phones']['call_and_go'];
		if($chk==1){
		e($html->image('icons/spam.png',
					array('title'=>'Servicio => No',
					      'alt'=>'Servicio => No',
					      'width'=>'15',
					      'height'=>'15'
					      )
			       )
		 );
		}else{
		e($html->image('icons/tel.png',
					array('title'=>'Servicio => Si',
					      'alt'=>'Servicio => Si',
					      'width'=>'15',
					      'height'=>'15'
					      )
			       )
		 );
		}
	    ?>
      <td /><?php echo $this->Html->link('Borrar', array('action' => 'delete', $phones[$key]['Phones']['id']), null, 'Estas seguro?' );?>
    <?php } //end foreach?>
</table>

<?php
//     if(isset($this->Paginator)){
// 	$numbers = $this->Paginator->numbers();
// // 	$cells = 7;
// 	if (!empty($numbers)) {
// 	    $counter = $this->Paginator->prev('<< Previous',
// 						null,
// 						null,
// 						array('class' => 'disabled')
// 	);
// 	$counter .= ' | '.$numbers.' | ';
// 	$counter .= $this->Paginator->next('Next >>',
// 						null,
// 						null,
// 						array('class' => 'disabled')
// 	);
// 	echo $this->Html->tableCells(array(array(array($counter, array('colspan' => count($cells))))), null, null, true);
// 	}
// //     $cells = null;
//     }
?>

<?php }else{
	e('<div id="warning"> Aun no existen Registros </div>');
      }	
?>
