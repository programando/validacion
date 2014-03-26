<?php

 	  require_once('adn.cls.php');
	 	$objAdn = new Adn();

	 			 	$resultado_HTML = '<p> La cadena creada es : <strong> ' . $objAdn->CadenaAdn .'</strong></p>';
   				echo $resultado_HTML . '<br>';

	 			 	$resultado_HTML = '<p> La longitud de la cadena creada es : <strong> ' . $objAdn->longitud_total_cadena .'</strong></p>';
   				echo $resultado_HTML;

  ?>