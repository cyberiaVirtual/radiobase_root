<?php
	echo "<center>".date("W::Y-m-d H:i:s")."</center>";

/**
 * @author Masino Sinaga, http://www.openscriptsolution.com
 * @copyright October 13, 2009
 * for sustraction add minus ('00:-10:-10') to values
 */
configure::write('debug',2);
// debug($today);
// debug($days);
// debug($era);
// debug($chronos);

function sum_the_time($time1, $time2) {
  $times = array($time1, $time2);
  $seconds = 0;
  foreach ($times as $time){
    list($hour,$minute,$second) = explode(':', $time);
    $seconds += $hour*3600;
    $seconds += $minute*60;
    $seconds += $second;
  }
  $hours = floor($seconds/3600);
  $seconds -= $hours*3600;
  $minutes  = floor($seconds/60);
  $seconds -= $minutes*60;
    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks to Patrick
}

?>

<?php
  foreach($chronos as $key => $data){
    $time = $chronos[$key]['ServiciosProgramados']['hora'];
	debug($time);
// 	var_dump((bool)$era[$key]['ServiciosProgramados'][$days[$today]]);
    if((sum_the_time(date('H:i:s'), '00:10:00') == $time)){
	if(((bool)$era[$key]['ServiciosProgramados'][$days[$today]]) == true){
		var_dump($era[$key]['ServiciosProgramados'][$days[$today]]);
?>

<script type="text/javascript">
	// At last, if the user already denied any notification, and you 
	// want to be respectful there is no need to bother him any more.

if (Notification.permission === "granted") {
		// If it's okay let's create a notification
// 		var notification = new Notification("Hi there!");
		var notification = new Notification('Se Aproxima un Servicio Programado', {
			icon: "<?php echo $this->webroot."img/icons/alarm-clock_22.png";?>",
			body: "Debe Enviar Una Unidad al Siguiente Domicilio " +
					"<?php
						echo  " ,Calle => {$era[$key]['Calle']['calle']}";
						echo  " ,Numero => {$era[$key]['ServiciosProgramados']['numero']}";
						echo  " ,Colonia => {$era[$key]['Calle']['Colonia']['colonia']}";
						echo  " ,Hora => {$era[$key]['ServiciosProgramados']['hora']}";
					?>",
			});
} else if ( Notification.permission === 'denied' OR !("Notification" in window) ) {
// 		document.open();
// 		document.write('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Este sitio esta bloqueado para mostrar <strong >Notificaciones de Escritorio</strong> si desea activarlas nuevamente haga click en la siguiente <a href="https://support.google.com/chrome/answer/3220216?hl=es-Mx" target="_blank" class="alert-link">liga</a> para Chorme y &eacute;sta <a href="https://support.mozilla.org/en-US/questions/997362" target="_blank" class="alert-link">liga</a> para Firefox d&oacute;nde se describe como activarlas nuevamente</div>');
// 		document.close();
		window.alert('Debe Enviar Una Unidad al Siguiente Domicilio'+"<?php
						echo  " ,Calle => {$era[$key]['Calle']['calle']}";
						echo  " ,Numero => {$era[$key]['ServiciosProgramados']['numero']}";
						echo  " ,Colonia => {$era[$key]['Calle']['Colonia']['colonia']}";
						echo  " ,Hora => {$era[$key]['ServiciosProgramados']['hora']}";
					?>");
// 		<a href="javascript:void(0)" onclick="Notification.requestPermission()" class="alert-link">liga</a>
	}
</script>



<audio autoplay="autoplay" preload="auto">
  <source src="<?php e($this->webroot."sounds/Alarm.ogg"); ?>" type="audio/ogg">
  <source src="<?php e($this->webroot."sounds/Alarm.mp3");?>" type="audio/mpeg">
</audio>

<?php 
	} //End day filter
    } //End if sum_the_time
  } //End foreach
?>



