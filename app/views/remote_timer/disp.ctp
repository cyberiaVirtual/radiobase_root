<?php
	echo "<center>".date("W::Y-m-d H:i:s")."</center>";

/**
 * @author Masino Sinaga, http://www.openscriptsolution.com
 * @copyright October 13, 2009
 * for sustraction add minus ('00:-10:-10') to values
 */

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
    if((sum_the_time(date('H:i:s'), '00:10:00') == $time)){
	if(($era[$key]['ServiciosProgramados'][$days[$today]]) == true){
?>
<script defer>
//     window.webkitNotifications.createHTMLNotification(url);
    window.webkitNotifications.createNotification("<?php e($this->webroot."img/icons/alarm-clock_22.png");?>", "Se Aproxima un Servicio Programado", "Debe Enviar Una Unidad al Siguiente Domicilio <?php
    e(" [Calle => ");
    e($era[$key]['Calle']['calle']);
    e("] [Numero => ");
    e($era[$key]['ServiciosProgramados']['numero']);
    e("] [Colonia => ");
    e($era[$key]['Calle']['Colonia']['colonia']);
    e("] [a las => ");
    e($era[$key]['ServiciosProgramados']['hora']);
    e(" horas]");
    ?>").show();

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



