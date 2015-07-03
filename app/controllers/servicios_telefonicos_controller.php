<?php

    class ServiciosTelefonicosController extends AppController{

      var $name = 'ServiciosTelefonicos';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript');
      var $uses = array('ServiciosTelefonicos','Operadores','UnidadesEnServicio','Ciudades','Localidades','Colonias','Calles','Phones','Cp');

    function street()
    {
        $st = $this->Calles->find('all');
        if(!empty($st))
        {
            foreach( $st as $key => $value )
            {
                $street[ $st[$key]['Calles']['id_calle'] ] = $st[$key]['Calles']['calle'];
            }
        }else{
            $street=null;
        }
        $this->set('street',$street);
    } //End street

    function colonias(){
    $col = $this->Colonias->find('all');
	foreach( $col as $key => $value ){
	  $colony[ $col[$key]['Colonias']['id_colonia'] ] = $col[$key]['Colonias']['colonia'];
	}
	$colonia = array_map('utf8_encode',$colony);
      $this->set('colonia',$colonia);
    } //End colonias

    function ShowStreet(){
	$this->data['Calles']['colonia'] = $this->data['Calles']['id_colonia'];
	$conditions['Calles.id_colonia'] = $this->data['Calles']['colonia'];
	$street = $this->Calles->find("list",array("fields"=>array("id_calle","calle"),"conditions"=>$conditions));
	$street[0] = 'Agregar Calle';
// 	array_order($street,'DESC');
	$this->set('IdColonia',$this->data['Calles']['colonia']);
	$this->set("Calles",$street);
    }

    function NoStreet(){
// 	pr($this->data);exit();
      if( $this->data['Phones']['id_calle'] > 0 ){
	  $conditions['Calles.id_calle'] = $this->data['Phones']['id_calle'];
	  $ro=true;
	  $nostreet = $this->Calles->find('first',array('conditions'=>$conditions));
	  $stconditions['Calles.id_colonia'] = $nostreet['Colonia']['id_colonia'];
	  $st = $this->Calles->find('list',array('fields'=>array('id_calle','calle'),'conditions'=>$stconditions));
	  $this->set('opt',$st);

      }elseif($this->data['Phones']['id_calle'] == 0 ){
	  $ro=false;
	  $nostreet = null ;
      }
      $this->set('ro',$ro);
      $this->set('nostreet',$nostreet);
    } //End NoStreet


      function ShowPhoneServices(){
      $st=null;
      $conditions['ServiciosTelefonicos.fecha'] = date('Y-m-d');
      $conditions['ServiciosTelefonicos.turno'] = $_SESSION['Auth']['User']['turno'];
      $conditions['ServiciosTelefonicos.username'] = $_SESSION['Auth']['User']['username'];
      $ServiciosTelefonicos = $this->ServiciosTelefonicos->find('all',array('conditions'=>$conditions,'order'=>'hora DESC'));
      $street = $this->Calles->find('all');
	  foreach( $street as $key => $value ){
	    $st[ $street[$key]['Calles']['id_calle'] ] = $street[$key]['Calles']['calle'];
	  }
	  $ServiciosTelefonicos_aux = $ServiciosTelefonicos;
	  foreach($ServiciosTelefonicos as $key => $data){
	    $ServiciosTelefonicos[$key]['ServiciosTelefonicos']['calle'] = $st[$ServiciosTelefonicos[$key]['ServiciosTelefonicos']['id_calle']];
	  }
      $this->set('ServiciosTelefonicos',$ServiciosTelefonicos);
      }

	function index() {
	$this->ShowPhoneServices();
	}
	
	function SearchPhone() {
	if(empty($this->data['Phones']['data'])){
         e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                Ingrese un <strong>Número Telefónico</strong>
              </div>');
	    exit();
	}
    
	$search_address = null ;
	$search_phone = null ;
	$search_movil = null ;
	$retPhone = null ;
	$retStreet = null ;
	$RetMovil = null ;
	$movconditions = null;
	$Movil = null;
	$conditions = array();
	$data = explode(".",$this->data['Phones']['data']);
	foreach($data as $key => $value){
	  if( is_numeric($value) && ( strlen($value) > 6 && strlen($value) < 11) ){
	    $search_phone = $value;
	    if(!empty($value)){
	      $conditions['Phones.phone'] = $search_phone ;
	    }
	  }if( is_string($value) && !is_numeric($value) ){
	    $search_address = $value;
	    if(!empty($value)){
	      $stconditions['Calles.calle'] = $search_address ;
	      $retStreet = $this->Calles->find('first',array('conditions'=>$stconditions));
	      $conditions['Phones.id_calle'] = $retStreet['Calles']['id_calle'] ;
	    }
	  }if( is_numeric($value) && ( strlen($value) <= 2 ) ){
	    $search_movil = $value;
	    if(!empty($value)){
	      $movconditions['UnidadesEnServicio.id_movil'] = $search_movil;
	      $movconditions['UnidadesEnServicio.fecha'] = date('Y-m-d');
	      $movconditions['UnidadesEnServicio.turno'] = $_SESSION['Auth']['User']['turno'];
	    }
	  }
	} // end foreach()

	$RetMovil = $this->UnidadesEnServicio->find('first',array('conditions'=>$movconditions));

	if(empty($RetMovil)){
	    $Movil = $search_movil;
        e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                La Unidad no se encuentra en el <strong>"Pase de Lista"</strong>
              </div>');
        
	    if($Movil > 60){
             e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                La <strong>Unidad no Existe</strong>
              </div>');
	      
	    }
	}else{
	    $Movil = $RetMovil['UnidadesEnServicio']['id_movil'];
	}
	
	$retPhone = $this->Phones->find('first',array('conditions'=>$conditions));
	if($retPhone['Phones']['call_and_go'] == 1 ){
	    e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                Este Número Telefónico pertenece al apartado <strong>"Llama y Cuelga"</strong>
              </div>');
	    $Movil = '0' ;
	}
	
	if( ($Movil>0) ){
	  $conOp['Operadores.id_movil'] = $Movil;
	  $economico = $this->Operadores->find('first',array('conditions'=>$conOp));
	  $id_economico = $economico['Operadores']['id_economico'];
	}
	else{
	    $id_economico = 0;
	}

	$this->street();
	$this->colonias();
	$this->set('phones',$retPhone);
	$this->set('telephone',$search_phone);
	$this->set('movil',$Movil);
	$this->set('id_economico',$id_economico);
	$this->ShowPhoneServices();
	}

/** NOTE This for save the records.
 * 
 */	
	function PhoneServices(){
// pr($this->data);exit();
	if(empty($this->data)){
	  $this->read($this->data);
	}if(empty($this->data['Calles']['id_colonia']) AND empty($this->data['ServiciosTelefonicos']['id_colonia'])){
	    e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                Seleccione una<strong>Colonia</strong>
              </div>');
	}if(empty($this->data['Phones']['id_calle']) AND empty($this->data['Phones']['calle']) AND empty($this->data['ServiciosTelefonicos']['id_calle'])){
	    e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                Seleccione o Agregue una<strong>Calle</strong>
              </div>');
	}else{
	$this->data['ServiciosTelefonicos']['username'] = $_SESSION['Auth']['User']['username'];
	$this->data['ServiciosTelefonicos']['turno'] = $_SESSION['Auth']['User']['turno'];
	$this->data['ServiciosTelefonicos']['fecha'] = date('Y-m-d');
	  if(empty($this->data['Calles'])){
// pr($this->data);exit();
	    $this->ServiciosTelefonicos->save($this->data['ServiciosTelefonicos']);
	  }else{
	    $this->data['Phones']['id_localidad'] = $this->data['Calles']['id_localidad'] = $this->data['ServiciosTelefonicos']['id_localidad'];
	    $this->data['Phones']['numero'] = $this->data['ServiciosTelefonicos']['numero'];
	    $this->data['Phones']['lada'] = $this->data['ServiciosTelefonicos']['lada'];
	    //check this
	    $this->data['Phones']['id_colonia'] = $this->data['Calles']['id_colonia'];
	    $this->data['ServiciosTelefonicos']['id_colonia'] = $this->data['Calles']['id_colonia'];
	    //check this
	    if(empty($this->data['Phones']['id_calle'])){
		$this->data['Calles']['calle'] = $this->data['Phones']['calle'];
		$this->Calles->save($this->data['Calles']);
		$LastIdCalles = $this->Calles->getLastInsertId();
		$this->data['Phones']['id_calle'] = $LastIdCalles ;
		$this->data['ServiciosTelefonicos']['id_calle'] = $LastIdCalles ;
// pr($this->data);exit();
	    $this->Phones->save($this->data['Phones']);
	    $this->ServiciosTelefonicos->save($this->data['ServiciosTelefonicos']);
	    }else{
		$this->data['ServiciosTelefonicos']['id_calle'] = $this->data['Phones']['id_calle'];
// pr($this->data);exit();
	    $this->ServiciosTelefonicos->save($this->data['ServiciosTelefonicos']);
	    $this->Phones->save($this->data['Phones']);
	    }
	  }
	$this->ShowPhoneServices();
	$this->render('ShowPhoneServices','ajax');
	}
	} //End PhoneServices
  }