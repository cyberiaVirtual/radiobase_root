<?php
class Localidades extends AppModel
{
    var $name = "Localidades";
    var $useTable = "localidades";
    var $primaryKey = "id_localidad";
    var $recursive = 2;
    
    var $hasOne = array(
                          'Ciudad' => array
                                (
                                'className'  => 'Ciudades',
                                'foreignKey' => 'id_ciudad'
                                )
                           );
    
    function getLocaliades()
    {
        $enc_localidades = $this->find("list",array("fields"=>array("id_localidad","localidad"),"order"=>"localidad"));
        return array_map("utf8_encode",$enc_localidades);
    }
   

}
?>
