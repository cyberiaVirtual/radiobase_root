<?php
    class CallAndGoController extends AppController{

      var $name = 'CallAndGo';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript','Js'=>array('Jquery'));
      var $uses = array('Ciudades','Localidades','Colonias','Calles','Phones','ServiciosProgramados');
//       var $paginate = array('Phones' => array('limit' => 2));

    function street(){
      $st = $this->Calles->find('all');
      if(!empty($st)){
	foreach( $st as $key => $value ){
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

    function index(){
	$this->ShowPhones();
	
	/** ALERT for work only in the index
	 */
// 	$phones = $this->paginate('Phones');
// 	$this->set(compact('phones'));
    }

    function ShowPhones(){
      $phones = $this->Phones->find('all');
    $this->colonias();
    $this->street();
    $this->set('phones',$phones);
    /** ALERT the paginator works in all pages whith errors
    */
// 	$phones = $this->paginate('Phones');
// 	$this->set(compact('phones'));
    }

    function SearchPhones(){
    $this->street();
    $this->colonias();
    $conditions['Phones.phone'] = $this->data['Phones']['data'];
    $RetPhone = $this->Phones->find('first',array('conditions'=>$conditions));
    if(empty($RetPhone)){
        e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                No se Encuentra el<strong> Teléfono en el Registro</strong>
              </div>
              <div class="alert alert-info" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                Llena los Siguientes Campos para Registrar el Número Telefónico
              </div><div class="clear"></div>');
    }
	$this->set('FindPhone',$RetPhone);
	$this->ShowPhones();

    }
    
    function EditPhones(){
	if(empty($this->data)){
	  $this->read($this->data);
	}else{
	  if(!empty( $this->data['Phones']['id'] )){
	      $this->Phones->id = $this->data['Phones']['id'];
	      if(!empty($this->data['Calles']['colonia'])){
	      $this->data['Phones']['id_colonia'] = $this->data['Calles']['colonia'];
	      }
// 	    pr($this->data); exit();
	      $this->Phones->save($this->data['Phones']);
	  }else{
	      if(empty($this->data['Phones']['phone']) OR empty($this->data['Calles']['colonia']) OR /*empty($this->data['Phones']['id_calle']) OR*/ empty($this->data['Phones']['numero'])){

           e('<div class="alert alert-danger" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                Los Campos (*)<strong> Son Obligatorios</strong>
              </div>');
		  $this->redirect(array('action' => 'SearchPhones'));
	      
	      }else{
		$this->data['Phones']['id_colonia'] = $this->data['Calles']['colonia'];
		$this->data['Calles']['id_colonia'] = $this->data['Calles']['colonia'];

		if(empty($this->data['Phones']['id_calle'])){
		$this->data['Calles']['calle'] = $this->data['Phones']['calle'];
		$this->Calles->save($this->data['Calles']);
		$LastIdCalles = $this->Calles->getLastInsertId();
		$this->data['Phones']['id_calle'] = $LastIdCalles;
		$this->Phones->save($this->data['Phones']);
		}else{
// 	      pr($this->data); exit();
		$this->Phones->save($this->data['Phones']);
		}
	      }
	  }
	}
	  $this->ShowPhones();exit();
	  $this->render('ShowPhones','ajax');
    }

    function delete($id){
	if ($this->Phones->delete($id)){
	    $this->redirect(array('action' => 'index'));
    	}
    }

/**
  ALERT : This not longer works => Fucking Jquery
*/
//     function counter(){
// 
//     $conditions['ServiciosProgramados.turno'] = $_SESSION['Auth']['User']['turno'];;
// //     $conditions['ServiciosProgramados.week'] = date('w');
//     $conditions['ServiciosProgramados.fecha'] = date('Y-m-d');
// 
//     $Chronos=$this->ServiciosProgramados->find('list',array('fields'=>array('hora'),'conditions'=>$conditions));
// 
//     $chronos = $Chronos;
//     $idx = count($Chronos);
// 
// 	$this->set('chronos',$Chronos);
// 	$this->set('idx',$idx);
//     }
    
    function notification(){}
/**
  END This => ALERT
*/


    }	//End CallAndGo Controller
?>
      