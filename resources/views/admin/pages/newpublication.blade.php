@extends('admin.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        @if ($errors->all())
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Error al guardar:</h5>
                    <div class="alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $e)
                            <li class="list-group-item-danger">
                                {{
                                    $e
                                 }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">


                @switch($type)
                @case('news')
                <h5 class="text-primary">
                    <a href="{{ route('publications',$type) }}" class="btn btn-link">
                        <i class="fa fa-arrow-circle-left"></i>
                        Atras
                    </a>
                    Nueva noticia</h5>
                @break
                @case('releases')
                <h5 class="text-primary">
                    <a href="{{ route('publications',$type) }}" class="btn btn-link">
                        <i class="fa fa-arrow-circle-left"></i>
                        Atras </a>
                    Nuevo comunicado</h5>
                @break
                @case('events')
                <h5 class="text-primary">
                    <a href="{{ route('publications',$type) }}" class="btn btn-link">
                        <i class="fa fa-arrow-circle-left"></i>
                        Atras </a>
                    Nueva evento</h5>
                @break
                @default

                @endswitch
            </div>
            <div class="card-body pad">

                <form role="form" id="makePublication" action="{{ route('storePublication',$type) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <label for="summary">Resumen</label>
                            <textarea id="summary" name="summary" class="textarea" placeholder="Espere un momento.."
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="introduction">Introducción</label>
                            <textarea id="instruction" name="introduction" class="textarea"
                                placeholder="Espere un momento.."
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="body">Contenido principal (Cuerpo)</label>
                            <textarea id="body" name="body" class="textarea" placeholder="Espere un momento.."
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="closure">Conclusión</label>
                            <textarea id="closure" name="closure" class="textarea" placeholder="Espere un momento.."
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="main_image">Imagen principal</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="main_image"
                                                name="primary_image">
                                            <label class="custom-file-label" for="main_image">Seleccionar imagen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="secondary_image">Imagen secundaria</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="secondary_image" type="file" class="custom-file-input"
                                                id="secondary_image">
                                            <label class="custom-file-label" for="secondary_image">Seleccionar
                                                imagen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="date_publication">Fecha de publicación</label>
                                    <input type="date" class="form-control" name="publication_date">
                                </div>
                                <div class="col-6">
                                    <label for="date_publication">Hora de publicación</label>
                                    <input type="time" class="form-control" name="publication_time">
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="visible" id="visible">
                            <label class="form-check-label" for="visible">Visible</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="savePublication()">
                            <i class="fa fa-save"></i>
                            Guardar</button>
                    </div>
                </form>


                {{--  <p class="text-sm mb-0">
                    Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                        information.</a>
                </p>  --}}

            </div>
        </div>
        <div class="row">

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {

            bsCustomFileInput.init();


            $('#summary').summernote()
            $('#introduction').summernote()
            $('#body').summernote()
            $('#clousre').summernote()

          })

   function savePublication(){

    $('#summary').val($('#summary').summernote('code'))
    $('#introduction').val($('#introduction').summernote('code'))
    $('#body').val($('#body').summernote('code'))
    $('#clousre').val($('#clousre').summernote('code'))

    $('#makePublication').submit()
   }
</script>


@endpush
