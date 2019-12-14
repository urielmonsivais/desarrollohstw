@extends('admin.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Compose</h1>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    @if ($type=='bandeja')
                    <h3 class="card-title">Badeja de entrada</h3>
                    @else
                    <h3 class="card-title">Enviados</h3>
                    @endif

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Mail">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i
                                    class="far fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                        <div class="float-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @foreach ($messages as $m)
                                <tr>
                                    {{--  <td>
                                        <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check1">
                                            <label for="check1"></label>
                                        </div>
                                    </td>  --}}
                                    </td>
                                    @if ($type=='bandeja')
                                    <td class="mailbox-name"><a
                                            href="{{ route('viewer',[$m->id,$type,$m->from()->name]) }}">
                                            {{ $m->from()->name }}
                                        </a></td>
                                    @else
                                    <td class="mailbox-name"><a
                                            href="{{ route('viewer',[$m->id,$type,$m->to()->name]) }}">
                                            {{ $m->to()->name }}</a></td>
                                    @endif

                                    <td class="mailbox-subject"><b>{{ $m->subject }}</b> -
                                        {{ substr(strip_tags($m->content->body),0,50).'...' }}
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">
                                        {{ $m->created_at }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
                {{--  <div class="card-footer p-0">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i
                                    class="far fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                        <div class="float-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                </div>  --}}
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function () {
              var clicks = $(this).data('clicks')
              if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
              } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
              }
              $(this).data('clicks', !clicks)
            })

            //Handle starring for glyphicon and font awesome
            $('.mailbox-star').click(function (e) {
              e.preventDefault()
              //detect type
              var $this = $(this).find('a > i')
              var glyph = $this.hasClass('glyphicon')
              var fa    = $this.hasClass('fa')

              //Switch states
              if (glyph) {
                $this.toggleClass('glyphicon-star')
                $this.toggleClass('glyphicon-star-empty')
              }

              if (fa) {
                $this.toggleClass('fa-star')
                $this.toggleClass('fa-star-o')
              }
            })
          })
</script>
@endpush
