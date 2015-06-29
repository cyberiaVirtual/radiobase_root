<?php
class ServiciosProgramadosController extends AppController
{
    var $name = 'ServiciosProgramados';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("UnidadesEnServicio","ServiciosProgramados","Ciudades","Localidades","Colonia","Calles");

    function muestraCalles()
    {
        if($this->data['ServiciosProgramados']['id_colonia']!="00")
        {
            $conditions = array("Calles.id_colonia"=>$this->data['ServiciosProgramados']['id_colonia']);
            $Calles = $this->Calles->find("list",array("fields"=>array("id_calle","calle"),"conditions"=>$conditions));
            $Calles["00"] = "-Otra-";
            $this->set("id_colonia",$this->data['ServiciosProgramados']['id_colonia']);
            $this->set("Calles",$Calles);
        }
        else{
                $this->render("/colonias/nueva_colonia","ajax");
            }
    }
    
    function Captura()
    {
        $conditions=array();
        $turno = $_SESSION['Auth']['User']['turno'];
        $conditions['ServiciosProgramados.turno'] = $turno;
//         $conditions['ServiciosProgramados.week'] = date('W');
        $this->data = $this->ServiciosProgramados->find("all",array('conditions'=>$conditions,"order"=>"hora"));
        
        $this->set("Calles",array());
        $Colonias = $this->Colonia->getColonias();
        //$Colonias["00"] = "-Otra-";
        $this->set("Colonias",$Colonias);
        $this->set("Registros",$this->data);
        $this->set('hir',true);
    }
    
    function registraNSP()
    {
// 	pr($this->data);exit();
        //FORMATO HORA HHMM OBLIGATORIO
        if(strlen($this->data['ServiciosProgramados']['hora'])==4 && 
           $this->data['ServiciosProgramados']['hora']!='' && 
           is_numeric($this->data['ServiciosProgramados']['hora'])
          )
        {
            if(
                ( //SELECCION CATALOGO EXISTENTE)
                  isset($this->data['ServiciosProgramados']['id_colonia']) && isset($this->data['ServiciosProgramados']['id_calle']) &&
                  $this->data['ServiciosProgramados']['id_colonia']!='' && $this->data['ServiciosProgramados']['id_calle']!=''
                ) || 
                ( //NUEVA CALLE
                  $this->data['ServiciosProgramados']['id_colonia']!='' && isset($this->data['Calles']) && $this->data['Calles']['calle']!=''
                )
              )
            {
                if(strlen($this->data['ServiciosProgramados']['hora'])==4 && is_numeric($this->data['ServiciosProgramados']['hora']))
                    $this->data['ServiciosProgramados']['hora'] = $this->data['ServiciosProgramados']['hora'].'00';
                
                $this->data['ServiciosProgramados']['numero'] = ($this->data['ServiciosProgramados']['numero']=='') ? 'S/N' : $this->data['ServiciosProgramados']['numero'];
                $this->data['ServiciosProgramados']['username'] = $turno = $_SESSION['Auth']['User']['username'];
                $this->data['ServiciosProgramados']['fecha'] = date("Y-m-d");

                $this->data['ServiciosProgramados']['turno'] = $_SESSION['Auth']['User']['turno'];
// pr($_SESSION['Auth']['User']);

                if(isset($this->data['Calles']))
                {
                    $this->data['Calles']['id_localidad'] = 38;
                    $this->Calles->set($this->data['Calles']);
                    if($this->Calles->save())
                    {
                        $this->data['ServiciosProgramados']['id_calle'] = $this->Calles->getLastInsertID();;
                    }
                }

                $this->ServiciosProgramados->set($this->data['ServiciosProgramados']);
                if($this->ServiciosProgramados->save())
                {
                    $this->Captura();
                    e('<div class="success">Servicio Programado registrado</div>');

                    $this->render('captura','ajax');
                }
            }else
                {
                    $data = $this->data['ServiciosProgramados'];    
                    $this->Captura();
                    $this->data['ServiciosProgramados'] = $data;   
                    $this->muestraCalles();
                    e('<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Debe seleccionar la Colonia y Calle correspondiente!</strong>
                      </div>');
                    $this->render('captura','ajax');
                }
        }else
                {
                    $data = $this->data['ServiciosProgramados'];    
                    $this->Captura();
                    $this->data['ServiciosProgramados'] = $data;   
                    $this->muestraCalles();
                    e('<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Debe ingresar un formato válido de hora [HHMM]!</strong>
                      </div>');
                    $this->render('captura','ajax');
                }
    }

    function registraSP()
    {
        $SP = $this->data['ServiciosProgramados'];
        foreach ($SP as $key=>$sp)
        {
            if(strlen($sp['hora'])==4 && is_numeric($sp['hora']))
                $this->data['ServiciosProgramados'][$key]['hora'] = $this->data['ServiciosProgramados'][$key]['hora'].'00';
            $this->data['ServiciosProgramados'][$key]['fecha'] = date("Y-m-d");
        }

        $this->ServiciosProgramados->set($this->data['ServiciosProgramados']);
        if($this->ServiciosProgramados->saveAll())
        {
          e('<div class="success">Servicio(s) Programado(s) actualizado(s)</div>');
          $this->Captura();
          $this->render('captura','ajax');
	}	
    }
    
    function delete($id){
	if ($this->ServiciosProgramados->delete($id)){
	    $this->redirect(array('action' => 'captura'));
	}
    }
    
}
?>