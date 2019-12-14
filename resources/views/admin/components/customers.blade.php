@extends('admin.app')
@section('content')
@include('admin.components.editcustomer')
@include('admin.components.newcustomer')
@include('admin.components.showcustomer')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gestión de clientes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Gestión de clientes</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="rows">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clientes</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCustomer"
                        data-whatever="@mdo">Nuevo Cliente</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>CURP</th>
                            <th>RFC</th>
                            <th>Dirección</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $i => $c)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->birth_date }}</td>
                            <td><span class="tag tag-success">{{ $c->curp }}</span></td>
                            <td>{{ $c->rfc }}</td>
                            <td>{{
                            $c->street.' '.$c->suburb.' ',$c->city
                            }}</td>
                            <td>---</td>
                            <td>
                                <button data-toggle="modal" data-target="#editCustomer" data-whatever="@mdo"
                                    onclick="updateCustomer(JSON.parse('{{ $c }}'))" title="Editar"
                                    class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <a href="{{ route('deleteCustomer',$c->id) }}" title="Eliminar"
                                    class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>


                                <button data-toggle="modal" data-target="#showCustomer" data-whatever="@mdo"
                                    onclick="showCustomer(JSON.parse('{{ $c }}'))" title="Editar" title="Ver" href=""
                                    class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
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
