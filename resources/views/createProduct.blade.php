<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOLA</title>
        <!-- <link rel="stylesheet" href="{{ asset('css/export.css') }}"> -->

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .table-bordered td {
                align="center";
            }
        </style>
    </head>
    <body>
        <h2><center>CREAR NUEVO PRODUCTO</center></h2>

        <form action="{{route('init')}}" method="GET">
            @csrf
            <input type="submit"  class="btn btn-lg btn-primary btn-block btn-signin" value="Listar Productos">
        </form>
        <br>
        <form action="{{route('createProducts')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nombre del Producto" class="form-control mb-2" required>
            <input type="text" name="reference" placeholder="Referencia del Producto" class="form-control mb-2" required>
            <input type="number" min="1" pattern="^[0-9]+" name="price" placeholder="Precio del Producto" class="form-control mb-2" required>
            <input type="number" name="weight" min="1" pattern="^[0-9]+" placeholder="Peso del Producto" class="form-control mb-2" required>
            <input type="text" name="category" placeholder="Categoria del Producto" class="form-control mb-2" required>
            <input type="number" name="stock" min="0" pattern="^[0-9]+" placeholder="Stock del Producto" class="form-control mb-2" required>
            <button class="btn btn-primary btn-block" type="sumit">Agregar</button>
        </form>
    </body>
</html>
