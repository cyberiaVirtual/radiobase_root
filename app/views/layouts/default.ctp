<!DOCTYPE html>
<html lang="es">
<head>
  <?php echo $this->Html->charset();?>
  <title><?php echo $title_for_layout?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
    <?php
        e($this->Html->css('bootstrap.min', 'stylesheet'));
        e($this->Html->css('style', 'stylesheet'));
    ?>
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->
    <?php
        e($this->Html->script('jquery.min'));
        e($this->Html->script('bootstrap.min'));
        e($this->Html->script('scripts'));
    ?>
</head>

<body>
    <?php 
    $link = (isset($_SESSION['Auth']['User']['id'])) ? 'logout' : 'login' ;
    ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				
			</div>
		
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="#"><?php e($html->image("taxi.png",array('width'=>'28px','height'=>'28px')));?></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  
                    <ul class="nav navbar-nav">
					<?php
                        if(isset($_SESSION['Auth']['User']['id']))
                        {
                        ?>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Unidades<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'UnidadesEnServicios/')?>">En Servicio</a></li>
                                <li><a href="<?php e($this->webroot.'operators/')?>">Operadores</a></li>
                                <li><a href="<?php e($this->webroot.'unidades_fuera_ciudad/')?>">Fuera de la Ciudad</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php e($this->webroot.'servicios_programados/captura')?>">Servicios Programados</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servivios<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'servicios_telefonicos/')?>">Bitácora</a></li>
                                
                                <li class="divider"></li>
                                <li><a href="<?php e($this->webroot.'call_and_go/index')?>">Directorio</a></li>
                              </ul>
                            </li>
                            <li><a href="<?php e($this->webroot.'reportes')?>">Reportes</a></li>
                    <?php
                        }
                    ?>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(!isset($_SESSION['Auth']['User']['id']))
                        {
                        ?>
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                        <?php
                        }else{
                            ?>
                            <li><a href="<?php e($this->webroot.'Users/'.$link)?>"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
                            <?php
                        }
                        ?>
                       
				  </ul>
				</div>
			  </div>
			</nav>
			<div class="clearfix"></div>
            <?php
                if(!isset($_SESSION['Auth']['User']['id']))
                {
                ?>
                    <div class="container-fluid">
                       <div class="row">
                           <?php e($html->image("header_app.jpeg",array('class'=>'img-responsive')));?>

                       </div>
                    </div>
                <?php
                }
            ?>
			<br/>
            <div class="row clearfix" style="height: 700px">
				<div class="col-md-12 column">
					<?php echo $content_for_layout ?>
                    <?php e($this->Session->flash()); ?>
				</div>
			</div>
		</div>
        
	</div>
</div>
<div class="row clearfix">
    
    <footer id="footer" class="navbar-fixed-bottom">
      <div class="container" role="contentinfo">
        <div class="row">
          <div class="col-sm-12">
          	
            
          </div>
        </div><!--/row-->

        <div class="row">
        	<div class="col-md-12">
              	<p class="text-right">
              	GNU Licencia. Desarrollado por <a href="http://cyberiavirtual.org" rel="nofollow">Cyberia Virtual</a>.
                </p>
          	</div>
        </div><!--/row-->
      </div>
    </footer>
</div>
</body>
</html>