<?php
class UnidadesFueraCiudadController extends AppController
{
    var $name = 'UnidadesFueraCiudad';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("UnidadesEnServicio","UnidadesFueraCiudad","Localidades","TpoServicio",'Operadores');

/** TODO: Rewrite of UnidadesFueraCiudad
 * @code A Not Really Happy Re-Coding! X(
 */
	function localidades($in_var=null){
	    $loc = $this->Localidades->find('all');
	    foreach( $loc as $key => $value ){
		$localidad[ $loc[$key]['Localidades']['id_localidad'] ] = $loc[$key]['Localidades']['localidad'];
	    }
	    $localidades = array_map('utf8_encode',$localidad);
	    if (isset($in_var)) {
		return $localidades;
	    } else {
		$this->set('localidades',$localidades);
	    }

	} //End localidades

	function tpo_servicio($in_var=null){
	    $tpo_srv = $this->TpoServicio->find('all');
	    foreach( $tpo_srv as $key => $value ){
		$tpo_servicio[ $tpo_srv[$key]['TpoServicio']['id_tpo_servicio'] ] = $tpo_srv[$key]['TpoServicio']['tpo_servicio'];
	    }
	    $TpoServicio = array_map('utf8_encode',$tpo_servicio);
	    
	    if (isset($in_var)) {
		return $TpoServicio;
	    } else {
		$this->set('TpoServicio',$TpoServicio);
	    }
	    
	} //End tpo_de_servicio

	function AddLocale(){
	    if($this->data['UnidadesFueraCiudad']['id_localidad'] > 0){
		$id_localidad = $this->data['UnidadesFueraCiudad']['id_localidad'];
		$this->localidades();
		$this->set('id_localidad',$id_localidad);
	    }if($this->data['UnidadesFueraCiudad']['id_localidad'] == 0){
		$NoLocale = true;
		$this->set('NoLocale',$NoLocale);
// 		pr($this->data);exit();
	    }

	} //End AddLocale

	function AddServicioA(){
	    $id_tpo_servicio = $this->data['UnidadesFueraCiudad']['id_tpo_servicio_a'];
	    if(($id_tpo_servicio > 0) OR ($id_tpo_servicio < 2) ){
		$this->tpo_servicio();
		$this->set('id_tpo_servicio',$id_tpo_servicio);
	    }if( ($id_tpo_servicio == 0) ){
		$NoService = true;
		$this->set('NoService',$NoService);
	    }elseif( ($id_tpo_servicio > 2) ){
		$Notext = true;
		$this->set('Notext',$Notext);
	    }
	    
	} //End AddServicioA

	function AddServicioB(){
	    $id_tpo_servicio = $this->data['UnidadesFueraCiudad']['id_tpo_servicio_b'];
	    if(($id_tpo_servicio > 0) OR ($id_tpo_servicio < 2) ){
		$this->tpo_servicio();
		$this->set('id_tpo_servicio',$id_tpo_servicio);
	    }if( ($id_tpo_servicio == 0) ){
		$NoService = true;
		$this->set('NoService',$NoService);
	    }elseif( ($id_tpo_servicio > 2) ){
		$Notext = true;
		$this->set('Notext',$Notext);
	    }
	    
	} //End AddServicioB

	function ShowUnidadesFueraCiudad(){
	    $date = date('Y-m-d');
	    $turno = $_SESSION['Auth']['User']['turno'];
	    $username = $_SESSION['Auth']['User']['username'];
	    $conditions['UnidadesFueraCiudad.turno'] = $turno;
	    $conditions['UnidadesFueraCiudad.fecha'] = $date;
	    $conditions['UnidadesFueraCiudad.username'] = $username;
	    $unidades = $this->UnidadesFueraCiudad->find('all',array('conditions'=>$conditions));
	    $this->localidades();
	    $this->set('unidades',$unidades);
	}

	function index(){
	    $this->ShowUnidadesFueraCiudad();
	}

	function SearchUnidades(){
	    if(empty($this->data['UnidadesFueraCiudad']['data'])){
		e('<div id="warning">Introduzca un Numero de Movil</div>');
		exit();
	    }
	    $id_movil = $this->data['UnidadesFueraCiudad']['data'];
	    if(is_numeric($id_movil)){
	    $date = date('Y-m-d');
	    $turno = $_SESSION['Auth']['User']['turno'];
	    $username = $_SESSION['Auth']['User']['username'];
	    $conditions['UnidadesEnServicio.turno'] = $turno;
	    $conditions['UnidadesEnServicio.fecha'] = $date;
	    $conditions['UnidadesEnServicio.id_movil'] = $id_movil;
	    $conditions['UnidadesEnServicio.username'] = $username;
	    $result = $this->UnidadesEnServicio->find('first',array('conditions'=>$conditions));
	    if(empty($result)){
		$opconditions['Operadores.id_movil'] = $id_movil;
		$rstOp = $this->Operadores->find('first',array('conditions'=>$opconditions));
		$result['UnidadesEnServicio']['id_movil'] = $rstOp['Operadores']['id_movil'];
        e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                La Unidad no se encuentra en el <strong>"Pase de Lista"</strong>
              </div>');
	    }
	    $localidades = $this->localidades(1);
	    $localidades[0] = 'Agregar';
	    $TpoServicio = $this->tpo_servicio(1);
	    $TpoServicio[0] = 'Agregar';
	    $this->ShowUnidadesFueraCiudad();
	    $this->set('TpoServicio',$TpoServicio);
	    $this->set('localidades',$localidades);
	    $this->set('UnidadesFueraCiudad',$result);
	    $this->set('username',$username);
	    }else{
             e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Introduzca un Numero de Movil</strong>
              </div>');
	    } // End movil filter
	}

	function AddUnit(){
	    if(empty($this->data)){
		$this->read($this->data);
	    }if(empty($this->data['UnidadesFueraCiudad']['id_localidad'])){
            e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Seleccione una localidad</strong>
              </div>');
	    }if(empty($this->data['UnidadesFueraCiudad']['id_tpo_servicio_a'])){
            e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Seleccione un Servicio</strong>
              </div>');
	    }else{
// 		pr($this->data);
		$TpoServicio = $this->tpo_servicio(1);
		if(!empty($this->data['UnidadesFueraCiudad']['id_tpo_servicio_a'])){
		    $tpo_1 = $TpoServicio[$this->data['UnidadesFueraCiudad']['id_tpo_servicio_a']];
		    if(!isset($this->data['UnidadesFueraCiudad']['num_tpo_servicio_a'])){
			$this->data['UnidadesFueraCiudad']['num_tpo_servicio_a']=null;
		    }
			$n_tpo_1 = $this->data['UnidadesFueraCiudad']['num_tpo_servicio_a'];
			    if(($n_tpo_1) > 1){
				$tpo_1 .= "s";
			    }
		    $tpo_servicio = "$n_tpo_1 $tpo_1";
		    $this->data['UnidadesFueraCiudad']['tpo_servicio'] = $tpo_servicio;
		}
		if(!empty($this->data['UnidadesFueraCiudad']['id_tpo_servicio_b'])){
		    $n_tpo_1 = $this->data['UnidadesFueraCiudad']['num_tpo_servicio_a'];
		    $n_tpo_2 = $this->data['UnidadesFueraCiudad']['num_tpo_servicio_b'];
		    $tpo_1 = $TpoServicio[$this->data['UnidadesFueraCiudad']['id_tpo_servicio_a']];
		    $tpo_2 = $TpoServicio[$this->data['UnidadesFueraCiudad']['id_tpo_servicio_b']];
		    if(($n_tpo_1) > 1){
			$tpo_1 .= "s";
		    }if(($n_tpo_2) > 1){
			$tpo_2 .= "s";
		    }
		    $tpo_servicio = "$n_tpo_1 $tpo_1 , $n_tpo_2 $tpo_2";
		    $this->data['UnidadesFueraCiudad']['tpo_servicio'] = $tpo_servicio;
		}elseif( ( empty($this->data['UnidadesFueraCiudad']['id_tpo_servicio_a']) && empty($this->data['UnidadesFueraCiudad']['id_tpo_servicio_b']) )&& empty($this->data['TpoServicio']['tpo_servicio'])){
		    e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Seleccione un Servicio</strong>
              </div>');
		}
// 		pr($this->data);exit();
	    if(isset($this->data['UnidadesFueraCiudad'])){
		$turno = $_SESSION['Auth']['User']['turno'];
		$this->data['UnidadesFueraCiudad']['fecha'] = date('Y-m-d');
		$this->data['UnidadesFueraCiudad']['turno'] = $turno;

		if(strlen($this->data['UnidadesFueraCiudad']['hora_salida'])==4){
		    $this->data['UnidadesFueraCiudad']['hora_salida'] =
		    $this->data['UnidadesFueraCiudad']['hora_salida'].'00';
		}
		if(strlen($this->data['UnidadesFueraCiudad']['hora_llegada'])==4){
		    $this->data['UnidadesFueraCiudad']['hora_llegada'] =
		    $this->data['UnidadesFueraCiudad']['hora_llegada'].'00';
		}

		if(isset($this->data['Localidades']['localidad'])) {
// pr($this->data);exit();
			$this->Localidades->save($this->data['Localidades']);
			$id_localidad = $this->Localidades->getLastInsertId();
		}if(isset($this->data['TpoServicio']['tpo_servicio'])){
// pr($this->data);exit();
			$this->TpoServicio->save($this->data['TpoServicio']);
			$id_tpo_servicio = $this->TpoServicio->getLastInsertId();
		}else{
            e('<div class="alert alert-success" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Registro Creado</strong>
              </div>');
		}
		if(isset($id_localidad)){
		    $this->data['UnidadesFueraCiudad']['id_localidad'] = $id_localidad;
		}if(isset($id_tpo_servicio)){
// 		    $this->data['UnidadesFueraCiudad']['id_tpo_servicio'] = $id_tpo_servicio;
		    $TpoServicio = $this->tpo_servicio(1);
		    $this->data['UnidadesFueraCiudad']['tpo_servicio'] = $TpoServicio[$id_tpo_servicio];
		}
// pr($this->data);exit();
		$this->UnidadesFueraCiudad->save($this->data['UnidadesFueraCiudad']);
		}else{
            e('<div class="alert alert-danger" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Ha ocurrido un Error</strong>
              </div>');
		}

	    }
	    $this->ShowUnidadesFueraCiudad();
	    $this->render('ShowUnidadesFueraCiudad','ajax');
	}

	function EditUnit($id=null){
// 	    pr($this->data);exit();
	    if(empty($this->data)){
		$this->read($this->data);
	    }else{
		if(!empty( $this->data['UnidadesFueraCiudad'] )){
		  $UnidadesFueraCiudad = $this->data['UnidadesFueraCiudad'];
		  foreach($UnidadesFueraCiudad as $key => $unidad){
		      if(strlen($unidad['hora_llegada'])==4)
			  $this->data['UnidadesFueraCiudad'][$key]['hora_llegada'] = $this->data['UnidadesFueraCiudad'][$key]['hora_llegada'].'00';
		  } // End foreach $UnidadesFueraCiudad

		$this->UnidadesFueraCiudad->set($this->data['UnidadesFueraCiudad']);
		if($this->UnidadesFueraCiudad->saveAll()){
		    $this->layout=false;
            e('<div class="alert alert-success" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Registros Actualizados</strong>
              </div>');
		}
		}
	    }

	} // End EditUnit
	
	function delete($id){
	    if ($this->UnidadesFueraCiudad->delete($id)){
		$this->redirect(array('action' => 'index'));
	    }
	}
















    
/** ALERT: I don't know why but this is not working
 *  @fixit have some issues but i don't where
 */
    function registrosActuales()
    {
        $date = date('Y-m-d');
        $turno = $_SESSION['Auth']['User']['turno'];
	$conditions = array();
        $conditions['UnidadesFueraCiudad.fecha'] = "$date";
        $conditions['UnidadesFueraCiudad.turno'] = "$turno";
        
        $Registros = $this->UnidadesFueraCiudad->find("all",array("conditions"=>$conditions,"order"=>"hora_salida DESC"));
        $RegistrosX =  $Registros;
        foreach ($RegistrosX as $key=>$registro)
        {
            //AGREGAR LOCALIDAD
            $id_localidad = $registro['UnidadesFueraCiudad']['id_localidad'];
            $Localidad = $this->Localidades->find("first",array("fields"=>"localidad","conditions"=>array("Localidades.id_localidad"=>$id_localidad)));
            $Registros[$key]['UnidadesFueraCiudad']['localidad'] = $Localidad['Localidades']['localidad'];
            
            //AGREGAR TIPO SERVICIO
            $id_tpo_servicio = $registro['UnidadesFueraCiudad']['id_tpo_servicio'];
            $TpoServicio = $this->TpoServicio->find("first",array("fields"=>"tpo_servicio","conditions"=>array("TpoServicio.id_tpo_servicio"=>$id_tpo_servicio)));
            $Registros[$key]['UnidadesFueraCiudad']['tpo_servicio'] = $TpoServicio['TpoServicio']['tpo_servicio'];
        }
        $this->set("Registros",$Registros);
    } 
    
    function captura()
    {
	$this->registrosActuales();
    }
        
    function consultaUnidadesEnServicio()
    {
	$conditions = array();
	$id_movil = utf8_encode($this->data['UnidadesEnServicio']['id_movil']);
        if(is_numeric($id_movil))
        {
            $conditions['UnidadesEnServicio.id_movil'] = $id_movil;
        }
	
        $Resultado = $this->UnidadesEnServicio->find("first",array("conditions"=>$conditions));
	$this->set("localidades",$this->Localidades->getLocaliades());
	$this->set("tpo_servicio",$this->TpoServicio->getTpoServicio());
        $this->set("UnidadesEnServicio",$Resultado);
    }
	
    function RegistraEntrada()
    {
        $this->data['UnidadesFueraCiudad']['fecha'] = date('Y-m-d');
        $this->data['UnidadesFueraCiudad']['turno'] = $_SESSION['Auth']['User']['turno'];
	
        if(strlen($this->data['UnidadesFueraCiudad']['hora_salida'])==4) 
            $this->data['UnidadesFueraCiudad']['hora_salida'] = 
                $this->data['UnidadesFueraCiudad']['hora_salida'].'00';
        
        if(strlen($this->data['UnidadesFueraCiudad']['hora_llegada'])==4)
            $this->data['UnidadesFueraCiudad']['hora_llegada'] = 
                $this->data['UnidadesFueraCiudad']['hora_llegada'].'00';

        $this->UnidadesFueraCiudad->set($this->data['UnidadesFueraCiudad']);
        if($this->UnidadesFueraCiudad->save())
        {
            $this->registrosActuales();
	    $this->render('registros_fuera_ciudad','ajax');
        }
        else{
                e('<div class="error">Error</div>');
                 exit();
            }
    }
	
    function RegistraSalida()
    {	
        $Unidades = $this->data['UnidadesFueraCiudad'];
        foreach ($Unidades as $key=>$unidad)
        {
            if(strlen($unidad['hora_llegada'])==4)
                $this->data['UnidadesFueraCiudad'][$key]['hora_llegada'] = $this->data['UnidadesFueraCiudad'][$key]['hora_llegada'].'00';
        }
        
        $this->UnidadesFueraCiudad->set($this->data['UnidadesFueraCiudad']);
        if($this->UnidadesFueraCiudad->saveAll())
        {
          e('<div class="success">Llegada(s) Registrada(s)</div>');
          $this->registrosActuales();
          $this->render('registros_fuera_ciudad','ajax');
	}		
    }   
}
?>