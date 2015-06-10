<?php
    class OperatorsController extends AppController{

      var $name = 'Operators';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript','Js');
      var $uses = array('Operadores','Ciudades','Localidades','Colonias','Calles','Phones','Cp');
 
    function index(){
	$this->ShowOperators();
    }

    function street(){
    $st = $this->Calles->find('all');
	foreach( $st as $key => $value ){
	  $street[ $st[$key]['Calles']['id_calle'] ] = $st[$key]['Calles']['calle'];
	}
      $this->set('street',$street);
    } //End street for views only

    function ShowOperators(){
    $op = $this->Operadores->find('all');
	$op_aux = $op;
	foreach($op_aux as $key => $value){
	    $id_op[$op_aux[$key]['Operadores']['id']]=$op_aux[$key]['Operadores']['id_movil'];
	}
      $this->set('id_op',$id_op);
      $this->set('op',$op);
    }

    function SearchOperator(){
      $this->ShowOperators();
      $movil = $this->data['Operadores']['data'];
      $conditions['Operadores.id_movil'] = $movil;
      $ret_op = $this->Operadores->find('first',array('conditions'=>$conditions));

      if(!empty($ret_op)){
	  $select = true;
      }else{
	  $select = false;
      }

      $this->set('movil',$movil);
      $this->set('select',$select);
      $this->set('operador',$ret_op);
    }
    
    function EditOperators(){
	if(empty($this->data)){
	  $this->read($this->data);
	}else{
	  if(!empty( $this->data['Operadores']['id'] )){
	      $this->Operadores->id = $this->data['Operadores']['id'];
	      $this->Operadores->save($this->data['Operadores']);
	  }else{
	      $this->Operadores->save($this->data['Operadores']);
	  }
	}
	  $this->ShowOperators();
	  $this->render('ShowOperators','ajax');
    }


    }	//End Operators Controller
?>