<?php

    class UnidadesEnServiciosController extends AppController{

      var $name = 'UnidadesEnServicios';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript','Js');
      var $uses = array('UnidadesEnServicio','Operadores','FueraDeMomento','CambioCanal');

    function showRegisters(){
      $all = array();
      $date = date('Y-m-d');
      $turno = $_SESSION['Auth']['User']['turno'];
      $username = $_SESSION['Auth']['User']['username'];
      $conditions['UnidadesEnServicio.fecha'] = $date;
      $conditions['UnidadesEnServicio.turno'] = $turno;
      $conditions['UnidadesEnServicio.username'] = $username;
      $fconditions['FueraDeMomento.fecha'] = $date;
      $fconditions['FueraDeMomento.turno'] = $turno;
      $fconditions['FueraDeMomento.username'] = $username;
      $cconditions['CambioCanal.fecha'] = $date;
      $cconditions['CambioCanal.turno'] = $turno;
      $cconditions['CambioCanal.username'] = $username;

      $UnidadesEnServicio = $this->UnidadesEnServicio->find('all',array('conditions'=>$conditions,'order'=>'id_movil ASC'));
      $FueraDeMomento = $this->FueraDeMomento->find('all',array('conditions'=>$fconditions,'order'=>'id_movil ASC'));
      $CambioCanal = $this->CambioCanal->find('all',array('conditions'=>$cconditions,'order'=>'id_movil ASC'));
      $OperadoresEconomico = $this->Operadores->find('list',array('fields'=>array('id_movil','id_economico'),
			 'order'=>'id_movil ASC'
			)
	   );
      $OperadoresNamae = $this->Operadores->find('list',array('fields'=>array('id_movil','nombre'),
			 'order'=>'id_movil ASC'
			)
	   );
	foreach($UnidadesEnServicio as $movil){
	    $all['Operadores'][$movil['UnidadesEnServicio']['id_movil']]['id_economico'] = $OperadoresEconomico[$movil['UnidadesEnServicio']['id_movil']];
	    $all['Operadores'][$movil['UnidadesEnServicio']['id_movil']]['nombre'] = $OperadoresNamae[$movil['UnidadesEnServicio']['id_movil']];
	}
	foreach($FueraDeMomento as $key => $hora){
	    for($i=0;$i<=5;$i++){
		$hr_ini = explode(':',$hora['FueraDeMomento']["hora_ini_$i"]);
		$hr_fin = explode(':',$hora['FueraDeMomento']["hora_fin_$i"]);
		$FueraDeMomento[$key]['FueraDeMomento']["hora_ini_$i"] = "$hr_ini[0]:$hr_ini[1]";
		$FueraDeMomento[$key]['FueraDeMomento']["hora_fin_$i"] = "$hr_fin[0]:$hr_fin[1]";
	    }
	}
	foreach($UnidadesEnServicio as $key => $value){
	    $in = explode(':',$value['UnidadesEnServicio']['entrada']);
	    $out = explode(':',$value['UnidadesEnServicio']['salida']);
	    $UnidadesEnServicio[$key]['UnidadesEnServicio']['entrada'] = "$in[0]:$in[1]";
	    $UnidadesEnServicio[$key]['UnidadesEnServicio']['salida'] = "$out[0]:$out[1]";
	}
      $all['UnidadesEnServicio'] = $UnidadesEnServicio;
      $all['FueraDeMomento'] = $FueraDeMomento;
      $all['CambioCanal'] = $CambioCanal;

      $Operadores = $this->Operadores->find('all');
	if(empty($all['UnidadesEnServicio'])){
	    $pase_de_lista = null;
	}else{
	    foreach($all['UnidadesEnServicio'] as $k => $v){
		$pase_de_lista[] = $v['UnidadesEnServicio']['id_movil'];
	    }
	}
	foreach($Operadores as $key => $op){
	  $operators[] = $op;
	    if( isset($pase_de_lista) && ($ps = array_keys($pase_de_lista,$op['Operadores']['id_movil'])) == true){
	    $operators[$key]['UnidadesEnServicio']['entrada'] = $all['UnidadesEnServicio'][$ps[0]]['UnidadesEnServicio']['entrada'];
		$operators[$key]['UnidadesEnServicio']['salida'] = $all['UnidadesEnServicio'][$ps[0]]['UnidadesEnServicio']['salida'];
		$operators[$key]['UnidadesEnServicio']['pase_de_lista'] = $all['UnidadesEnServicio'][$ps[0]]['UnidadesEnServicio']['pase_de_lista'];
		for($i=0;$i<=5;$i++){
		    $operators[$key]['FueraDeMomento']["hora_ini_$i"] = $all['FueraDeMomento'][$ps[0]]['FueraDeMomento']["hora_ini_$i"];
		}
		for($i=0;$i<=5;$i++){
		    $operators[$key]['FueraDeMomento']["hora_fin_$i"] = $all['FueraDeMomento'][$ps[0]]['FueraDeMomento']["hora_fin_$i"];
		}
		for($i=0;$i<=3;$i++){
		    $operators[$key]['CambioCanal']["canal_$i"] = $all['CambioCanal'][$ps[0]]['CambioCanal']["canal_$i"];
		}
	    }else{
		$operators[$key]['UnidadesEnServicio']['entrada'] = null;
		$operators[$key]['UnidadesEnServicio']['salida'] = null;
		$operators[$key]['UnidadesEnServicio']['pase_de_lista'] = null;
		for($i=0;$i<=5;$i++){
		    $operators[$key]['FueraDeMomento']["hora_ini_$i"] = null;
		    $operators[$key]['FueraDeMomento']["hora_fin_$i"] = null;
		}
		for($i=0;$i<=3;$i++){
		$operators[$key]['CambioCanal']["canal_$i"] = null;
		}
	    }
	}
	  $this->set('all',$operators);
    } //End showRegisters

    function index($id=null) {
	$this->showRegisters();
    }

    function searchOperadores(){
//     pr($this->data);exit();
	if(empty($this->data['Operadores']['id_movil'])){
	    e('<div id="warning"><span>Ingrese Un Numero de Movil</span></div>');
	    exit();
	}
	$conditions = array();
	$turno = $_SESSION['Auth']['User']['turno'];
	$username = $_SESSION['Auth']['User']['username'];
	$id_movil = utf8_encode($this->data['Operadores']['id_movil']);

	if(is_numeric($id_movil)){
	    $conditions['UnidadesEnServicio.fecha'] = date('Y-m-d');
	    $conditions['UnidadesEnServicio.id_movil'] = $id_movil;
	    $conditions['UnidadesEnServicio.turno'] = $turno;
	    $conditions['UnidadesEnServicio.username'] = $username;
	    $opconditions['Operadores.id_movil'] = $id_movil ;
	    $chconditions['CambioCanal.id_movil'] = $id_movil ;
	    $chconditions['CambioCanal.username'] = $username ;
	    $chconditions['CambioCanal.fecha'] = $conditions['UnidadesEnServicio.fecha'] ;
	    $chconditions['CambioCanal.turno'] = $turno ;
	    $chconditions['CambioCanal.username'] = $username ;
	    $moment_conditions['FueraDeMomento.id_movil'] = $id_movil ;
	    $moment_conditions['FueraDeMomento.fecha'] = $conditions['UnidadesEnServicio.fecha'] ;
	    $moment_conditions['FueraDeMomento.turno'] = $turno ;
	    $moment_conditions['FueraDeMomento.username'] = $username ;
	}

	$RServicio = $this->UnidadesEnServicio->find("first",array("conditions"=>$conditions));
	$ROperadores = $this->Operadores->find("first",array("conditions"=>$opconditions));
	$RCanal = $this->CambioCanal->find("first",array("conditions"=>$chconditions));
	$RMomento = $this->FueraDeMomento->find("first",array("conditions"=>$moment_conditions));
	if(!empty($RMomento)){
	    for($i=0;$i<=5;$i++){
		$hr_ini = explode(':',$RMomento['FueraDeMomento']["hora_ini_$i"]);
		$hr_fin = explode(':',$RMomento['FueraDeMomento']["hora_fin_$i"]);
		$RMomento['FueraDeMomento']["hora_ini_$i"] = "$hr_ini[0]:$hr_ini[1]";
		$RMomento['FueraDeMomento']["hora_fin_$i"] = "$hr_fin[0]:$hr_fin[1]";
	    }
	}
	if(!empty($RServicio)){
	    $entrada = explode(':',$RServicio['UnidadesEnServicio']['entrada']);
	    $salida = explode(':',$RServicio['UnidadesEnServicio']['salida']);
	    $RServicio['UnidadesEnServicio']['entrada'] = "$entrada[0]:$entrada[1]";
	    $RServicio['UnidadesEnServicio']['salida'] = "$salida[0]:$salida[1]";
	}
	
	$this->set('operators',$ROperadores);
	$this->set("UnidadesEnServicio",$RServicio);
	$this->set('canal',$RCanal);
	$this->set('FueraDeMomento',$RMomento);
	
	$in = $RServicio['UnidadesEnServicio']['entrada'];
	$lista = $RServicio['UnidadesEnServicio']['pase_de_lista'];
	$salida = $RServicio['UnidadesEnServicio']['salida'];
		
	$readonly_ch = array();
	$readonly_ini = array();
	$readonly_fin = array();
		
	for($i=0;$i<6;$i++){
	    if( ($RMomento['FueraDeMomento']["hora_ini_$i"] == NULL) OR ($RMomento['FueraDeMomento']["hora_ini_$i"] == 0 ) ){
		$readonly_ini[] .= "false";
	    }else{
		$readonly_ini[] .= "true" ;
	    }
	}

	for($i=0;$i<6;$i++){
	    if(  ($RMomento['FueraDeMomento']["hora_fin_$i"] == NULL) OR ($RMomento['FueraDeMomento']["hora_fin_$i"] == 0) ){
		$readonly_fin[] .= "false";
	    }else{
		$readonly_fin[] .= "true" ;
	    }
	}
		
	for($i=0;$i<4;$i++){
	    if(  ($RCanal['CambioCanal']["canal_$i"] == NULL) OR ($RCanal['CambioCanal']["canal_$i"] == 0) ){
		$readonly_ch[] .= "false";
	    }else{
		$readonly_ch[] .= "true" ;
	    }
	}
		
	if( ($in == null) OR ($in == 0) ){
	    $readonly_in = false;
	    $in = date('H:i');
	}else{
	    $readonly_in = true;
	}
	
	if( ($salida == null) OR ($salida == 0) ){
	    $readonly_out = false;
	    $out = null;
	    $salida = null;
	}else{
	    $readonly_out = true;
	}
	
	if( ($lista == NULL) OR ($lista == 0) ){
	    $readonly = false;
	    $hir = 'No';
	    $this->set('readonly',$readonly);
	}else{
	    $readonly = true;
	    $hir = $RServicio['UnidadesEnServicio']['pase_de_lista'];
	    $this->set('readonly',$readonly);
	}
	$this->set('readonly_ch',$readonly_ch);
	$this->set('readonly_out',$readonly_out);
	$this->set('hir',$hir);
	$this->set('readonly_in',$readonly_in);
	$this->set('readonly_fin',$readonly_fin);
	$this->set('readonly_ini',$readonly_ini);
	$this->set('in',$in);
	$this->set('salida',$salida);
	$this->set('turno',$turno);
	$this->set('id_movil',$id_movil);
	$this->set('username',$username);
	$this->showRegisters();
/**	TODO :continue with the conditions of the form
 *
 **/
    }
		
    function RegistraLista(){
	$id_servicio = utf8_encode($this->data['UnidadesEnServicio']['id']);
	$id_canal = utf8_encode($this->data['CambioCanal']['id']);
	$id_momento = utf8_encode($this->data['FueraDeMomento']['id']);
	    $this->UnidadesEnServicio->id = $id_servicio;
	    $this->FueraDeMomento->id = $id_momento;
	    $this->CambioCanal->id = $id_canal;
		  /** show me the data **/
// 		  pr($this->data);exit();
		  /** Ok $this->data **/
	if(empty($this->data)){
	    $this->data = $this->UnidadesEnServicio->read();
	    $this->data = $this->FueraDeMomento->read();
	    $this->data = $this->CambioCanal->read();
	}else{
	    if(strlen($this->data['UnidadesEnServicio']['entrada']) == 4){
		$this->data['UnidadesEnServicio']['entrada'] = $this->data['UnidadesEnServicio']['entrada'].'00';
	    }
	    if(strlen($this->data['UnidadesEnServicio']['salida']) == 4){
		$this->data['UnidadesEnServicio']['salida'] = $this->data['UnidadesEnServicio']['salida'].'00';
	    }
// 	    $username = $this->data['UnidadesEnServicio']['username'];
	    $this->data['FueraDeMomento']['username'] = $this->data['CambioCanal']['username'] = $this->data['UnidadesEnServicio']['username'];
	    $FueraDeMomento = $this->data['FueraDeMomento'];
		for($i=0;$i<=5;$i++){
		    if(strlen($FueraDeMomento["hora_ini_$i"])==4){
		    $this->data['FueraDeMomento']["hora_ini_$i"] = $FueraDeMomento["hora_ini_$i"].'00';
		    }
		    if(strlen($FueraDeMomento["hora_fin_$i"])==4){
		    $this->data['FueraDeMomento']["hora_fin_$i"] = $FueraDeMomento["hora_fin_$i"].'00';
		    }
		}
// 		  pr($this->data);exit();
	    $UnitsOnDuty = $this->UnidadesEnServicio->save($this->data['UnidadesEnServicio']);
	    $MomentOut = $this->FueraDeMomento->save($this->data['FueraDeMomento']);
	    $ChannelChange = $this->CambioCanal->save($this->data['CambioCanal']);
		if( $UnitsOnDuty && $MomentOut && $ChannelChange){
		    $this->showRegisters();
		    $this->render('show_units_on_duty','ajax');
		}
	}
    }

  }

?>