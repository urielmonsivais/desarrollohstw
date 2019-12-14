@extends('admin.app')
@section('content')


<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mensajes</h1>
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
                            <h3 class="card-title">Mensaje</h3>

                            {{--  <div class="card-tools">
                                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i
                                        class="fas fa-chevron-left"></i></a>
                                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i
                                        class="fas fa-chevron-right"></i></a>
                            </div>  --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>{{ $message->subject }}</h5>
                                <h6>From: {{ $message->to()->email }}
                                    <span class="mailbox-read-time float-right">
                                        {{ $message->created_at }}</span>
                                </h6>
                            </div>
                            <!-- /.mailbox-read-info -->
                            {{--  <div class="mailbox-controls with-border text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Delete">
                                        <i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Reply">
                                        <i class="fas fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Forward">
                                        <i class="fas fa-share"></i></button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                    title="Print">
                                    <i class="fas fa-print"></i></button>
                            </div>  --}}
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message" id="body-message">

                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.card-body -->
                        @if (isset($files))
                        <div class="card-footer bg-white">
                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="far fa-file"></i></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i>
                                            {{ $files->name }}
                                        </a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                            <span>1,245 KB</span>
                                            <a href="{{ asset($files->url) }}"
                                                class="btn btn-default btn-sm float-right"><i
                                                    class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endif
                        <!-- /.card-footer -->
                        {{--  <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i>
                                    Reply</button>
                                <button type="button" class="btn btn-default"><i class="fas fa-share"></i>
                                    Forward</button>
                            </div>
                            <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i>
                                Delete</button>
                            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                        </div>  --}}
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script>
    $(function () {
            //Add text editor
            const message = @json($message->content);
            $('#body-message').html(message.body);
            let t = document.getElementById('body-message');
            t.innerHTML = message.body;

            })
</script>
@endpush
