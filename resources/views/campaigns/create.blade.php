@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('Create campaign')}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'campaigns.store', 'files' => true]) !!}

            <div class="card-body">

                <div class="row">
                    @include('campaigns.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('campaigns.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
