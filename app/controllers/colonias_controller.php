<?php
class ColoniasController extends AppController
{
    var $name = 'Colonias';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Colonias","Calles");

    function nuevaColonia()
    {
        $this->Colonias->set($this->data['Colonias']);
        $this->Calles->set($this->data['Calles']);
        if($this->Colonias->validates() && $this->Calles->validates())
        {
            if($this->Colonias->save())
            {
                $this->data['Calles']['id_colonia'] = $this->Colonias->getLastInsertID();
                $this->Calles->set($this->data['Calles']);
                if($this->Calles->save())
                {
                    $this->Session->setFlash('Colonia y Calle registradas correctamente', 
                                             'default', array('class'=>'error'));
                    $this->redirect("/servicios_programados/captura");
                }
            }
        }
    }
}
?>