function Operaciones_ADN()
	{
		/*GENERA SECUENCIA DE ADN */
		//-------------------------------------------------------------------------------
		$("#Res_crear_Secuencia").hide();
		$("#Res_Longitud_Secuencia").hide();
		$("#Res_Comparar_Cadenas").hide();
		$("#Ppal_Contar_Nucleotidos").hide();

		$("#crear_Secuencia").click(function()
			{
				$("#Res_crear_Secuencia").show();
				$("#Res_Longitud_Secuencia").hide();
				$("#Res_Comparar_Cadenas").hide();
				$("#Ppal_Contar_Nucleotidos").hide();
			  $.post("../validacion/core/programa_adn.php",{ programa_a_ejecutar:'crear'  },
					function(datass)
					 {
							$("#Res_crear_Secuencia").html(datass);
					 })
			  }
			);

		/*GENERA SECUENCIA DE ADN Y CALCULA LA LONGITUD DE ESA CADENA */
		//-------------------------------------------------------------------------------
		$("#Longitud_Secuencia").click(function()
			{
				$("#Res_Longitud_Secuencia").show();
				$("#Res_crear_Secuencia").hide();
				$("#Res_Comparar_Cadenas").hide();
				$("#Ppal_Contar_Nucleotidos").hide();
				$.post("./core/programa_adn.php",{programa_a_ejecutar:'longitud'},
						function(longitud)
						{
							$("#Res_Longitud_Secuencia").html(longitud);
						})
				}
			);
		/*GENERA DOS SECUENCIAS DE ADN Y COMPARA CUÁL ES LA MÁS LARGA */
		//-------------------------------------------------------------------------------
		$("#Comparar_Cadenas").click(function()
		 {
			$("#Res_Comparar_Cadenas").show();
			$("#Res_Longitud_Secuencia").hide();
			$("#Res_crear_Secuencia").hide();
			$("#Ppal_Contar_Nucleotidos").hide();
			$.post("./core/programa_adn.php",{ programa_a_ejecutar:'comparar'},
				function(comparar)
				{
					$("#Res_Comparar_Cadenas").html(comparar);
				})
		 }
		);
		/*CUENTA LA CANTIDAD DE NUCLÉOTIDOS EN UNA CADENA GENERADA DE MANERA ALEATORIA */
		//-------------------------------------------------------------------------------
		$("#Contar_Nucleotidos").click(function()
		{
			$("#Ppal_Contar_Nucleotidos").show();
			$("#Res_Comparar_Cadenas").hide();
			$("#Res_Longitud_Secuencia").hide();
			$("#Res_crear_Secuencia").hide();
			$("#iniciar").click(function()
			{
				var valor_a_buscar = $("#nucleotido_a_evaluar").val().toUpperCase();
				$.post('./core/programa_adn.php',{programa_a_ejecutar:'contar_nucleotidos', nucleotido:valor_a_buscar},
						function(contar)
						{
							$("#Res_Contar_Nucleotidos").html(contar);
						}
					)
			});

		 }
		);

		// FUNCION PARA CONVERTIR A MAYUSCULAS //
		//-------------------------------------------------------------------------------
		$("#nucleotido_a_evaluar").keyup(function(){
			var valor_digitado = $("#nucleotido_a_evaluar").val().toUpperCase();
        $(this).val(valor_digitado);
    });

	}


