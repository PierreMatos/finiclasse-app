@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>{{__('Edit client')}}</h1> -->
                    <h1>{{__('Edit')}} {{ isset($user->name) ? $user->name : '' }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($user, ['route' => ['sellers.update', $user->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('sellers.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('getSellers') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
