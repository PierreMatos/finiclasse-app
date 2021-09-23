@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>{{ __('Edit client') }}</h1> -->
                    <h1>{{ __('Edit') }} {{ isset($user->name) ? $user->name : '' }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('users.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                @if ($user->gdpr_confirmation == '')
                    <div class="btn dropdown show">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('RGPD Validate') }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('createValidateRGPD', [$user->id]) }}">E-mail</a>
                            <a class="dropdown-item" href="#">SMS</a>
                        </div>
                    </div>
                @endif
                <a href="{{ route('getClients') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
