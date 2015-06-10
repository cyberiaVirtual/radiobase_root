<?php
echo $form->create('User', array('action' => 'login','id'=>'form2','class'=>'form-horizontal','role'=>'form'));
?>
    <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
        <div class="col-sm-10">
            <?php echo $form->input('username',
                array("label"=>false,
                  "class"=>"form-control"

                 )
               );
            ?>
        </div>
    </div>
    <div class="form-group">
         <label for="inputPassword3" class="col-sm-2 control-label">Clave</label>
        <div class="col-sm-10">
             <?php echo $form->input('password',
                array("label"=>false,
                      "class"=>"form-control"
                     )
                     );
             ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-default">Aceptar</button>
        </div>
    </div>
    <?php echo $form->end(); ?>