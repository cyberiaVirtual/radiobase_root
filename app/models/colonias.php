<?php
class Colonias extends AppModel
{
    var $name = "Colonias";
    var $useTable = "colonias";
    var $primaryKey = "id_colonia";
    
    var $validate = array(
		'colonia' => array
                        (
                        'requerido'=>array(
                            'rule' => 'isUnique',
                            'required' => 'create',
                            'message' => "Este campo es irrepetible."
                            ),
                        ),);
    
    
    var $hasMany = array(
                          'Calles' => array
                                (
                                'className'  => 'Calles',
                                'foreignKey' => 'id_colonia'
                                )
                           );
    
    
}
