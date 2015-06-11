<?php //die(); ?>
<?php //pr($phones); ?>
<?php
e($ajax->form(array("type"=>"post",
                    "options"=>array("model"=>"Phones",
                    "update"=>"divPhones",
                    "url"=>array("controller"=>'CallAndGo',"action"=>"SearchPhones"),
			            )
                   )
             )
 );
?>

<?php //Edit Call and Go ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Telefonos Betados</h3>
  </div>
  <div class="panel-body">
      <p><?php e(date('Y-M-d'));?></p>
      <p><div class="form-group"><?php e($form->input('Phones.data',array('type'=>'text','label'=>'Edita Llama y cuelga','class'=>'form-control',"onKeyPress"=>"return soloNumeros(event)",'placeholder'=>'Buscar registro => Ingresa Numero de Telefono (alt+shift+b)')));?></div></p>
  </div>
</div>
<?php e($form->end());?>
    <div id='divPhones'><?php include('show_phones.ctp');?></div>
