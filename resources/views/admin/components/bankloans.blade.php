@extends('admin.app')
@section('content')
@include('admin.components.editcustomer')
@include('admin.components.newcustomer')
@include('admin.components.showcustomer')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Asignar Prestamo</h1>
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
                    <h3 class="card-title">Asignación rápida</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="" method="GET" action="{{ route('setloan') }}" role="search">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Buscar cliente</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="client"
                                            placeholder="Numero de cliente" value="" name="client_number">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="rfc" placeholder="RFC" value=""
                                            name="rfc">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="curp" placeholder="CURP" value=""
                                            name="curp">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <label for="">Fecha de nacimiento:</label>
                                        <input type="date" class="form-control" id="birth_date" placeholder="CURP"
                                            value="" name="birth_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-outline-info" type="submit">Buscar y verificar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (isset($selectedCustomer))
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <label for="">Cliente:</label>
                    <h4 class="text-primary">
                        {{ $selectedCustomer->name }}
                    </h4>
                    @if ($selectedCustomer->bureau->state == 'SUCCESS')
                    <button type="button" class="btn btn-success">
                        APTO
                    </button>
                    @endif
                    @if ($selectedCustomer->bureau->state == 'WARNING')
                    <button type="button" class="btn btn-warning">
                        ATENCIÓN ESPECIAL
                    </button>
                    @endif
                    @if ($selectedCustomer->bureau->state == 'DANGER')
                    <button type="button" class="btn btn-danger">
                        NO APTO
                    </button>
                    @endif
                    <p>
                        {{ $selectedCustomer->bureau->description }}
                    </p>
                    @if ($selectedCustomer->bureau->state != 'DANGER')
                    <form role="form" action="{{ route('setloan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ $selectedCustomer->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Monto</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="0.0"
                                    value="" required name="amount">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Plazo en años</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="0.0"
                                    value="1" required name="payment_deadline">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Asignar prestamo</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        @endif

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Prestamos</h3>

                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCustomer"
                                    data-whatever="@mdo">Nuevo Cliente</button> --}}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Plazo(años)</th>
                                <th>Monto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $i => $c)
                            <tr>
                                <td><strong class="text-primary">{{ $c->customer->name }}</strong></td>
                                <td>{{ $c->payment_deadline }}</td>
                                <td>
                                    {{
                                    $c->amount
                                    }}
                                </td>
                                <td>
                                    <a href="" title="" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                        VER
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
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
