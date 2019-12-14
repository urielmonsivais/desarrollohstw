@extends('admin.app')
@section('content')
@include('admin.components.editcustomer')
@include('admin.components.newcustomer')
@include('admin.components.showcustomer')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Asignar tarjeta a cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Tarjetas</li>
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
                <form role="form" action="{{ route('setCard') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cliente</label>
                            <select name="customer_id" id="" class="form-control">
                                @foreach ($customers as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Número de tarjeta</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password"
                                value="{{ $num }}" required name="number">
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" id="" class="form-control">
                                <option value="DEBITO">DÉBITO</option>
                                <option value="CREDITO">CRÉDITO</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tarjetas activas</h3>

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
                                <th>Múmero</th>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cards as $i => $c)
                            <tr>
                                <td><strong class="text-primary">{{ $c->number }}</strong></td>
                                <td>{{ $c->customer->name }}</td>
                                <td>
                                    {{
                                        $c->type
                                     }}
                                </td>
                                <td>
                                    @php
                                    $st = explode(',',$c->description);
                                    $status = 'D';
                                    foreach($st as $s){
                                    if($s=='E'){
                                    $status = 'E';
                                    break;
                                    }
                                    }
                                    @endphp
                                    @if ($status=='E')
                                    <a href="{{ route('setStatus',[$c->id,'D,']) }}" title="DESACTIVAR"
                                        class="btn btn-success">ACTIVA</a>
                                    @else
                                    <a href="{{ route('setStatus',[$c->id,'E,']) }}" title="ACTIVAR"
                                        class="btn btn-warning">DESACTIVADA</a>
                                    @endif
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
