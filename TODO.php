<?php
	/** TODO @radiobase @2015-05-09
		
		- Crear un nuevo campo en los registros de la base de datos del tipo enum('Active','Inactive')
			para que los registros no se borren, solo se actualizen los status
		- Crear una interfaz para administrar los diferentes sitios de radiobases
		- Modificar el catalogo de ciudades , localidades , colonias para que sea un unico recurso compartido
		 este catalogo habra que mantenerlo actualizado con los datos del inegi 
		- El catalogo de calles se puede mantener por empresa o base
		- Definir los rangos del calendario en la base de datos (caso Chrome)
		- Modificar los modulos para que permitan elegir la localidad a la que pertenece el registro(esta localidad es independiente de la localidad de la base )
		la localidad de la base puede manejarse por session , mientras que la localidad del registro o servicio  se puede manejar desde el catalogo.
		-Revisar el modulo del posicionamiento por GPS 
	**/

	/** NOTE @estos Requerimientos se pueden desarrollar solo de ser necesarios

		- Crear nuevos modulos por ejemplo de administracion de flotas vehiculares
		- Crear un modulo de mantenimiento de Flotas Vehiculares
		- Crear modulos Contables
		- Crear modulos de Administracion de Recursos Humanos
		
	*/
?>
