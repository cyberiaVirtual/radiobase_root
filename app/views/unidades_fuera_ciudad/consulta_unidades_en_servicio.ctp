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
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr align="center">
        <td bgcolor="#537BB0" width="50px">UNIDAD</td>
        <td bgcolor="#537BB0" width="130px">DESTINO</td>
        <td bgcolor="#537BB0" width="130px">SERVICIO</td>
        <td bgcolor="#537BB0" width="90px">SALIDA</td>
        <td bgcolor="#537BB0" >LLEGADA</td>
        <td>&nbsp;</td>
      </tr>
    </thead>
    <tbody>
      <tr align="center">
        <td ><?php e($UnidadesEnServicio['UnidadesEnServicio']['id_movil']);e($form->input('UnidadesFueraCiudad.id_movil',array("label"=>false,"type"=>"hidden","value"=>$UnidadesEnServicio['UnidadesEnServicio']['id_movil'])));?></td>
        <td><?php e($form->input('UnidadesFueraCiudad.id_localidad',array("label"=>false,"type"=>"select",'class'=>'form-control',"options"=>$localidades,"empty"=>"Seleccionar")));?></td>
        <td><?php e($form->input('UnidadesFueraCiudad.id_tpo_servicio',array("label"=>false,"type"=>"select",'class'=>'form-control',"options"=>$tpo_servicio,"empty"=>"Seleccionar")));?></td>
        <td><?php e($form->input('UnidadesFueraCiudad.hora_salida',array("label"=>false,"type"=>"text",'class'=>'form-control',"maxlength" =>"4","value"=>date("Hi"))));?></td>
        <td><?php e($form->input('UnidadesFueraCiudad.hora_llegada',array("label"=>false,"type"=>"text",'class'=>'form-control',"maxlength" =>"4")));?></td>
        <td>&nbsp;</td>
        <td><?php e($form->submit("+",array("class"=>"btn btn-info pull-right"))); ?></td>
      </tr>
    </tbody>
</table>
</div>
<?php
  e($form->end());
}
else
{
     e('<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>No se encontró Unidad en Servicio</strong>
              </div>');
}