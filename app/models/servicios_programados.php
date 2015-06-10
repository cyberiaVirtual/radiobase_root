<?php
class ServiciosProgramados extends AppModel
{
    var $name = "ServiciosProgramados";
    var $useTable = "servicios_programados";
    var $primaryKey = "id";
    var $recursive = 2;
    
    /*var $validate = array(
		'id_colonia' => array
                        (
                        'requerido'=>array(
                            'rule'  => 'notEmpty',
                            'required'=>true,
                            'message' => "Este campo es obligatorio. Favor de ingresarlo."
                            ),
                        ),
                 
                'id_calle' => array
                        (
                        'requerido'=>array(
                            'rule'  => 'notEmpty',
                            'required'=>true,
                            'message' => "Este campo es obligatorio. Favor de ingresarlo."
                            ),
                        ),);*/
    
    var $belongsTo = array(
                        'Calle' => array
                                (
                                'className'  => 'Calles',
                                'foreignKey' => 'id_calle'
                                )
                           );
}
