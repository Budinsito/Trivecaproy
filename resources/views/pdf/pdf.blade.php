<!DOCTYPE html>
<html>
<head>
	<title>HOLA</title>
</head>
<body>
<h1>Hola mundo</h1>

<ul>
@foreach($empleados as $data)
	<li>{{ $data->nombres }}</li>
	<li>{{ $data->apellidos }}</li>
	<li>{{ $data->direccion }}</li>
@endforeach
</ul>
</body>
</html>