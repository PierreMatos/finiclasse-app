@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>{{__('Edit financing')}}</h1> -->
                    <h1>{{__('Edit')}} {{ isset($financing->name) ? $financing->name : '' }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
 
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($financing, ['route' => ['financings.update', $financing->id], 'method' => 'patch', 'files' => true]) !!}

            <div class="card-body">
                <div class="row">
                    @include('financings.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('financings.index') }}" class="btn btn-default">{{__('Cancel')}}</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
