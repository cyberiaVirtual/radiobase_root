<?php
$dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles',
        'Jueves', 'Viernes', 'Sabado');
     
    function diasSemana($ano, $semana) {
        $enero = mktime(1,1,1,1,1,$ano);
        $mos = (11-date('w',$enero))%7-3;
        $inicios = strtotime(($semana-1) . ' weeks '.$mos.' days', $enero);
        for ($x=0; $x<=6; $x++) {
            $dias[] = date('Y-m-d', strtotime("+ $x day", $inicios));
            $dia[] = date('w', strtotime("+ $x day", $inicios));
        }
       
        $res = array_combine( $dia,$dias);
        return $res;
    }
    
    function ultimoDia()
    {
        $mes = mktime( 0, 0, 0, date("m"), 1, date("Y") ); 
        $dias = date("t",$mes);
        return $dias;
    }
    
function fechaLetra($fecha='')
{
    //yyyy-mm-dd
    if($fecha!='')
    {
        $fechaLetra = explode('-', $fecha);
        $mes = mes($fechaLetra[1]);
        return $fechaLetra[2].' de '.$mes.' del '.$fechaLetra[0];
    }
}

function mes($mes)
{
    switch($mes)
    {
        case 1:
            $mes = 'Enero';
            break;
        case 2:
            $mes = 'Febrero';
            break;
        case 3:
            $mes = 'Marzo';
            break;
        case 4:
            $mes = 'Abril';
            break;
        case 5:
            $mes = 'Mayo';
            break;
        case 6:
            $mes = 'Junio';
            break;
        case 7:
            $mes = 'Julio';
            break;
        case 8:
            $mes = 'Agosto';
            break;
        case 9:
            $mes = 'Septiembre';
            break;
        case 10:
            $mes = 'Octubre';
            break;
        case 11:
            $mes = 'Noviembre';
            break;
        case 12:
            $mes = 'Diciembre';
            break;
    }
    return $mes;
}

function decision(){
    $decision=array("SI"=>"SI","NO"=>"NO");
    return $decision;
}

function gen()
{
    $genero=array("F"=>"F","M"=>"M");
    return $genero;
}
function frm_pago()
{
    $pago=array("EFECTIVO"=>"EFECTIVO","ORDEN DE PAGO"=>"ORDEN DE PAGO");
    return $pago;
}

function tpo_salario()
{
    $salario=array("MIXTO"=>"MIXTO","VARIABLE"=>"VARIABLE","FIJO"=>"FIJO");
    return $salario;
}

function QuitarArticulos($palabra) 
{ 
    $palabra=str_replace("DEL ","",$palabra); 
    $palabra=str_replace("LAS ","",$palabra); 
    $palabra=str_replace("DE ","",$palabra); 
    $palabra=str_replace("LA ","",$palabra); 
    $palabra=str_replace("Y ","",$palabra); 
    $palabra=str_replace("A ","",$palabra);
    //$palabra=str_replace("PUTA","PXTA",$palabra); 
    return $palabra; 
} 

function EsVocal($letra) 
{ 
    if ($letra == 'A' || $letra == 'E' || $letra == 'I' || $letra == 'O' || $letra == 'U' || 
    $letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u') 
    return 1; 
    else 
    return 0; 
}

function CalcularRFC($nombre,$apellidoPaterno,$apellidoMaterno,$fecha,$hc=false) 
{ 
    $ATAB2 = array('BUEI','BUEY','CACA','CACO','CAGA','CAGO','CAKA','CAKO','COGE','COJA','COJE','COJI',
                               'COJO','CULO','FETO','GUEY','JOTO','KACA','KACO','KAGA','KAGO','KOGE','KOJE','KAKA',
                               'KULO','MAME','MAMO','MEAR','MEAS','MEON','MION','MOCO','MULA','PEDA','PEDO','PENE',
                               'PUTA','PUTO','QULO','RATA','RUIN');


    /*Cambiamos todo a mayúsculas. 
    Quitamos los espacios al principio y final del nombre y apellidos*/ 
    $nombre =strtoupper(trim($nombre)); 
    $apellidoPaterno =strtoupper(trim($apellidoPaterno)); 
    $apellidoMaterno =strtoupper(trim($apellidoMaterno)); 
    //RFC que se regresará 
    $rfc=""; 
    //Quitamos los artículos de los apellidos 
    $apellidoPaterno = QuitarArticulos($apellidoPaterno); 
    $apellidoMaterno = QuitarArticulos($apellidoMaterno); 

    //Agregamos el primer caracter del apellido paterno 
    $rfc = substr($apellidoPaterno,0, 1); 

    //Buscamos y agregamos al rfc la primera vocal del primer apellido 
    $len_apellidoPaterno=strlen($apellidoPaterno); 
    for($x=1;$x<$len_apellidoPaterno;$x++) 
    { 
    $c=substr($apellidoPaterno,$x,1); 
    if (EsVocal($c)) 
    { 
    $rfc .= $c; 
    break; 
    } 
    } 
    //Agregamos el primer caracter del apellido materno 
    $rfc .= substr($apellidoMaterno,0, 1); 
    //Agregamos el primer caracter del primer nombre 
    $rfc .= substr($nombre,0, 1); 
    // Cambia palabras malas malotas XD! del rfc
    //$rfc=str_replace("PUTA","PXTA",$rfc);
    //$rfc=str_replace("PEDO","PXDO",$rfc);
    //$rfc=str_replace("PUTO","PXTO",$rfc);
    if(in_array($rfc,$ATAB2)){
    $rfc=substr_replace($rfc,"X",1,1);
    }
    //agregamos la fecha ddmmyyyy
    $rfc .= substr($fecha,6, 2).substr($fecha,2, 2).substr($fecha,0, 2); 
    //Le agregamos la homoclave al rfc 
    if($hc==false)
    {
        return $rfc; 
    }else{
            $rfc=substr(CalcularHomoclave($apellidoPaterno." ".$apellidoMaterno." ".$nombre, $fecha,$rfc),-3);
            return $rfc; 
         }
    //e($hc);exit();
}

function CalcularHomoclave($nombreCompleto,$fecha,$rfc) 
{ 
    $nombreEnNumero="0"; 
    $valorSuma = 0; 

    $tablaRFC1['&']='10'; $tablaRFC1['Ãƒâ€˜']='10';$tablaRFC1['A']='11'; $tablaRFC1['B']='12'; $tablaRFC1['C']='13'; 
    $tablaRFC1['D']='14'; $tablaRFC1['E']='15'; $tablaRFC1['F']='16'; $tablaRFC1['G']='17'; $tablaRFC1['H']='18'; 
    $tablaRFC1['I']='19'; $tablaRFC1['J']='21'; $tablaRFC1['K']='22'; $tablaRFC1['L']='23'; $tablaRFC1['M']='24'; 
    $tablaRFC1['N']='25'; $tablaRFC1['O']='26'; $tablaRFC1['P']='27'; $tablaRFC1['Q']='28'; $tablaRFC1['R']='29'; 
    $tablaRFC1['S']='32'; $tablaRFC1['T']='33'; $tablaRFC1['U']='34'; $tablaRFC1['V']='35'; $tablaRFC1['W']='36'; 
    $tablaRFC1['X']='37'; $tablaRFC1['Y']='38'; $tablaRFC1['Z']='39'; $tablaRFC1['0']='00'; $tablaRFC1['1']='01'; 
    $tablaRFC1['2']='02'; $tablaRFC1['3']='03'; $tablaRFC1['4']='04'; $tablaRFC1['5']='05'; $tablaRFC1['6']='06'; 
    $tablaRFC1['7']='07'; $tablaRFC1['8']='08'; $tablaRFC1['9']='09'; 

    $tablaRFC2[0]="1"; $tablaRFC2[1]="2"; $tablaRFC2[2]="3"; $tablaRFC2[3]="4"; $tablaRFC2[4]="5"; $tablaRFC2[5]="6"; 
    $tablaRFC2[6]="7"; $tablaRFC2[7]="8"; $tablaRFC2[8]="9"; $tablaRFC2[9]="A"; $tablaRFC2[10]="B";$tablaRFC2[11]="C"; 
    $tablaRFC2[12]="D";$tablaRFC2[13]="E";$tablaRFC2[14]="F";$tablaRFC2[15]="G";$tablaRFC2[16]="H";$tablaRFC2[17]="I"; 
    $tablaRFC2[18]="J";$tablaRFC2[19]="K";$tablaRFC2[20]="L";$tablaRFC2[21]="M";$tablaRFC2[22]="N";$tablaRFC2[23]="P"; 
    $tablaRFC2[24]="Q";$tablaRFC2[25]="R";$tablaRFC2[26]="S";$tablaRFC2[27]="T";$tablaRFC2[28]="U";$tablaRFC2[29]="V"; 
    $tablaRFC2[30]="W";$tablaRFC2[31]="X";$tablaRFC2[32]="Y";$tablaRFC2[33]="Z"; 

    $tablaRFC3['A']=10; $tablaRFC3['B']=11; $tablaRFC3['C']=12; $tablaRFC3['D']=13; $tablaRFC3['E']=14; $tablaRFC3['F']=15; 
    $tablaRFC3['G']=16; $tablaRFC3['H']=17; $tablaRFC3['I']=18; $tablaRFC3['J']=19; $tablaRFC3['K']=20; $tablaRFC3['L']=21; 
    $tablaRFC3['M']=22; $tablaRFC3['N']=23; $tablaRFC3['O']=25; $tablaRFC3['P']=26; $tablaRFC3['Q']=27; $tablaRFC3['R']=28; 
    $tablaRFC3['S']=29; $tablaRFC3['T']=30; $tablaRFC3['U']=31; $tablaRFC3['V']=32; $tablaRFC3['W']=33; $tablaRFC3['X']=34; 
    $tablaRFC3['Y']=35; $tablaRFC3['Z']=36; $tablaRFC3['0']=0; $tablaRFC3['1']=1; $tablaRFC3['2']=2; $tablaRFC3['3']=3; 
    $tablaRFC3['4']=4; $tablaRFC3['5']=5; $tablaRFC3['6']=6; $tablaRFC3['7']=7; $tablaRFC3['8']=8; $tablaRFC3['9']=9; 
    $tablaRFC3['']=24; $tablaRFC3[' ']=37; 

    $len_nombreCompleto=strlen($nombreCompleto); 
    for($x=0;$x<$len_nombreCompleto;$x++) 
    { 
        $c=substr($nombreCompleto,$x,1); 
        if (isset($tablaRFC1[$c])) 
                $nombreEnNumero.=$tablaRFC1[$c]; 
        else 
                $nombreEnNumero.="00"; 
    } 

    $n=strlen($nombreEnNumero)-1; 
    for ($i = 0; $i < $n; $i++) 
    { 
        $prod1 = substr($nombreEnNumero, $i, 2); 
        $prod2 = substr($nombreEnNumero, $i + 1, 1); 
        $valorSuma += $prod1 * $prod2; 
    } 

    //MagicNumbers

    $div = 0; 
    $mod = 0; 
    $div = $valorSuma % 1000; 
    $mod = floor($div / 34);//cociente 
    $div = $div - $mod * 34;//residuo 

    $hc = $tablaRFC2[$mod]; 
    $hc.= $tablaRFC2[$div]; 

    $rfc .= $hc; 


    //Digito Verificador
    $sumaParcial = 0; 
    $n=strlen($rfc); 
    for ($i = 0; $i < $n; $i++) 
    { 
        $c=substr($rfc,$i,1); 
        if (isset($tablaRFC3[$c])) 
        { 
            $sumaParcial += ($tablaRFC3[$c] * (14 - ($i + 1))); 
        } 
    } 

    $moduloVerificador = $sumaParcial % 11; 
    if ($moduloVerificador == 0) 
    $rfc .= "0"; 
    else 
    { 
        $sumaParcial = 11 - $moduloVerificador; 
        if ($sumaParcial == 10) 
            $rfc .= "A"; 
        else 
            $rfc .= $sumaParcial; 
    }
    return $rfc;
}

function calcularEdad($fecha)
{ 
    $dias = explode("-", $fecha, 3); 
    $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]); $edad = (int)((time()-$dias)/31556926 ); 
    return $edad; 
}

function estadoCivil()
{
    $edoCiv=array("CASADO(A)"=>"CASADO(A)","SOLTERO(A)"=>"SOLTERO(A)","DIVORCIADO(A)"=>"DIVORCIADO(A)");
    return $edoCiv;
}

function statusEmp()
{
    $stuEmp=array("ALTA"=>"ALTA","BAJA"=>"BAJA");
    return $stuEmp;
}

function generoEmp()
{
    $stuEmp=array("H"=>"H","M"=>"M");
    return $stuEmp;
}

function entidades()
{
$entidades = array(
    "AS"=>"AGUASCALIENTES",
    "BC"=>"BAJA CALIFORNIA NTE.",
    "BS"=>"BAJA CALIFORNIA SUR",
    "CC"=>"CAMPECHE",
    "CL"=>"COAHUILA",
    "CM"=>"COLIMA",
    "CS"=>"CHIAPAS",
    "CH"=>"CHIHUAHUA",
    "DF"=>"DISTRITO FEDERAL",
    "DG"=>"DURANGO",
    "GT"=>"GUANAJUATO",
    "GR"=>"GUERRERO",
    "HG"=>"HIDALGO",
    "JC"=>"JALISCO",
    "MC"=>"MEXICO",
    "MN"=>"MICHOACAN",
    "MS"=>"MORELOS",
    "NT"=>"NAYARIT",
    "NL"=>"NUEVO LEON",
    "OC"=>"OAXACA",
    "PL"=>"PUEBLA",
    "QT"=>"QUERETARO",
    "QR"=>"QUINTANA ROO",
    "SP"=>"SAN LUIS POTOSI",
    "SL"=>"SINALOA",
    "SR"=>"SONORA",
    "TC"=>"TABASCO",
    "TS"=>"TAMAULIPAS",
    "TL"=>"TLAXCALA",
    "VZ"=>"VERACRUZ",
    "YN"=>"YUCATAN",
    "ZS"=>"ZACATECAS",
    "SM"=>"SERV. EXTERIOR MEXICANO",
    "NE"=>"NACIDO EN EL EXTRANJERO"
    );
    return $entidades;
}


  function month(){
    $month=array(
      "ENERO",
      "FEBRERO",
      "MARZO",
      "ABRIL",
      "MAYO",
      "JUNIO",
      "JULIO",
      "AGOSTO",
      "SEPTIEMBRE",
      "OCTUBRE",
      "NOVIEMBRE",
      "DICIEMBRE",
    );
    
    return $month;
  }
  

    function periodo(){

      for($i=1;$i<=12;$i++){
	  $periodo[$i] = $i ;
      
      }
      return $periodo;
    
    }
    
    
function getCurp($primerApellido, $segundoApellido, $nombre, $diaNacimiento, $mesNaciemiento, $anioNacimiento, $sexo, $entidadNacimiento)
{
    set_time_limit(0);
    $primerApellido = urlencode($primerApellido);
    $segundoApellido = urlencode($segundoApellido);
    $nombre = urlencode($nombre);
    $aContext = array(
        'http' => array(
            'header'=>"Accept-language: es-es,es;q=0.8,en-us;q=0.5,en;q=0.3\r\n" .
                  "Proxy-Connection: keep-alive\r\n" .
                  "Host: consultas.curp.gob.mx\r\n" .
                  "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; es-ES; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 (.NET CLR 3.5.30729)\r\n" .
                  "Keep-Alive: 300\r\n" .
                  "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n"
                  //, 'proxy' => 'tcp://proxy:puerto', //Si utilizas algun proxy para salir a internet descomenta esta linea y por la direccion de tu proxy y el puerto
                  //'request_fulluri' => True //Tambien esta si utilizas algun proxy

            ),
        );
    $cxContext = stream_context_create($aContext);
    $url = "http://consultas.curp.gob.mx/CurpSP/curp1.do?strPrimerApellido=$primerApellido&strSegundoAplido=$segundoApellido&strNombre=$nombre&strdia=$diaNacimiento&strmes=$mesNaciemiento&stranio=$anioNacimiento&sSexoA=$sexo&sEntidadA=$entidadNacimiento&rdbBD=myoracle&strTipo=A&entfija=DF&depfija=04";
    $file = file_get_contents($url, false, $cxContext);
    preg_match_all("/var strCurp=\"(.*)\"/", $file, $curp);
    
    if(isset($curp[1][0]))
    {
        $curp = $curp[1][0];
    }else
        {
            $curp = "Curp no encontrado.";
        }
        
    if($curp)
    {
        return $curp;
    }else
        {
            $curp = "Curp no encontrado.";
            return $curp;
        }
}

function ide_cnp()
{
    $IDE_CNP = array("VARIABLE"=>"VARIABLE","FIJO"=>"FIJO");
    return $IDE_CNP;
}

function apl_cnp()
{
    $APL_CNP = array("INDIVIDUAL"=>"INDIVIDUAL","GENERAL"=>"GENERAL");
    return $APL_CNP;
}

function dep_cnp()
{
    $DEP_CNP = array("DEDUCCIONES"=>"DEDUCCIONES","PERCEPCIONES"=>"PERCEPCIONES");
    return $DEP_CNP;
}

function pis_cnp()
{
    $PIS_CNP = array("TODO GRAVABLE"=>"TODO GRAVABLE","EXENTO"=>"EXENTO");
    return $PIS_CNP;
}

function pim_cnp()
{
    $PIS_CNP = array("PERIODO"=>"PERIODO","GLOBAL"=>"GLOBAL");
    return $PIS_CNP;
}

function tpo_cuenta()
{
    $tpo_cuenta = array("COSTOS"=>"COSTOS","UNICA"=>"UNICA","DETALLE"=>"DETALLE");
    return $tpo_cuenta;
}
?>