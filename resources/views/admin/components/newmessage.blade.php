@extends('admin.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nuevo mensaje</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Compose</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Redactar nuevo mensaje</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="saveMessage" action="{{ route('storeMessage') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input name="from" type="hidden" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="to">Seleccione un destinatario</label>
                                <select class="form-control" name="to" id="to" required>
                                    @foreach ($users as $u)
                                    @if ($u->id!=Auth::user()->id && $u->id!=1)
                                    <option value="{{ $u->id }}">
                                        {{ $u->name.' - '.$u->email }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="subject" placeholder="Asunto:" required>
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="compose-textarea" class="form-control" rows="10"
                                    style="height: 500px">
                            </textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Añadir archivo adjunto
                                    <input type="file" name="attachment" onload="loadImage(this)">
                                </div>
                                <p class="help-block">Max. 2MB</p>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">

                            <button type="button" onclick="saveMessage()" class="btn btn-primary"><i
                                    class="far fa-envelope"></i>
                                Enviar</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Cancelar</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection

@push('scripts')
<script>
    $(function () {
    //Add text editor
    $('#compose-textarea').summernote()

  })


  function saveMessage(){


    $('#body').val($('#body').summernote('code'))

    $('#saveMessage').submit()
   }

  function loadImage(e) {
    alert(this.value)
    }
</script>
@endpush
