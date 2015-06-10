<?php e('COUNTER'); ?>
<?php
/**
  ALERT Raise of chronos
*/
?>
<?php
// $jscript = "alert('Hey there!');";
// echo $this->Html->scriptBlock($jscript, array('inline'=>false));
?>
<?php
    for($i=1;$i<=$idx;$i++){
	e("\n<div id=\"callback".$i."\" style='color:red;'></div>\n");
    }
?>
<script type="text/javascript">
<?php

 (int)$idx;

	for($i=1;$i<=$idx;$i++){
	
	$time_start = explode(":",$chronos[$i]);
	$start_date=($time_start[0]*60)+$time_start[1];
	$time_now = (date("H")*60)+(date("i"));
	
	      if( $start_date > $time_now ){
		  e("\n".'$(function() {'."\n");
		  e('$(\'#callback'.$i.'\').chrony('."\n");
		  e('{'."\n");
	      $eta=($start_date-$time_now);

	      if($eta>60 && $eta>0){
		  $eta=$eta/60;
		  $hrs=round($eta); //get the elapsed hours
		  $hr_param = "hour    : $hrs,\n";
		  $mins=explode(".",round($eta,2));
		  if($mins>60){
			$mins[1]=60;
		  }
	      }else{
	      $hr_param = null;
	      $mins[1] = $eta;
	      
	      }
	      
// 	      $mins[1]; //get the elapsed minutes
		if(($mins[1]-5)<0){
			echo "";
		}else{
	
	echo	"\nsecond	: 0,\n";
	echo	"minute  : ".($mins[1]-5).",\n";
	echo	"$hr_param\n";
	echo	'finish  :  function ()'."\n";
	echo	   "{\n";
	echo 	'$("#create_notification").load('."\n";
	echo	'DesktopNotifications.doNotify("'.$this->webroot."img/icons/alarm-clock_22.png".'", "Se acerca una cita programada", "Debera Enviar una unidad dentro de 5 minutos.") '."\n";
	echo	');'."\n";
	echo	'},'."\n";
	echo	'alert: { color: \'green\', hour: \'0\', minute: \'5\', second: \'0\' }'."\n";	  
	echo	'});'."\n";				
	echo	'});'."\n";
		}//end negative filter
	      } // end positive $time_now
	
	}
	

?>
</script>
<?php 
/**
    TODO End chronos
*/
?>

<!-- <div id="callback"></div> -->
 <script type="text/javascript">    
	$(function() {
	$("<?php e('#callback');?>").chrony(
			{
			second	: 10,
// 			minute  : <?php //e($idx);?>,
			minute  : 0,
			hour    : 0,
			finish	: function() {
				$("#permission_request").load(
				DesktopNotifications.requestPermission()
				);

				$("#create_notification").load(
				DesktopNotifications.doNotify("<?php e($this->webroot."img/icons/alarm-clock_22.png");?>", "Se Acerca una Cita Programada", "Debera enviar una unidad dentro de 5 minutos.") 
				);
 						
				alert
				  },
			//		finish  :  function display_alert()
				//		    {
					//	    alert(<?php 
						    //echo '<script type="text/javascript">';
							//echo 'window.location="www.google.com"';
						    //$algo="Hello World";
							//echo '<a href=...>$algo</a>';
					//	    ?> );
					//	    },
					alert: { color: 'green', hour: 0, minute: 0, second: 5 }	  
					});
				
			});
		</script> 
