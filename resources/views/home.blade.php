@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>


    <!-- <div class="container"> -->
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $carsCount }}</h3>

                    <p>Viaturas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-car"></i>
                </div>
                <a href="/cars" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $clientsCount }}</h3>

                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="/clients-list" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $proposalOpen }}</h3>

                    <p>Propostas Abertas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <a href="/proposals" class="small-box-footer">ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ intval(round($proposalClosePer)) }}<sup style="font-size: 20px">%</sup></h3>

                    <p>Propostas Fechadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="/proposals" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Últimas Propostas</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Carro</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Ver mais</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestProposal as $proposal)
                            <tr>

                                <td>
                                  @isset($proposal->car) 
                                    <img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}"
                                        style="max-width: 100px;" />
                                  @endisset</td>
                                <td>{{ isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : '' }}
                                </td>
                                <td>{{ isset($proposal->client->name) ? $proposal->client->name : '' }}</td>
                                <td>{{ isset($proposal->vendor->name) ? $proposal->vendor->name : '' }}</td>

                                <td class="">
                                    <a href="/proposals/{{ $proposal->id }}/edit" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection