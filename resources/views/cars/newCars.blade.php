@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" class="namePd">
                <div class="col-sm-6">
                    <h1>{{ __('Cars') }} - {{ __('NewCar') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('cars.create') }}">
                        {{ __('Add New') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>

        <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
        </div>

        <div class="clearfix"></div>

        <form id="addNewCar" class="container">
            @csrf

            <div class="divH4">
                <h4>Adicionar carro rápido:</h4>
            </div>

            <div class="row newCarTable col-md-12">
                <div class="form-group col-md-2">
                    <select name="make_id" class="input-group form-control custom-select formMargin" id="make_id">
                        <option selected value="" disabled>{{ __('Make') }}</option>
                        @foreach ($carData['makes'] as $make)
                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <select name="model_id" class="input-group form-control custom-select formMargin" disabled id="model_id">
                        <option selected value="" disabled>{{ __('Model') }}</option>
                        @foreach ($carData['models'] as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="color_exterior" id="color_exterior" placeholder="{{ __('Color') }}"
                        class="form-control formMargin">
                </div>
                <div class="form-group col-md-2">
                    <input type="number" name="est" id="est" placeholder="{{ __('Est') }}"
                        class="form-control formMargin">
                </div>
                <div class="form-group col-md-2">
                    <input type="number" name="komm" id="komm" placeholder="{{ __('Komm') }}"
                        class="form-control formMargin">
                </div>
                <div class="form-group col-md-2">
                    <select name="stand_id" class="input-group form-control custom-select formMargin" id="stand_id">
                        <option selected value="" disabled>{{ __('Stand') }}</option>
                        @foreach ($carData['stands'] as $stand)
                            <option value="{{ $stand->id }}">{{ $stand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <select name="state_id" class="input-group form-control custom-select formMargin" id="state_id">
                        <option selected value="" disabled>{{ __('State') }}</option>
                        @foreach ($carData['states'] as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="order_date" id="order_date" placeholder="{{ __('Production') }}"
                        class="form-control formMargin"></td>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="observations" id="observations" placeholder="{{ __('Observations') }}"
                        class="form-control formMargin"></td>
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-success btn-submit form-control">{{ __('Save') }}</button></td>
                </div>
            </div>
            
        </form>

        <div class="card box-none">
            <div class="card-body p-0">

                <ul class="nav nav-tabs bg-nav">
                    @foreach ($carData['stands'] as $stand)
                        <li class="nav-item">
                            <a class="nav-link tab_button {{ $loop->first ? 'active' : '' }}" id="{{ $stand->id }}"
                                data-toggle="tab" href="#menu1">{{ $stand->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <!--
                <ul class="nav nav-tabs bg-nav">
                    @foreach ($carData['stands'] as $stand)
                        <li class="nav-item">
                            <a class="nav-link tab_button @if (Auth::user()->stand_id == $stand->id) active @elseif(Auth::user()->stand_id == '') {{ $loop->first ? 'active' : '' }} @endif" id="{{ $stand->id }}"
                                data-toggle="tab" href="#menu1">{{ $stand->name }}</a>
                        </li>
                    @endforeach
                </ul>
                -- >

                @foreach ($carData['stands'] as $stand)

                    <!-- TABLE FOR PAGE INITIALIZATION WITH ALL CARS -->
                    <div class="table-responsive container" id="{{ $stand->id }}-table-div">
                        <table class="table" id="{{ $stand->id }}-table">
                            <thead>
                                <tr>
                                    <th>{{ __('Make') }}</th>
                                    <th>{{ __('Model') }}</th>
                                    <th>{{ __('Color') }}</th>
                                    <th>{{ __('Est') }}</th>
                                    <th>{{ __('Komm') }}</th>
                                    <th>{{ __('State') }}</th>
                                    <th>{{ __('Production') }}</th>
                                    <th>{{ __('Observations') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newCars->sortByDesc('created_at') as $car)
                                    @if ($car->stand->name == $stand->name)
                                        <tr>
                                            <td>{{ $car->model->make->name }}</td>
                                            <td>{{ $car->model->name }}</td>
                                            <td>{{ $car->color_exterior }}</td>
                                            <td>{{ $car->est }}</td>
                                            <td>{{ $car->komm }}</td>
                                            <td>{{ $car->state->name }}</td>
                                            <td>{{ date('d-m-y', strtotime($car->order_date)) }}</td>
                                            <td>{{ $car->observations }}</td>
                                            <td width="120">
                                                {!! Form::open(['route' => ['cars.destroy', $car->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('cars.show', [$car->id]) }}"
                                                        class='btn btn-default btn-xs'>
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('cars.edit', [$car->id]) }}"
                                                        class='btn btn-default btn-xs'>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem a certeza?')"]) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endforeach

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        // SET DEFUALT STATE OF TABLES IN THE PAGE

        // INICIO PARA APAGAR (Colocar dinamico)
        $('#1-table-div').show();
        $('#2-table-div').hide();

        //tabela todos -pode ficar em função
        var table =
            $('#1-table').DataTable({
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "{{ __('Search...') }}",
                    paginate: {
                        "previous": "{{ __('Previous') }}",
                        "next": "{{ __('Next') }}"
                    },
                    lengthMenu: "{{ __('Show') }} _MENU_ {{ __('Entries') }}",
                },
                autoFill: true,
                retrieve: true,
                responsive: true,
                order: [],
                "dom": '<"top" <"float-left"f><"float-right"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',
                buttons: [
                    {
                        text: 'Todos',
                        active: true,
                        action: function() {
                            table.search('').draw();
                            table.button(1).active(false);
                            table.button(2).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Encomendado',
                        action: function() {
                            table.search('Encomendado').draw();
                            table.button(0).active(false);
                            table.button(2).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Disponivel',
                        action: function() {
                            table.search('Disponivel').draw();
                            table.button(0).active(false);
                            table.button(1).active(false);
                            this.active(true);
                        }
                    }
                ]
            });
            table.button(0).active(true)
            table.button(1).active(false)
            table.button(2).active(false)
        // FIM PARA APAGAR

        // Table

        $('.tab_button').on('click', function() {
            var id = this.id
            var idDiv = '#' + id + '-table-div';
            var idTable = '#' + id + '-table';

            $('.table-responsive').hide();
            $(idDiv).show();

            var tableCondition = $(idTable).DataTable({
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "{{ __('Search...') }}",
                    paginate: {
                        "previous": "{{ __('Previous') }}",
                        "next": "{{ __('Next') }}"
                    },
                    lengthMenu: "{{ __('Show') }} _MENU_ {{ __('Entries') }}",
                },
                autoFill: true,
                retrieve: true,
                responsive: true,
                order: [],
                "dom": '<"top" <"float-left w-200"f><"float-right"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',

                buttons: [
                    {
                        text: 'Todos',
                        active: true,
                        action: function() {
                            tableCondition.search('').draw();
                            tableCondition.button(1).active(false);
                            tableCondition.button(2).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Encomendado',
                        action: function() {
                            tableCondition.search('Encomendado').draw();
                            tableCondition.button(0).active(false);
                            tableCondition.button(2).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Disponivel',
                        action: function() {
                            tableCondition.search('Disponivel').draw();
                            tableCondition.button(0).active(false);
                            tableCondition.button(1).active(false);
                            this.active(true);
                        }
                    }
                ]
            });
            tableCondition.button(0).active(true)
            tableCondition.button(1).active(false)
            tableCondition.button(2).active(false)
        });

        // Ajax Setup

        $(document).ready(function() {
            $(".btn-submit").click(function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var make_id = $("#make_id").val();
                var model_id = $("#model_id").val();
                var komm = $("#komm").val();
                var color_exterior = $("#color_exterior").val();
                var est = $("#est").val();
                var stand_id = $("#stand_id").val();
                var state_id = $("#state_id").val();
                var order_date = $("#order_date").val();
                var observations = $("#observations").val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('newCarsPost') }}",
                    data: {
                        make_id: make_id,
                        model_id: model_id,
                        komm: komm,
                        color_exterior: color_exterior,
                        est: est,
                        stand_id: stand_id,
                        state_id: state_id,
                        order_date: order_date,
                        observations: observations,
                        // Hidden
                        category_id: 1,
                        condition_id: 1,
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            printSuccessMsg(data.error);
                            $(".print-error-msg").css('display', 'none');

                            $(".btn-submit").attr("disabled", true).css({
                                'pointer-events': 'none',
                                'cursor': 'not-allowed',
                                'opacity': '0.5'
                            });

                            $('#1-table').load(location.href + ' #1-table>*');
                            $('#2-table').load(location.href + ' #2-table>*');
                            $("#addNewCar").trigger("reset");
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

                setTimeout(function() {
                    $(".btn-submit").removeAttr('disabled').css({
                        'pointer-events': 'inherit',
                        'cursor': 'pointer',
                        'opacity': 'inherit'
                    });
                }, 3000);

                function printSuccessMsg(msg) {
                    $(".print-success-msg").find("ul").html('');
                    $(".print-success-msg").css('display', 'block');
                    $(".print-success-msg").find("ul").append('<li>Novo carro adicionado</li>');

                    setTimeout(function() {
                        $('.print-success-msg').fadeOut('fast');
                    }, 3000);
                }

                function printErrorMsg(msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display', 'block');
                    $.each(msg, function(key, value) {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    });
                }
            });
        });

        // Production datapicker

        $('#order_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
        });

        // Marca-Modelo relation

        $('#make_id').on('change', function() {
            var idMake = this.value;
            $("#model_id").html('');
            $.ajax({
                url: "{{ url('fetch-models') }}",
                type: "POST",
                data: {
                    make_id: idMake,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#model_id').html('<option value="">--</option>');
                    $.each(result.models, function(key, value) {
                        $("#model_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $("#model_id").prop("disabled", false);
                }
            });
        });
    </script>
@endpush

<style>
    .print-error-msg ul {
        margin-bottom: 0px;
    }

    .print-success-msg ul {
        margin-bottom: 0px;
    }

    .table td {
        position: relative;
    }

    #addNewCar {
        padding-top: 25px;
        padding-bottom: 50px;
    }

    .content-header {
        padding-bottom: 25px !important;
    }

    .divH4 {
        padding-bottom: 10px;
    }

    .newCarTable {
        display: inline-flex !important;
    }

    .formMargin {
        margin-right: 10px;
    }

</style>
