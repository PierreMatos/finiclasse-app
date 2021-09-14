@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>{{ __('Car') }}</h1> -->
                    <h1>{{__('Show')}} {{ isset($car->model->make->name) ? $car->model->make->name : '' }}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('cars.index') }}">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

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
            <div class="card-body">
                <div class="row">
                    @include('cars.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
