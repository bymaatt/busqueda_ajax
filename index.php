<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda con Ajax</title>

    <style>
        table, th, td{
            border: 1px solid;
        }
        table{
            margin: 35px;
            width: 80%;
            border-collapse: collapse;
        }
    </style>

</head>
<body>
    <h1>Listado de Clientes</h1>


    <form action="" method="post">
        <label for="campo">Buscar: </label>
        <input type="text" name="campo" id="campo">
    </form>

    <table>
        <thead>
            <th>ID</th>
            <th>Nombre completo</th>
            <th>Fecha de nacimiento</th>
            <th>Dirección</th>
            <th>Localidad y Codigo postal</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
            <th>Fecha de alta</th>
            <th>Grupo de clientes</th>
        </thead>
        <tbody id="content">

        </tbody>
    </table>

    <script>

        getData()
        document.getElementById ("campo").addEventListener("keyup", getData)
        function getData(){
            let input = document.getElementById ("campo").value
            let content =  document.getElementById("content")
            let url= "load.php";
            let formData = new FormData()
            formData.append('campo', input)

            fetch(url,{
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
            }).catch(err => console.log(err))
        }
    </script>
</body>
</html>