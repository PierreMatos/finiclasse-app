@extends('layouts.app')

@section('content')

    <body onload="startFCM()"></body>

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
                    <h3>{{ $proposalsOpenNew }}</h3>

                    <p>Propostas Abertas de viaturas novas</p>
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
                    <h3>{{ intval(round($proposalsCloseNew)) }}<sup style="font-size: 20px">%</sup></h3>

                    <p>Propostas Fechadas de viaturas novas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="/proposals" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $proposalsOpenUsed }}</h3>

                    <p>Propostas Abertas de viaturas usadas</p>
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
                    <h3>{{ intval(round($proposalsClosedUsed)) }}<sup style="font-size: 20px"></sup></h3>

                    <p>Propostas Fechadas de viaturas usadas</p>
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
                            <th>Criada</th>
                            <th>Atualizada</th>
                            <th>Ver mais</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestProposal as $proposal)
                            <tr>
                                @if (!$proposal->car->getFirstMediaUrl('cars', 'thumb'))
                                    <td><img src="storage/images/noPhoto.jpg" class="imgCar" /></td>
                                @else
                                    <td><img src="{{ $proposal->car->getFirstMediaUrl('cars', 'thumb') }}"
                                            style="max-width: 100px;" class="imgCar" /></td>
                                @endif
                                <td>{{ isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : '' }}
                                </td>
                                <td>{{ isset($proposal->client->name) ? $proposal->client->name : '' }}</td>
                                <td>{{ isset($proposal->vendor->name) ? $proposal->vendor->name : '' }}</td>
                                <td>{{ isset($proposal->created_at) ? $proposal->created_at : '' }}</td>
                                <td>{{ isset($proposal->updated_at) ? $proposal->updated_at : '' }}</td>
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
@endsection

<!-- The core Firebase JS SDK is always required and must be listed first -->
@push('page_scripts')
    <script>
        var firebaseConfig = {
            apiKey: "{{ config('services.firebase.apiKey') }}",
            authDomain: "{{ config('services.firebase.authDomain') }}",
            projectId: "{{ config('services.firebase.projectId') }}",
            storageBucket: "{{ config('services.firebase.storageBucket') }}",
            messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
            appId: "{{ config('services.firebase.appId') }}",
            measurementId: "{{ config('services.firebase.measurementId') }}"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/store-token',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            // alert('Token Guardado.');
                            console.log('Token Guardado.');
                        },
                        error: function(error) {
                            alert(error);
                        },
                    });
                }).catch(function(error) {
                    alert(error);
                });
        }
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });
    </script>
@endpush