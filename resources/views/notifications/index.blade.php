@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Notifications') }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{-- <button onclick="startFCM()" class="btn btn-danger btn-flat">Aceitar Notificação
                        </button> --}}
                        <div class="card mt-3">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{ route('send.web-notification') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Messagem</label>
                                        <textarea class="form-control" name="body" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar Notificação</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection