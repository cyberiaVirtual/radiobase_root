<?php
class Cp extends AppModel
{
    var $name = "Cp";
    var $useTable = "cp";
    var $primaryKey = "id";

//     function getLocaliades()
//     {
//         $enc_localidades = $this->find("list",array("fields"=>array("id_localidad","localidad"),"order"=>"localidad"));
//         return array_map("utf8_encode",$enc_localidades);
//     }
   

}
?>
