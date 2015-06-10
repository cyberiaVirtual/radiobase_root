<?php
class Ciudades extends AppModel
{
    var $name = "Ciudades";
    var $useTable = "ciudades";
    var $primaryKey = "id_ciudad";
    var $recursive = 2;
    
    var $hasMany = array(
                          'Localidades' => array
                                (
                                'className'  => 'Localidades',
                                'foreignKey' => 'id_localidad'
                                )
                           );
}
?>
