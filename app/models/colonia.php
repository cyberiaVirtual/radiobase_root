<?php
class Colonia extends AppModel
{
    var $name = "Colonia";
    var $useTable = "colonias";
    var $primaryKey = "id_colonia";
    var $recursive = 2;
    
    function getColonias()
    {
        $enc_colonias = $this->find("list",array("fields"=>array("id_colonia","colonia"),"order"=>"colonia"));
        return array_map("utf8_encode",$enc_colonias);
    }
}
