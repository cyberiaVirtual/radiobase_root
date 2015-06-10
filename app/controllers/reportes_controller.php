<?php

  class ReportesController extends AppController{

      var $name = 'Reportes';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript','Js','GoogleMap','Pdf');
      var $uses = array('ServiciosTelefonicos',
			'ServiciosProgramados',
			'Operadores',
			'UnidadesEnServicio',
			'Ciudades',
			'Localidades',
			'Colonias',
			'Calles',
			'Phones',
			'UnidadesFueraCiudad',
			'TpoServicio',
			'FueraDeMomento',
			'CambioCanal'
		        );

    function UnidadesEnServicio($date=null,$turno=null,$username=null,$in_var=null){
      $all = array();

      $conditions['UnidadesEnServicio.fecha'] = $date;
      $conditions['UnidadesEnServicio.turno'] = $turno;
      $conditions['UnidadesEnServicio.username'] = $username;
      $fconditions['FueraDeMomento.fecha'] = $date;
      $fconditions['FueraDeMomento.turno'] = $turno;
      $fconditions['FueraDeMomento.username'] = $username;
      $cconditions['CambioCanal.fecha'] = $date;
      $cconditions['CambioCanal.turno'] = $turno;
      $cconditions['CambioCanal.username'] = $username;

      $UnidadesEnServicio = $this->UnidadesEnServicio->find('all',array('conditions'=>$conditions,'order'=>'id_movil ASC'));
      $FueraDeMomento = $this->FueraDeMomento->find('all',array('conditions'=>$fconditions,'order'=>'id_movil ASC'));
      $CambioCanal = $this->CambioCanal->find('all',array('conditions'=>$cconditions,'order'=>'id_movil ASC'));
      $OperadoresEconomico = $this->Operadores->find('list',array('fields'=>array('id_movil','id_economico'),
			 'order'=>'id_movil ASC'
			)
	   );
      $OperadoresNamae = $this->Operadores->find('list',array('fields'=>array('id_movil','nombre'),
			 'order'=>'id_movil ASC'
			)
	   );

	foreach($UnidadesEnServicio as $movil){
	    $all['Operadores'][$movil['UnidadesEnServicio']['id_movil']]['id_economico'] = $OperadoresEconomico[$movil['UnidadesEnServicio']['id_movil']];
	    $all['Operadores'][$movil['UnidadesEnServicio']['id_movil']]['nombre'] = $OperadoresNamae[$movil['UnidadesEnServicio']['id_movil']];
	}
	foreach($FueraDeMomento as $key => $hora){
	    for($i=0;$i<=5;$i++){
		$hr_ini = explode(':',$hora['FueraDeMomento']["hora_ini_$i"]);
		$hr_fin = explode(':',$hora['FueraDeMomento']["hora_fin_$i"]);
		$FueraDeMomento[$key]['FueraDeMomento']["hora_ini_$i"] = "$hr_ini[0]:$hr_ini[1]";
		$FueraDeMomento[$key]['FueraDeMomento']["hora_fin_$i"] = "$hr_fin[0]:$hr_fin[1]";
	    }
	}

	foreach($UnidadesEnServicio as $key => $value){
	    $in = explode(':',$value['UnidadesEnServicio']['entrada']);
	    $out = explode(':',$value['UnidadesEnServicio']['salida']);
	    $UnidadesEnServicio[$key]['UnidadesEnServicio']['entrada'] = "$in[0]:$in[1]";
	    $UnidadesEnServicio[$key]['UnidadesEnServicio']['salida'] = "$out[0]:$out[1]";
	}

      $all['UnidadesEnServicio'] = $UnidadesEnServicio;
      $all['FueraDeMomento'] = $FueraDeMomento;
      $all['CambioCanal'] = $CambioCanal;

      if (isset($in_var)) {
	  return $all;
      } else {
	  $this->set('all',$all);
      }

    } //End fuera_de_momento

    function street($in_var=null){

      $st = $this->Calles->find('all');
      if(!empty($st)){
	foreach( $st as $key => $value ){
	  $street[ $st[$key]['Calles']['id_calle'] ] = $st[$key]['Calles']['calle'];
	}
      }else{
	$street=null;
      }

      if (isset($in_var)) {
	  return $street;
      } else {
	  $this->set('street',$street);
      }

    } //End street

    function colonias($in_var=null){
    $col = $this->Colonias->find('all');
	foreach( $col as $key => $value ){
	  $colony[ $col[$key]['Colonias']['id_colonia'] ] = $col[$key]['Colonias']['colonia'];
	}
	$colonia = array_map('utf8_encode',$colony);

	if (isset($in_var)) {
	    return $colonia;
	} else {
	    $this->set('colonia',$colonia);
	}

    } //End colonias

    function localidades($in_var=null){
	$loc = $this->Localidades->find('all');
	foreach( $loc as $key => $value ){
	    $localidad[ $loc[$key]['Localidades']['id_localidad'] ] = $loc[$key]['Localidades']['localidad'];
	}
	$localidades = array_map('utf8_encode',$localidad);
	
	if (isset($in_var)) {
	    return $localidades;
	} else {
	    $this->set('localidades',$localidades);
	}
	
    } //End localidades

    function tpo_servicio($in_var=null){
	$tpo_srv = $this->TpoServicio->find('all');
	foreach( $tpo_srv as $key => $value ){
	    $tpo_servicio[ $tpo_srv[$key]['TpoServicio']['id_tpo_servicio'] ] = $tpo_srv[$key]['TpoServicio']['tpo_servicio'];
	}
	$TpoServicio = array_map('utf8_encode',$tpo_servicio);
	
	if (isset($in_var)) {
	    return $TpoServicio;
	} else {
	    $this->set('TpoServicio',$TpoServicio);
	}
	
    } //End tpo_de_servicio



      function index(){

      }

      function SearchReportes(){
	$data = $this->data['Reportes']['data'];
	if(is_array($data)){
	// Just for Compability with Firefox
	    $date['0'] = $data['year'];
	    $date['1'] = $data['month'];
	    $date['2'] = $data['day'];
	}if(is_string($data)){
	    $data = $this->data['Reportes']['data'];
	    $date = explode('-',$data);
	}else{
// 	    Nothing
// 	    $this->redirect(array('action' => 'index'));
	}
	$week = date("W", mktime(0, 0, 0, $date[1], $date[2], $date[0]));
	$date = "$date[0]-$date[1]-$date[2]";
	$turno = $_SESSION['Auth']['User']['turno'];
	$username = $_SESSION['Auth']['User']['username'];

	$conditions['ServiciosTelefonicos.fecha'] = $date;
	$conditions['ServiciosTelefonicos.turno'] = $turno;
	$conditions['ServiciosTelefonicos.username'] = $_SESSION['Auth']['User']['username'];
// 	$wconditions['ServiciosProgramados.week'] = $week;
	$wconditions['ServiciosProgramados.turno'] = $turno;
// 	$wconditions['ServiciosProgramados.username'] = $_SESSION['Auth']['User']['username'];

// 	$cconditions['UnidadesFueraCiudad.week'] = $week;
	$cconditions['UnidadesFueraCiudad.fecha'] = $date;
	$cconditions['UnidadesFueraCiudad.turno'] = $turno;
	$cconditions['UnidadesFueraCiudad.username'] = $_SESSION['Auth']['User']['username'];

	$lconditions['UnidadesEnServicio.fecha'] = $date;
	$lconditions['UnidadesEnServicio.turno'] = $turno;
	$lconditions['UnidadesEnServicio.username'] = $_SESSION['Auth']['User']['username'];
	
	$daily_report = $this->ServiciosTelefonicos->find('all',array('conditions'=>$conditions));
	$weekly_report = $this->ServiciosProgramados->find('all',array('conditions'=>$wconditions));
	$city_report = $this->UnidadesFueraCiudad->find('all',array('conditions'=>$cconditions));
	$list_report = $this->UnidadesEnServicio->find('all',array('conditions'=>$lconditions));

	$this->street();
	$this->colonias();
	$this->localidades();
	$this->tpo_servicio();
	$this->UnidadesEnServicio($date,$turno,$username,null);
	$this->set('date',$date);
	$this->set('week',$week);
	$this->set('city_report',$city_report);
	$this->set('daily_report',$daily_report);
	$this->set('weekly_report',$weekly_report);
	$this->set('list_report',$list_report);
      }

    function CreatePdf(){
// 	pr($this->data);exit();
	$lst = $cty = $prog = $tel = <<<EOF
	<style>
	th {
	    color: navy;
	    font-family: Verdana;
	    font-size: 7pt;
	    text-align:center;
	}

	td {
	    border: 1px solid black;
	    background-color: #ECECEC;
	    color: black;
	    font-family: Arial;
	    font-size: 6pt;
	    text-align:center;
	    font-variant:small-caps;
	}
	.down{
	    background-color:#FFFBB5;
	}
	.up{
	    background-color:#A8C4B4;
	}
	</style>
EOF;
	$tel .= '<table width="100%">'.
		    '<tr>'.
			'<th width="15">ID</th>'.
			'<th width="50">MOVIL</th>'.
			'<th width="80">ECONOMICO</th>'.
			'<th width="133">COLONIA</th>'.
			'<th width="133">CALLE</th>'.
			'<th>N&Uacute;MERO</th>'.
			'<th>TELEFONO</th>'.
			'<th>HORA</th>'.
		    '</tr>';
	$prog .= '<table width="100%">'.
		    '<tr>'.
			'<th width="15">ID</th>'.
			'<th width="50">HORA</th>'.
			'<th width="110">COLONIA</th>'.
			'<th width="110">CALLE</th>'.
			'<th>N&Uacute;MERO</th>'.
			'<th width="45">L</th>'.
			'<th width="45">M</th>'.
			'<th width="45">M</th>'.
			'<th width="45">J</th>'.
			'<th width="45">V</th>'.
			'<th width="45">S</th>'.
			'<th width="45">D</th>'.
		    '</tr>';
	$cty .= '<table width="100%">'.
		    '<tr>'.
			'<th width="15">ID</th>'.
			'<th width="50">MOVIL</th>'.
			'<th width="180">LOCALIDAD</th>'.
			'<th width="180">TIPO DE SERVICIO</th>'.
			'<th width="80">HORA SALIDA</th>'.
			'<th width="80">HORA LLEGADA</th>'.
			'<th>MOM</th>'.
		    '</tr>';

	$lst .= '<table width="100%">'.
		    '<tr>'.
			'<th width="30">ID</th>'.
			'<th colspan="4">UNIDADES EN SERVICIO</th>'.
			'<th colspan="2">LISTA</th>'.
			'<th colspan="6" width="180">FUERA DE MOMENTO</th>'.
			'<th colspan="6" width="180">EN SERVICIO NUEVAMENTE</th>'.
			'<th colspan="4" width="80">CAMBIO/CANAL</th>'.
		    '</tr>'.
		    '<tr>'.
			'<td width="30">ID</td>'.
			'<td>Mov</td>'.
			'<td>Unidad</td>'.
			'<td width="55">Nombre</td>'.
			'<td>Inicio</td>'.
			'<td>Fin</td>'.
			'<td width="15">P</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Hora</td>'.
			'<td>Uni</td>'.
			'<td>Uni</td>'.
			'<td>Uni</td>'.
			'<td>C/U</td>'.
		    '</tr>';
	
	$date = $this->data['Pdf']['date'];
	$week = $this->data['Pdf']['week'];
	$turno = $_SESSION['Auth']['User']['turno'];
	$username = $_SESSION['Auth']['User']['username'];
	
	$conditions['ServiciosTelefonicos.fecha'] = $date;
	$conditions['ServiciosTelefonicos.turno'] = $turno;
	$conditions['ServiciosTelefonicos.username'] = $username;

// 	$wconditions['ServiciosProgramados.week'] = $week;
	$wconditions['ServiciosProgramados.turno'] = $turno;
// 	$wconditions['ServiciosProgramados.username'] = $username;
	
	$cconditions['UnidadesFueraCiudad.fecha'] = $date;
	$cconditions['UnidadesFueraCiudad.turno'] = $turno;
	$cconditions['UnidadesFueraCiudad.username'] = $_SESSION['Auth']['User']['username'];

	$lconditions['UnidadesEnServicio.fecha'] = $date;
	$lconditions['UnidadesEnServicio.turno'] = $turno;
	$lconditions['UnidadesEnServicio.username'] = $username;
	
	$daily_report = $this->ServiciosTelefonicos->find('all',array('conditions'=>$conditions));
	
	$weekly_report = $this->ServiciosProgramados->find('all',array('conditions'=>$wconditions));
	
	$city_report = $this->UnidadesFueraCiudad->find('all',array('conditions'=>$cconditions));

	$list_report = $this->UnidadesEnServicio->find('all',array('conditions'=>$lconditions));
	
	$street = $this->street(1);
	$colonia = $this->colonias(1);
	$localidades = $this->localidades(1);
	$TpoServicio = $this->tpo_servicio(1);
	$all = $this->UnidadesEnServicio($date,$turno,$username,1);
	$idx = 1;
	foreach($daily_report as $key => $value){
	    $tel .= "<tr>";
	    $tel .= '<td width="15">'.$idx++."</td>";
	    $tel .= '<td width="50">'.$value['ServiciosTelefonicos']['id_movil']."</td>";
	    $tel .= '<td width="80">'.$value['ServiciosTelefonicos']['id_economico']."</td>";
	    $tel .= '<td width="133">'.$colonia[$value['ServiciosTelefonicos']['id_colonia']]."</td>";
	    $tel .= '<td width="133">'.$street[$value['ServiciosTelefonicos']['id_calle']]."</td>";
	    $tel .= "<td>".$value['ServiciosTelefonicos']['numero']."</td>";
	    $tel .= "<td>".$value['ServiciosTelefonicos']['telefono']."</td>";
	    $tel .= "<td>".$value['ServiciosTelefonicos']['hora']."</td>";
	    $tel .= "</tr>";
	}

	$idx=1;
	foreach($weekly_report as $key => $value){
	    $prog .= "<tr>";
	    $prog .= '<td width="15">'.$idx++."</td>";
	    $prog .= '<td width="50">'.$value['ServiciosProgramados']['hora']."</td>";
	    $prog .= '<td width="110">'.$value['Calle']['Colonia']['colonia']."</td>";
	    $prog .= '<td width="110">'.$value['Calle']['calle']."</td>";
	    $prog .= "<td>".$value['ServiciosProgramados']['numero']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['lunes']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['martes']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['miercoles']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['jueves']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['viernes']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['sabado']."</td>";
	    $prog .= '<td width="45">'.$value['ServiciosProgramados']['domingo']."</td>";
	    $prog .= "</tr>";
	}

	$idx = 1;
	foreach($city_report as $key => $value){
	    $cty .= '<tr>';
	    $cty .= '<td width="15">'.$idx++.'</td>';
	    $cty .= '<td width="50">'.$value['UnidadesFueraCiudad']['id_movil']."</td>";
	    $cty .= '<td width="180">'.$localidades[$value['UnidadesFueraCiudad']['id_localidad']]."</td>";
	    $cty .= '<td width="180">'.$value['UnidadesFueraCiudad']['tpo_servicio']."</td>";
	    $cty .= '<td width="80">'.$value['UnidadesFueraCiudad']['hora_salida']."</td>";
	    $cty .= '<td width="80">'.$value['UnidadesFueraCiudad']['hora_llegada']."</td>";

	    $chk = $value['UnidadesFueraCiudad']['mom_r'];
	    if($chk == true){
		$check = 'check.png';
	    }else{
		$check = 'spam-2.png';
	    }
	    $cty .= "<td width=\"70\"><img src=\"".e($this->webroot)."img/icons/$check"."\" width=\"9\" height=\"8\" ></td>";
	    $cty .= "</tr>";
	}

	$idx = 1;
	foreach($list_report as $key => $value){
	    $lst .= '<tr>';
	    $lst .= '<td width="30">'.$idx++.'</td>';
	    $lst .= '<td>'.$value['UnidadesEnServicio']['id_movil']."</td>";
	    $lst .= '<td>'.$all['Operadores'][$value['UnidadesEnServicio']['id_movil']]['id_economico'].'</td>';
	    $lst .= '<td width="55">'.$all['Operadores'][$value['UnidadesEnServicio']['id_movil']]['nombre'].'</td>';
	    $lst .= '<td>'.$all['UnidadesEnServicio'][$key]['UnidadesEnServicio']['entrada']."</td>";
	    $lst .= '<td>'.$all['UnidadesEnServicio'][$key]['UnidadesEnServicio']['salida']."</td>";

	    $validate = $value['UnidadesEnServicio']['pase_de_lista'];
	    if($validate == true){
		$img = 'check.png';
	    }else{
		$img = 'spam-2.png';
	    }

	    $lst .= "<td width=\"15\"><img src=\"".e($this->webroot)."img/icons/$img"."\" width=\"9\" height=\"8\" ></td>";

	    if(empty($all['FueraDeMomento'])){
		for($i=0;$i<=11;$i++){
		    $lst .= '<td>&nbsp;</td>';
		}
	    }else{
		$lst .= '<td class="down">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_ini_0']."</td>";
		$lst .= '<td class="down">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_ini_1']."</td>";
		$lst .= '<td class="down">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_ini_2']."</td>";
		$lst .= '<td class="down">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_ini_3']."</td>";
		$lst .= '<td class="down">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_ini_4']."</td>";
		$lst .= '<td class="down">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_ini_5']."</td>";
		$lst .= '<td class="up">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_fin_0']."</td>";
		$lst .= '<td class="up">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_fin_1']."</td>";
		$lst .= '<td class="up">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_fin_2']."</td>";
		$lst .= '<td class="up">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_fin_3']."</td>";
		$lst .= '<td class="up">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_fin_4']."</td>";
		$lst .= '<td class="up">'.$all['FueraDeMomento'][$key]['FueraDeMomento']['hora_fin_5']."</td>";
	    }
	    if(empty($all['CambioCanal'])){
		for($i=0;$i<=3;$i++){
		    $lst .= '<td>&nbsp;</td>';
		}
	    }else{
		$lst .= '<td>'.$all['CambioCanal'][$key]['CambioCanal']['canal_0']."</td>";
		$lst .= '<td>'.$all['CambioCanal'][$key]['CambioCanal']['canal_1']."</td>";
		$lst .= '<td>'.$all['CambioCanal'][$key]['CambioCanal']['canal_2']."</td>";
		$lst .= '<td>'.$all['CambioCanal'][$key]['CambioCanal']['canal_3']."</td>";
	    }
		$lst .= "</tr>";
	}
	
	$tel .= '</table>';
	$prog .= '</table>';
	$cty .= '</table>';
	$lst .= '</table>';
	
	$html['ServiciosTelefonicos'] = $tel;
	$html['ServiciosProgramados'] = $prog;
	$html['UnidadesFueraCiudad'] = $cty;
	$html['UnidadesEnServicio'] = $lst;
// 	pr($html['UnidadesEnServicio']);exit();
	$this->colonias(); //$colonia
	$this->street(); //$street
	$this->set('turno',$turno);
	$this->set('username',$username);
	$this->set('date',$date);
	$this->set('week',$week);
	$this->set('html',$html);
	$this->set('mkpdf',$this->data['Pdf']['data']);
	$this->layout='pdf';
    }

  } //End Controller

?>