<?php 

if($id_calle!="00")
{
    e($form->input('ServiciosProgramados.id_calle',array
        ("id"=>"id_calle",
        "label"=>false,
        "class"=>"form-control",
        "type"=>"select",
        "options"=>$Calles,
        "empty"=>"-Calles-")));
    e($ajax->observeField('id_calle',
    array("url"=>array("controller"=>"Calles",
                       "action"=>"muestraCalles/$id_colonia"
                       ),
          "update" => "divCalles"
         )
));
    
}else
    {
        e($form->input('Calles.id_colonia',array("label"=>false,"type"=>"hidden", "value"=>$id_colonia)));
        e($form->input('Calles.calle',array("label"=>false,"type"=>"text","class"=>"form-control")));
    }