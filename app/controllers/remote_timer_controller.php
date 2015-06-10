<?php
class RemoteTimerController extends AppController {

      var $name = 'RemoteTimer';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript','Js'=>array('Jquery'),'GoogleMap');
      var $uses = array('Ciudades','Localidades','Colonias','Calles','Phones','ServiciosProgramados');

	function index() {

	}

	function disp() {
	    $conditions['ServiciosProgramados.turno'] = $_SESSION['Auth']['User']['turno'];
	    $Chronos=$this->ServiciosProgramados->find('all',array('fields'=>array('hora'),'conditions'=>$conditions));
	    $Era = $this->ServiciosProgramados->find('all',array('conditions'=>$conditions));
	    $days = array('1'=>'LunGo',
			  '2'=>'MarGo',
			  '3'=>'MieGo',
			  '4'=>'JueGo',
			  '5'=>'VieGo',
			  '6'=>'SabGo',
			  '7'=>'DomGo'
			  );
		$this->set('today',date('N'));
		$this->set('days',$days);
		$this->set('era',$Era);
		$this->set('chronos',$Chronos);
		$this->layout = "ajax";
	} //End disp

	function mkdiv(){

	  return null;
	}

}
?>