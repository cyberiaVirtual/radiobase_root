<?php 
    e($form->input('ServiciosProgramados.id_calle',
             array("id"=>"id_calle",
                   "label"=>false,
                   "type"=>"select",
                   "options"=>$Calles,
                   "empty"=>"-Calles-",
                   "class"=>"form-control"
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