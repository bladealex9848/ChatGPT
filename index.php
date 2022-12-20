<!DOCTYPE html>
<html>

<head>
    <title>Interfaz de usuario para GPT-3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Interfaz de usuario para GPT-3</h1>
        <p>Escribe tu prompt a continuación para obtener una respuesta del modelo GPT-3:</p>
        <form id="gpt3-form">
            <div class="form-group">
                <label for="prompt">Prompt</label>
                <textarea class="form-control" id="prompt" name="prompt" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Obtener respuesta</button>
        </form>
        <div id="gpt3-response" class="mt-3"></div>
    </div>

    <!-- Incluye jQuery y el script que contiene el código de AJAX -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>