<?php
class CallesController extends AppController
{
    var $name = 'Calles';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Calles");
    
    function muestraCalles($id_colonia="00")
    {
        $this->set("id_colonia",$id_colonia);
        $this->set("id_calle",  $this->data['ServiciosProgramados']['id_calle']);
        if($this->data['ServiciosProgramados']['id_calle']!="00")
        {        
            $conditions = array("Calles.id_colonia"=>$id_colonia);
            $Calles = $this->Calles->find("list",array("fields"=>array("id_calle","calle"),"conditions"=>$conditions));
            $Calles["00"] = "-Otra-";
            $this->set("Calles",$Calles);
        }else
            {
            $this->set("Calles",array());
            }
    }
}
?>
