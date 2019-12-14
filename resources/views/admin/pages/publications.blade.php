@extends('admin.app')
@section('content')
<section class="content">
    <div class="container-fluid">

        @if ($errors->all())
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                    test.
                </div>
            </div>
        </div>
        @endif
        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        <br>
        @endif
        <div class="card">
            <div class="card-header">

                @switch($type)
                @case('news')
                <a href="{{ route('makePublication','noticias') }}" class="btn btn-outline-primary">
                    <i class="fa fa-plus-square"></i>
                    Nueva noticia
                </a>
                @break
                @case('releases')
                <a href="{{ route('makePublication','comunicados') }}" class="btn btn-outline-primary">
                    <i class="fa fa-plus-square"></i>
                    Nuevo comunicado
                </a>
                @break
                @case('events')
                <a href="{{ route('makePublication','eventos') }}" class="btn btn-outline-primary">
                    <i class="fa fa-plus-square"></i>
                    Nuevo evento
                </a>
                @break
                @default
                @endswitch
            </div>
        </div>
        <div class="card">
            <div class="card-header">


                @switch($type)
                @case('news')
                <h3 class="card-title">Últimas noticias publicadas</h3>
                @break
                @case('releases')
                <h3 class="card-title">Últimos comunicados</h3>
                @break
                @case('events')
                <h3 class="card-title">Últimos eventos publicados</h3>
                @break
                @default
                @endswitch

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Titulo
                            </th>
                            <th style="width: 30%">
                                Municipio
                            </th>
                            <th>
                                Fecha de publicación
                            </th>
                            <th style="width: 8%" class="text-center">
                                Estado
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $i => $p)
                        <tr>
                            <td>
                                {{ $i+1 }}
                            </td>
                            <td>
                                <a>
                                    {{
                                        $p->title
                                     }}
                                </a>
                                <br />
                                <small>
                                    Creado {{ $p->created_at }}
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" title="{{ $p->user->name }}" class="table-avatar"
                                            src="../../dist/img/avatar.png">
                                        <small>
                                            {{ $p->user->name }}
                                        </small>
                                    </li>
                                </ul>
                            </td>
                            <td class="">
                                {{
                                    $p->publication_date
                                 }}
                            </td>
                            <td class="project-state">
                                @if ($p->state=='on')
                                <span class="badge badge-success">ACTIVO</span>
                                @else
                                <span class="badge badge-warning">INACTIVO</span>
                                @endif
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                {{--  <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>  --}}
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection
