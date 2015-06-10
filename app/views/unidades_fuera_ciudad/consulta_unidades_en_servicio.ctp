<?php
if(!empty($UnidadesEnServicio))
{
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"UnidadesFueraCiudad",
                    "update"=>"divRegistraEntrada",
                    "url"=>array("controller"=>'UnidadesFueraCiudad',"action"=>"RegistraEntrada"),
                          )
                       )
                )
 );

?>
<table border="0" width="100%">
  <tr align="center">
    <td bgcolor="#537BB0" width="50px">UNIDAD</td>
    <td bgcolor="#537BB0" width="130px">DESTINO</td>
    <td bgcolor="#537BB0" width="130px">SERVICIO</td>
    <td bgcolor="#537BB0" width="90px">SALIDA</td>
    <td bgcolor="#537BB0" >LLEGADA</td>
    <td>&nbsp;</td>
  </tr>

  <tr align="center">
    <td ><?php e($UnidadesEnServicio['UnidadesEnServicio']['id_movil']);e($form->input('UnidadesFueraCiudad.id_movil',array("label"=>false,"type"=>"hidden","value"=>$UnidadesEnServicio['UnidadesEnServicio']['id_movil'])));?></td>
    <td><?php e($form->input('UnidadesFueraCiudad.id_localidad',array("label"=>false,"type"=>"select","options"=>$localidades,"empty"=>"Seleccionar")));?></td>
    <td><?php e($form->input('UnidadesFueraCiudad.id_tpo_servicio',array("label"=>false,"type"=>"select","options"=>$tpo_servicio,"empty"=>"Seleccionar")));?></td>
    <td><?php e($form->input('UnidadesFueraCiudad.hora_salida',array("label"=>false,"type"=>"text","size"=>"4","maxlength" =>"4","value"=>date("Hi"))));?></td>
    <td><?php e($form->input('UnidadesFueraCiudad.hora_llegada',array("label"=>false,"type"=>"text","size"=>"4","maxlength" =>"4")));?></td>
    <td>&nbsp;</td>
    <td><?php e($form->submit("+")); ?></td>
  </tr>	
</table>
<?php
  e($form->end());
}
else
{
    e("<div class='warning'>No se encontró Unidad en Servicio</div>");
}
?>