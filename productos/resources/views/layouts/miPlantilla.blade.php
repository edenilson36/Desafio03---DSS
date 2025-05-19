<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/> <!-- define el conjunto de caracteres como utf-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!-- asegura que el diseño sea responsivp -->
    <title>@yield('titulo')</title> <!-- permite que cada vista defina su propio titulo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- impota estilos de bootstrap -->
</head>
<body class="bg-light"> <!-- aplica fondo claro al body -->
    <div class="container mt-4"> <!-- conteedor con margen superior -->
        @yield('contenido') <!-- se inserta el contenido de cada vista -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- importa los script de bootstrap -->
</body>
</html>
