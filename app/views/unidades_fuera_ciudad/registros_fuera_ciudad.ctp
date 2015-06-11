<div id="divRegistraSalida">
<?php
if(count($Registros)>0)
{
    e($ajax->form(array("type"=>"post",
                        "options"=>array("model"=>"UnidadesFueraCiudad",
                        "update"=>"divRegistraSalida",
                        "url"=>array("controller"=>'UnidadesFueraCiudad',"action"=>"RegistraSalida"),
                              )
                           )
                    )
     );
?>
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr align="center" bgcolor="#537BB0">
          <td width="50px">UNIDAD</td>
          <td width="130px">DESTINO</td>
          <td width="130px">SERVICIO</td>
          <td width="90px">SALIDA</td>
          <td width="110px" >LLEGADA</td>
          <td colspan="2">MON</td>
        </tr>
  </thead>
  <tbody>
    <?php
      foreach($Registros as $key=>$registro)
      {
         ?>
           <tr align="center">
           <td><?php e($registro['UnidadesFueraCiudad']['id_movil']);e($form->input('UnidadesFueraCiudad.'.$key.'.id',array("label"=>false,"type"=>"hidden","value"=>$registro['UnidadesFueraCiudad']['id'])));?></td>
           <td><?php e($registro['UnidadesFueraCiudad']['localidad']);?></td>
           <td><?php e($registro['UnidadesFueraCiudad']['tpo_servicio']);?></td>
           <td><?php e($registro['UnidadesFueraCiudad']['hora_salida']);?></td>
           <td><?php 
            $h_llegada = ($registro['UnidadesFueraCiudad']['hora_llegada']=='00:00:00') ? '' :$registro['UnidadesFueraCiudad']['hora_llegada'];
            e($form->input('UnidadesFueraCiudad.'.$key.'.hora_llegada',array("label"=>false,"type"=>"text","size"=>"6","maxlength" =>"8","onKeyPress"=>"return soloNumeros(event)","value"=>$h_llegada,"onFocus"=>"this.value='';")));?></td>
           <td><?php 
            $checked = ($registro['UnidadesFueraCiudad']['mom_r']=='1') ? 'true' :'false';		

            e($form->input('UnidadesFueraCiudad.'.$key.'.mom_r',array("label"=>false,"type"=>"checkbox","value"=>$registro['UnidadesFueraCiudad']['mom_r'],"checked"=>$checked)));?></td>
           <td>&nbsp</td>

           </tr>
         <?php
      }
    ?>
    <tr><td align="right" colspan="5">&nbsp;</td><td colspan="2" align="center"><?php e($form->submit("Act. Datos"));?></td></tr>
</tbody>
</table>
<?php
}
e($form->end());
?>
</div>