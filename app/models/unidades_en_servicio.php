<?php
class UnidadesEnServicio extends AppModel
{
    var $name = "UnidadesEnServicio";
    var $useTable = "unidades_en_servicio";

   /* function getUnidadesServicio()
    {
        $enc_UNIDADES = $this->find("list",array("fields"=>array("id","NUM_TPO_CNP"),"order"=>"NUM_TPO_CNP"));
        return array_map("utf8_encode",$enc_NUM_TPO_CNP);
    }
   */

}
?>
