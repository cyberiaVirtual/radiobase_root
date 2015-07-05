<?php 
    e($form->input('ServiciosProgramados.id_calle',
             array("id"=>"id_calle",
                   "label"=>false,
                   "type"=>"select",
                   'class'=>'form-control',
                   "options"=>$Calles,
                   "empty"=>"-Calles-",
                  ))
    );
    
    
    e($ajax->observeField('id_calle',
    array("url"=>array("controller"=>"Calles",
                       "action"=>"muestraCalles/$id_colonia"
                       ),
          "update" => "divCalles"
         )
  ));
?>