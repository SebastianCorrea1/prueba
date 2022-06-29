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
        <h2><center>PRODUCTOS REGISTRADOS EN EL SISTEMAS</center></h2>

        <form action="{{route('createProduct')}}" method="GET">
            @csrf
            <input type="submit"  class="btn btn-lg btn-primary btn-block btn-signin" value="Crear Producto">
        </form>
        <br>

        <form action="{{route('sellProduct')}}" method="POST">
            @csrf
            <select  name="product_id" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($record as $records)
                    <option value="{{$records->id}}">{{$records->name}}</option>
                @endforeach
            </select>
            <input type="number" min="1" pattern="^[0-9]+" name="amountToSell" placeholder="Cantidad a Vender" class="form-control mb-2" required>
            <input type="submit"  class="btn btn-lg btn-primary btn-block btn-signin" value="Vender Producto">
        </form>
        <br>
        <table border="1" ALIGN="center">
                <tr>
                    <td>NOMBRE PRODUCTO</td>
                    <td>REFERENCIA PRODUCTO</td>
                    <td>PRECIO PRODUCTO</td>
                    <td>PESO PRODUCTO</td>
                    <td>CATEGORIA PRODUCTO</td>
                    <td>STOCK PRODUCTO</td>
                    <td>ACCIONES</td>
                </tr>
        @foreach($record as $records)
        
                <tr>
                    <td>{{$records->name}}</td>
                    <td>{{$records->reference}}</td>
                    <td>{{$records->price}}</td>
                    <td>{{$records->weight}}</td>
                    <td>{{$records->category}}</td>
                    <td>{{$records->stock}}</td>
                    <td>
                        <form action="{{route('editProducts', ['id' => $records->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-block" type="sumit">Edit</button>
                        </form>
                        <form action="{{route('removeProducts', ['id' => $records->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-block" type="sumit">Remove</button>
                        </form>
                    </td>
                </tr>
        @endforeach
        </table>
    </body>
</html>
