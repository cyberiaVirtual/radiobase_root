<?php
e($ajax->form(array("type"=>"post",
                       "options"=>array("model"=>"UnidadesEnServicio",
                                        "update"=>"divUnidadEnServicio",
                                        "url"=>array("controller"=>'UnidadesFueraCiudad',
						     "action"=>"consultaUnidadesEnServicio"),
                                        )
                       )
                )
 );
?>
<fieldset>
    <legend><b>UNIDADES FUERA DE LA CIUDAD</b></legend>
    <table width="100%" border="0" align="center">
        <tr valign="top">
            <td width="80px" align="right"><b>ID MOVIL:</b></td>
            <td align="center" width="60px">
		<?php
		    e($form->input('UnidadesEnServicio.id_movil',
					array("label"=>false,
					      "type"=>"text",
					      "size"=>"4",
					      "maxlength" =>"4",
					      "onKeyPress"=>"return soloNumeros(event)"
					      )
				   )
		     );
		?>
	    </td>
            <td align="center" width="60px">
		<?php
		    e($form->end());
		?>
	    </td>
            <td><div id ="divUnidadEnServicio"></div></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td>
		<div id='divRegistraEntrada'>
		    <?php include ('registros_fuera_ciudad.ctp');?>
		</div>
	    </td>
        </tr>
    </table>
<br/>
</fieldset>