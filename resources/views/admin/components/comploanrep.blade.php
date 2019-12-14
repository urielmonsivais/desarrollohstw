<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border: 1px solid tomato;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @isset($report)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Reporte del prestamo</h3>
                        <hr>
                        <h3 class="card-title">{{ $customer_name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Múmero</th>
                                    <th>Fecha</th>
                                    <th>Cuota</th>
                                    <th>Interes</th>
                                    <th>CA</th>
                                    <th>CF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report['payments'] as $i => $c)
                                <tr>
                                    <td><strong class="text-primary">{{ $c['payment_number'] }}</strong></td>
                                    <td>{{ $c['payment_date'] }}</td>
                                    <td>
                                        {{
                                        $c['quota']
                                        }}
                                    </td>
                                    <td>
                                        {{
                                        $c['interest']
                                        }}
                                    </td>
                                    <td>
                                        {{
                                        $c['ca']
                                        }}
                                    </td>
                                    <td>
                                        {{ $c['cf'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>

</body>

</html>
