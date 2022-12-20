<?php

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
$api_key = "SU-API-KEY";

// Establece el contenido de la solicitud
$request_data = array(
  "model" => $model_id,
  "prompt" => "¿cual es la capital de Colombia?",
  "max_tokens" => 4000
);

// Convierte el contenido de la solicitud en una cadena JSON
$request_data_json = json_encode($request_data);

// Inicializa la sesión cURL
$ch = curl_init("https://api.openai.com/v1/completions");

// Establece las opciones de la solicitud cURL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Content-Length: " . strlen($request_data_json),
  "Authorization: Bearer " . $api_key
));

// Ejecuta la solicitud cURL
$response = curl_exec($ch);

// Cierra la sesión cURL
curl_close($ch);

// Procesa la respuesta de la API
$response_data = json_decode($response, true);

// Utiliza los datos de la respuesta para mostrar algo en la página web
echo "El modelo GPT-3 ha devuelto el siguiente texto: " . $response_data['choices'][0]['text'];