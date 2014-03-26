<?php
	$tipo_ejecucion = $_POST['programa_a_ejecutar'];

 	  require_once('adn.cls.php');
 	  $objAdn = new Adn();

	 	switch ($tipo_ejecucion) {
	 		case 'crear':

	 			 	$resultado_HTML = '<p> La cadena creada es : <strong> ' . $objAdn->CadenaAdn .'</strong></p>';
   				echo $resultado_HTML;
	 			break;
	 		case 'longitud':
	 				$resultado_HTML  = '<p> La cadena creada es : <strong> '    . $objAdn->CadenaAdn .'</strong><br>';
	 			 	$resultado_HTML .= 'y su longitud total es de : <strong> '  . $objAdn->Obtener_Longitud() .' nucléotidos.</strong></p>';
   				echo $resultado_HTML;
   				break;
	 		case 'comparar':
	 					$objAdn->Comparar_Cadenas();
	 					if ($objAdn->longitud_primera_cadena>$objAdn->longitud_segunda_cadena )
	 						{
	 							$resultado_HTML  ="<p>La cadena <br> <strong> " .$objAdn->primera_cadena ." </strong> con : <strong>"  .$objAdn->longitud_primera_cadena  .'</strong> caracteres es más larga <br><br>';
	 							$resultado_HTML 	.="que la cadena <strong>" .$objAdn->segunda_cadena."</strong> con : <strong>"  .$objAdn->longitud_segunda_cadena  .'</strong> caracteres.</p>';
	 						}else
	 						{
	 							$resultado_HTML = '<p> <strong>NO SE CUMPLE CONDICIÓN ESTABLECIDA !.</strong> <br><br>';
	 							$resultado_HTML .=  'La primera cadena es : <strong>'. $objAdn->primera_cadena .'</strong><br><br>';
	 							$resultado_HTML .=  'La segunda cadena es : <strong>'. $objAdn->segunda_cadena .'</strong> que es más larga que la primera.<br></p>';
	 						}
	 						echo $resultado_HTML;
	 						break;
	 		case 'contar_nucleotidos':
	 						$_nucleotido = $_POST['nucleotido'];
	 						$objAdn->Contar_Nucleotidos($_nucleotido);
	 						if ($objAdn->cantidad_ocurrencias>0)
	 						{
	 						$resultado_HTML ='<p> El nucleótido : <strong>'. $_nucleotido . '</strong> se repite : ' . $objAdn->cantidad_ocurrencias . ' veces <br>';
	 						$resultado_HTML .= "en la cadena : <strong>" . $objAdn->CadenaAdn  . '</strong></p>'  ;
	 						}else
	 						{
	 							$resultado_HTML ='<p> El nucleótido : <strong>'. $_nucleotido . '</strong> no es un caracter válido dentro de las cadenas que conforman el ADN.';
	 						}
	 						if (Empty($_nucleotido))
	 						{
	 							echo "<br>ERROR !!!  NO HA REGISTRADO NINGÚN NEUCLÓTIDO PARA SER CONTADO DENTRO DE UNA CADENA DE ADN";
	 						}else
	 						{			echo $resultado_HTML;}
	 					break;
	 	}



?>