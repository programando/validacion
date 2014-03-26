
<?php

class Adn
{
	var $CadenaAdn, $CadenaAdn_Alterna;
	var $cadena_posiciones ;
	var $pos;
	var	$primera_cadena          = '';
	var	$segunda_cadena          = '';
	var	$longitud_primera_cadena = 0;
	var	$longitud_segunda_cadena = 0;
	var $cantidad_ocurrencias		 = 0;



	 function __construct()
	{
		$this->Crear_Secuencia_Adn();
		$this->pos=0;
	}

	public function Crear_Secuencia_Adn()
	{
		/* MARZO 10 DE 2014
				MÉTODO QUE PERMITE CREAR UNA CADENA ADN QUE SEA VÁLIDA, ES DECIR, SÓLO CONTINE A G C T.
				EN EL PROCESO DE FORMACIÓN EVALUA QUE EL CARACTER ANTERIOR NO SE AIGUAL, CON
				EL OBJETIVO DE NO TENER CARACTERES REPETIDOS DE MANERA CONSECUTIVA
		 */
		$longitud_cadena  = rand(10,50); // LONGITUD MÁXIMA DE LA CADENA
		$inicio_ciclo     = 1;
		$this->CadenaAdn  ='';
		$letra_anterior   ='';
		$letra_ADN_valida ='';

		while ( $inicio_ciclo	<= $longitud_cadena)
		{
			$pos_letra = rand(65,84);
			if ($pos_letra==65 || $pos_letra==71 || $pos_letra==67 || $pos_letra==84)
			{
					$letra_ADN_valida =chr($pos_letra);
					if ( $inicio_ciclo==1)
					{
						$this->CadenaAdn= $this->CadenaAdn . $letra_ADN_valida;
						$letra_anterior = $letra_ADN_valida;
						$inicio_ciclo++;
					}else
					{
						if ( $letra_anterior != $letra_ADN_valida)
						{
							$this->CadenaAdn= $this->CadenaAdn . $letra_ADN_valida;
							$letra_anterior = $letra_ADN_valida;
							$inicio_ciclo++;
						}
					}
			}
		}

	}

	public function Obtener_Longitud()
	{
		 /*MARZO 15 2014
		 CUENTA LA CANTIDAD DE  CARACTERES DE UNA CADENA ADN VÁLIDA
		  */
			$continuar_ciclo             = 1 ;
			$Cadena                      =  trim($this->CadenaAdn);

		while ( $continuar_ciclo==1)
			{
					$letra                               = substr($Cadena , $this->pos,1);

					$this->cadena_posiciones[$this->pos] = $letra ;
					if (empty($letra )==1)
					{
						$this->pos       = $this->pos -1;
						$continuar_ciclo = 0;
					}else
					{
						$this->pos       = $this->pos + 1;
					}
			}
				return $this->pos;
		}


public function Comparar_Cadenas()
	{
		/* MARZO 16 DE  2014
				EN ESTE MÉTODO SE COMPARAN LAS LONGITUDES DE DOS CADADENAS
		 */
		$this->Crear_Secuencia_Adn();
		$this->primera_cadena = $this->CadenaAdn;
		$this->Obtener_Longitud();
		$this->longitud_primera_cadena = $this->pos;


		$this->Crear_Secuencia_Adn();
		$this->segunda_cadena = $this->CadenaAdn;
		$this->Obtener_Longitud();
		$this->longitud_segunda_cadena = $this->pos;


	}


	public function Contar_Nucleotidos($nucleotido)
	 {
		 /*MARZO 15 2014
		 		EVALÚA LA CANDIDAD DE VECES QUE APARECE UN NUCLÉOTIDO EN UNA CADENA ADN
		  */
			$continuar_ciclo 			= 0 ;
			$longitud_cadena 			= 0;
			$this->cantidad_ocurrencias = 0;

			$this->Crear_Secuencia_Adn();
			$Cadena          = trim($this->CadenaAdn);
			$this->Obtener_Longitud();
			$longitud_cadena = $this->pos;

		while ( $continuar_ciclo<$longitud_cadena)
			{
					$letra     = substr($Cadena , $continuar_ciclo,1);
					if ($letra==$nucleotido)
					{
							$this->cantidad_ocurrencias ++;
					}
					$continuar_ciclo ++;
			}
		}

public function Contiene_Secuencia($cadena_ppal, $cadena_a_buscar)
	{
		/*MARZO 20 DE  2014
			RECIBE COMO PARAMETROS DOS CADENAS. VERIFICA QUE LA SEGUNDA CADENA SE ENCUENTRE CONTENIDA EN LA PRIMERA.
			EN TAL CASO DEVUELVE VERDADERO (1). EN CASO CONTRARIO DEVUELVE FALSO (0).
		 */
			$existe = strpos($cadena_ppal,$cadena_a_buscar);
			if ($existe !== FALSE)
			{
				return 1;
			}else
			{
				return 0;
			}
	}

	}
 ?>

