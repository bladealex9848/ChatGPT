$(document).ready(function () {
	// Al hacer submit en el formulario
	$('#gpt3-form').submit(function (e) {
		// Previene el comportamiento por defecto del formulario
		e.preventDefault();

		// Recupera el valor del campo de texto
		var prompt = $('#prompt').val();

		// Valida que el campo de texto no esté vacío
		if (!prompt) {
			alert('Por favor, introduce un prompt válido.');
			return;
		}

		// Muestra un mensaje de cargando mientras se procesa la solicitud
		$('#gpt3-response').html('<p>Cargando...</p>');

		// Hace una solicitud AJAX al servidor
		$.ajax({
			type: 'POST',
			url: 'controller.php',
			data: { prompt: prompt },
			success: function (response) {
				// Muestra la respuesta del servidor en el elemento con ID gpt3-response
				$('#gpt3-response').html(response);
			},
		});
	});
});
