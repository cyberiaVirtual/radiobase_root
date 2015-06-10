<?php

  class GeolocationController extends AppController{

      var $name = 'Geolocation';
      var $components = array('RequestHandler','Session');
      var $helpers = array('Html','Form','Ajax','Javascript','Js','GoogleMap');
      var $uses = array('ServiciosTelefonicos','Operadores','UnidadesEnServicio','Ciudades','Localidades','Colonias','Calles','Phones','Cp');
      
      function index(){

      }

  }
?>