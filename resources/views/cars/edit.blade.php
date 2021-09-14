@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>{{ __('Edit car') }}</h1> -->
                    <h1>{{ isset($car->model->make->name) ? $car->model->make->name : '' }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <!-- Nav tabs -->
        <ul class="nav nav-tabs bg-nav" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="geral-tab" data-toggle="tab" href="#geral" role="tab" aria-controls="geral"
                    aria-selected="true">Geral</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="caracteristicas-tab" data-toggle="tab" href="#caracteristicas" role="tab"
                    aria-controls="caracteristicas" aria-selected="false">Caracteristicas</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="equipamento-tab" data-toggle="tab" href="#equipamento" role="tab"
                    aria-controls="equipamento" aria-selected="false">Equipamento</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fotos-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos"
                    aria-selected="false">Fotos</a>
            </li>
        </ul>

        <div class="card">

            {!! Form::model($car, ['route' => ['cars.update', $car->id], 'method' => 'patch', 'id' => 'save', 'files' => true]) !!}

            <div class="card-body">
                <div class="row">
                    @include('cars.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('cars.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
