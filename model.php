<?php

// Función que hace la solicitud a la API de OpenAI y devuelve la respuesta
function get_gpt3_response($prompt, $model_id, $api_key)
{
  // Establece el contenido de la solicitud
  $request_data = array(
    "model" => $model_id,
    "prompt" => $prompt,
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

  // Devuelve los datos de la respuesta
  return $response_data;
}