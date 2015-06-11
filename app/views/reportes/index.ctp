<?php //Reportes/index.ctp ?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array(
                    "update"=>"divReportes",
                    "url"=>array("controller"=>'Reportes',"action"=>"SearchReportes"),)
                   )
             )
 );
      if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')){
	$firefox = true;
      }else{
	$firefox = null;
      }
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title">Impresi&oacute;n de Reportes</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p><div class="form-group">
          <?php
		if(!empty($firefox)){
		  e($this->Form->input('Reportes.data',
				    array('type' => 'date',
					  'label'=>false,
					  'class'=>'form-control',
					  'value'=>date('Y-m-d'),
					  'dateFormat' => 'YMD',
					  'minYear' => date('Y')-2,
					  'maxYear' => date('Y'),
					  'separator'=>'/',
					  "onKeyPress"=>"return soloNumeros(event)",
					  'placeholder'=>'Buscar registro => Ingresa Fecha en formato (yy-mm-dd) (alt+shift+b)'
					 )
				     )
		   );
		}if(!empty($w3m)){
		  e($this->Form->input('Reportes.data',
				    array('type' => 'text',
					  'label'=>false,
					  'class'=>'form-control',
					  'value'=>date('Y-m-d'),
					  "onKeyPress"=>"return soloNumeros(event)",
					  'placeholder'=>'Buscar registro => Ingresa Fecha en formato (yy-mm-dd) (alt+shift+b)'
					 )
				     )
		   );
		}else{
		  e($this->Form->text('Reportes.data',
				    array('type' => 'date',
					  'label'=>false,
					  'class'=>'form-control',
					  'value'=>date('Y-m-d'),
					  'dateFormat' => 'YMD',
					  'min' => '2010-08-14',
					  'max' => '2032-12-31',
					  'separator'=>'/',
					  "onKeyPress"=>"return soloNumeros(event)",
					  'placeholder'=>'Buscar registro => Ingresa Fecha en formato (yy-mm-dd) (alt+shift+b)'
					 )
				     )
		   );
		}
	      ?>
      </div></p>
      <p>
		  <?php
		  e($form->button('Enviar',array("label"=>false,"class"=>"btn btn-info")));
	      ?>
      </p>
  </div>
</div>

<?php e($form->end());?>
    <div id='divReportes'>
	<?php
// 	    include('search_reportes.ctp');
	?>
    </div>



