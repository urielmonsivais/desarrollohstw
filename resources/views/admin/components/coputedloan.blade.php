@extends('admin.app')
@section('content')
@include('admin.components.editcustomer')
@include('admin.components.newcustomer')
@include('admin.components.showcustomer')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Calcular prestamo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Prestamos</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Caclular y generear reporte</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('computedLoan') }}" method="GET">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cliente</label>
                            <input type="text" required name="name" class="form-control"
                                placeholder="Nombre del cliente...">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputPassword1">Plazo de pago(años)</label>
                                <input type="number" required class="form-control" id=""
                                    placeholder="Años para pagar el prestamo" name="deadline">
                            </div>
                            <div class="col-6">
                                <label for="type">Tipo de pago</label>
                                <select name="type" id="" class="form-control">
                                    <option value="QUINCENAL">QUINCENAL</option>
                                    <option value="MENSUAL">MENSUAL</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="type">Tasa de interes: </label>
                                <input type="number" required class="form-control" id=""
                                    placeholder="Años para pagar el prestamo" name="interest_rate">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputPassword1">Monto</label>
                                <input type="number" required class="form-control" id=""
                                    placeholder="Monto del prestamo" name="total">
                            </div>

                        </div>
                        <input type="hidden" name="genrep" value="1">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            @isset($report)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reporte del prestamo</h3>

                    <div class="card-tools">
                        <a href="{{ route('prfReport') }}" class="btn btn-outline-primary">Imprimir</a>
                    </div>
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
                                    {{
                                    $c['cf']
                                    }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            @endisset
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    function updateCustomer(customer){
            console.log(customer);
            $('#customerId').val(customer.id);
            $('#customerName').val(customer.name);
            $('#birth_dateCustomer').val(customer.birth_date);
            $('#curpCustomer').val(customer.curp);
            $('#rfcCustomer').val(customer.rfc);

            $('#streetCustomer').val(customer.street);
            $('#inCustomer').val(customer.in);
            $('#enCustomer').val(customer.en);
            $('#cpCustomer').val(customer.cp);


            $('#suburbCustomer').val(customer.suburb);
            $('#cityCustomer').val(customer.city);
            $('#stateCustomer').val(customer.state);
            $('#countryCustomer').val(customer.country);
            $('#descriptionCustomer').val(customer.desctription);




            //$('#editFormCustomer').modal('show')
    }

    function showCustomer(customer){
        console.log(customer);
        $('#scustomerId').val(customer.id);
        $('#scustomerName').val(customer.name);
        $('#sbirth_dateCustomer').val(customer.birth_date);
        $('#scurpCustomer').val(customer.curp);
        $('#srfcCustomer').val(customer.rfc);

        $('#sstreetCustomer').val(customer.street);
        $('#sinCustomer').val(customer.in);
        $('#senCustomer').val(customer.en);
        $('#scpCustomer').val(customer.cp);


        $('#ssuburbCustomer').val(customer.suburb);
        $('#scityCustomer').val(customer.city);
        $('#sstateCustomer').val(customer.state);
        $('#scountryCustomer').val(customer.country);
        $('#sdescriptionCustomer').val(customer.desctription);




        //$('#editFormCustomer').modal('show')
}
</script>

@endpush
