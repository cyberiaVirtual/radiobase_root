<div id="divRegistraKY">
<?php
e($ajax->form(array("type"=>"post",
                       "options"=>array(
                                        "model"=>"Colonias",
                                        "update"=>"divRegistraSP",
                                        "url"=>array("controller"=>'Colonias',"action"=>"nuevaColonia"),
                                       )
                   )
             )
 );
?>
    <table border="0">
        <tr>
            <td>Nombre Colonia</td>
            <td>Nombre Calle</td>
        </tr>
        <tr>
            <td><?php e($form->input('Colonias.colonia',array("label"=>false,"type"=>"text","class"=>"form-control")));?></td>
            <td><?php e($form->input('Calles.calle',array("label"=>false,"type"=>"text","class"=>"form-control")));?></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><?php e($form->submit("Registrar",array("class"=>"btn btn-info")));?></td>
        </tr>
    </table>
<?php
e($form->end());
?>
</div>