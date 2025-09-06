<!DOCTYPE html>

<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reporte de Rol</title>
<style>
body {
font-family: Arial, sans-serif;
color: #333;
}
.container {
width: 80%;
margin: 0 auto;
padding: 20px;
border: 1px solid #ddd;
border-radius: 8px;
}
h1 {
color: #1a73e8;
text-align: center;
}
p {
font-size: 16px;
line-height: 1.5;
}
.label {
font-weight: bold;
}
.footer {
margin-top: 30px;
text-align: right;
font-size: 12px;
color: #666;
}
</style>
</head>
<body>
<div class="container">
<h1>Detalles del Rol</h1>
<p><span class="label">ID del Rol:</span> {{ $rol->id }}</p>
<p><span class="label">Nombre:</span> {{ $rol->nombre }}</p>
<p><span class="label">Descripción:</span> {{ $rol->descripcion }}</p>
<div class="footer">
Generado el: {{ now()->format('d/m/Y H:i') }}
</div>
</div>
</body>
</html>