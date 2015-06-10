<?php
class TpoServicio extends AppModel
{
    var $name = "TpoServicio";
    var $useTable = "tpo_servicio";
    var $primaryKey = "id_tpo_servicio";

    function getTpoServicio()
    {
        $enc_tpoServicio = $this->find("list",array("fields"=>array("id_tpo_servicio","tpo_servicio"),"order"=>"tpo_servicio"));
        return array_map("utf8_encode",$enc_tpoServicio);
    }
   

}
?>
