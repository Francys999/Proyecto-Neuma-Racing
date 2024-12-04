<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket de compra</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .ticket{
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
        }

        h1, h2, h3, h4{
            text-align: center;
            margin-bottom: 10px;
        }

        .info{
            margin-bottom: 20px;
        }

        .info div{
            margin-bottom: 5px;
        }

        .footer{
            text-align: center;
            font-size: 12px;
        }

    </style>

</head>
<body>
    <div class="ticket">
        <h4>
            Número de orden: {{ $order->id }}
        </h4>

        <div class="info">
            <h3>
                información de la compañia
            </h3>

            <div>
                Nombre: Neuma Racing Peru Import e. I. R. L.
            </div>

            <div>
                RUC: 20604664951
            </div>

            <div>
                Teléfono: 948464266
            </div>

            <div>
                Correo: jcllantas@gmail.com
            </div>
        </div>

        <div class="info">
            <h3>
                Datos del cliente
            </h3>

            <div>
                Nombre: {{ $order->address['receiver_info']['name'] . ' ' . $order->address['receiver_info']['last_name'] }}
            </div>

            <div>
                Documento: {{ $order->address['receiver_info']['document_number'] }}
            </div>

            <div>
                Dirección: {{ $order->address['description'] }} - {{ $order->address['district'] }} ({{ $order->address['reference'] }})
            </div>

            <div>
                Teléfono: {{ $order->address['receiver_info']['phone'] }}
            </div>
        </div>

        <div class="footer">
            ¡Gracias por su compra!
        </div>
    </div>
</body>
</html>