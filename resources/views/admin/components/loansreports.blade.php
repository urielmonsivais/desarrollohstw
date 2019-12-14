@extends('admin.app')
@section('content')
@include('admin.components.editcustomer')
@include('admin.components.newcustomer')
@include('admin.components.showcustomer')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Generar reporte de prestamos por cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Reportes de prestamos</li>
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
                    <h3 class="card-title">Buscar cliente</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="" method="GET" action="{{ route('checkCustomer') }}" role="search">
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
                    <h3>General</h3>
                    @if ($selectedCustomer->bureau->state != 'x')
                    <form role="form" action="" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Nombre del cliente:</label>
                                        <input readonly type="text" name="" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId" value="{{ $selectedCustomer->name }}">
                                        {{--  <small id="helpId" class="text-muted">Help text</small>  --}}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento:</label>
                                        <input readonly type="text" name="" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId" value="{{ $selectedCustomer->birth_date }}">
                                        {{--  <small id="helpId" class="text-muted">Help text</small>  --}}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Fecha de registro:</label>
                                        <input readonly type="text" name="" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId" value="{{ $selectedCustomer->created_at }}">
                                        {{--  <small id="helpId" class="text-muted">Help text</small>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                    <h3> Créditos</h3>
                    <h6>Bancarios</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Institución</th>
                                <th scope="col">Código</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($loans as $i => $l)
                                <th scope="row">{{ $i+1 }}</th>
                                <td>{{ 'HSTW' }}</td>
                                <td>{{ $i }}</td>
                                <td><a href="{{ route('printpdf',$l->id) }}" class="btn btn-sm btn-outline-info">
                                        Reporte</a></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
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
