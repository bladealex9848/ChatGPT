<?php

// Incluye el modelo para hacer la solicitud a la API de OpenAI
include_once "model.php";

/*
ULTIMO MODELO	    DESCRIPCIÓN	                                                                                                                                                                                                                                      SOLICITUD MÁX.      DATOS DE ENTRENAMIENTO
text-davinci-003	El modelo GPT-3 más capaz. Puede realizar cualquier tarea que puedan realizar los otros modelos, a menudo con mayor calidad, mayor duración y mejor seguimiento de instrucciones. También admite la inserción de finalizaciones dentro del texto.	4,000 tokens	      Up to Jun 2021
text-curie-001	  Muy capaz, pero más rápido y de menor costo que Davinci.	                                                                                                                                                                                        2,048 tokens	      Up to Oct 2019
text-babbage-001	Capaz de realizar tareas sencillas, muy rápidas y de menor costo.	                                                                                                                                                                                2,048 tokens	      Up to Oct 2019
text-ada-001	    Capaz de tareas muy simples, generalmente el modelo más rápido de la serie GPT-3 y el costo más bajo.                                                                                                                                             2,048 tokens	      Up to Oct 2019
URL: https://beta.openai.com/docs/models/gpt-3
*/

// Establece el ID de tu modelo de GPT-3 y la clave de API
$model_id = "text-davinci-003";
$api_key = "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";

// Recibe el prompt enviado por el usuario
$prompt = $_POST['prompt'];

// Valida la entrada del usuario
if (isset($prompt) && !empty(trim($prompt))) {
  // Llamamos a la función que hace la solicitud a la API de OpenAI
  $response_data = get_gpt3_response($prompt, $model_id, $api_key);

  // Procesamos la respuesta del modelo para obtener el texto generado
  $generated_text = $response_data['choices'][0]['text'];

  // Mostramos la respuesta del modelo al usuario - Modelo Basico
  //echo "El modelo GPT-3 ha devuelto el siguiente texto: " . $generated_text;

  // Mostramos la respuesta del modelo al usuario - Modelo tipo cards
  /*  echo '<div class="card">';
  echo '<div class="card-body">';
  echo "El modelo GPT-3 ha devuelto el siguiente texto: " . $generated_text;
  echo '</div>';
  echo '</div>';
*/
  // Mostramos la respuesta del modelo al usuario - Modelo tipo panel
  echo '<div class="alert alert-primary" role="alert">';
  echo "El modelo GPT-3 ha devuelto el siguiente texto: " . $generated_text;
  echo '</div>';
} else {
  // Si el usuario no ha enviado un prompt válido, mostramos un mensaje de error
  echo "Por favor, introduce un prompt válido.";
}