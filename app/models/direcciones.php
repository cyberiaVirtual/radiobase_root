<?php
class Direcciones extends AppModel
{
    var $name = "Direcciones";
    var $useTable = "calles";
    var $primaryKey = "id_calle";
    var $recursive = 2;
    
    var $hasOne = array(
                          'Colonia' => array
                                (
                                'className'  => 'Colonia',
                                'foreignKey' => 'id_colonia'
                                ),
                           'Localidad' => array
                                (
                                'className'  => 'Localidades',
                                'foreignKey' => 'id_localidad'
                                ),
                          
                           );
}
?>