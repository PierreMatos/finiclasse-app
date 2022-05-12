@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" class="namePd">
                <div class="col-sm-6">
                    <h1>{{ __('Cars') }} - {{ __('NewCar') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success adicionarBtn" onClick="add()" href="javascript:void(0)">Novo Carro</a>
                </div>
            </div>
        </div>
    </section>

    <body>
        <div class="container mt-2">
            {{-- Success --}}
            <div class="alert alert-success" id="successMsg" style="display:none;">
                <ul></ul>
            </div>
            {{-- Errors --}}
            <div class="alert alert-danger print-error-msg" style="display:none; padding-bottom: 0px;">
                <ul></ul>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="ajax-crud-datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('Make') }}</th>
                            <th>{{ __('Model') }}</th>
                            <th>{{ __('Color') }}</th>
                            <th>{{ __('Est') }}</th>
                            <th>{{ __('Komm') }}</th>
                            <th>{{ __('Stand') }}</th>
                            <th>{{ __('State') }}</th>
                            <th>{{ __('Production') }}</th>
                            <th>{{ __('Observations') }}</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- boostrap car model -->
        <div class="modal fade" id="car-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="CarModal"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="CarForm" name="CarForm" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Make') }}</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="make_id" name="make_id">
                                        <option selected value="" disabled>--</option>
                                        @foreach ($carData['makes'] as $make)
                                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Model') }}</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="model_id" name="model_id" disabled>
                                        <option selected value="" disabled>--</option>
                                        @foreach ($carData['models'] as $model)
                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Color') }}</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="color_exterior" name="color_exterior">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Est') }}</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="est" name="est">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Komm') }}</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="komm" name="komm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Stand') }}</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="stand_id" name="stand_id">
                                        <option selected value="" disabled>--</option>
                                        @foreach ($carData['stands'] as $stand)
                                            @if (!Auth::user()->hasRole('Chefe de vendas'))
                                                <option value="{{ $stand->id }}">{{ $stand->name }}</option>
                                            @elseif(Auth::user()->hasRole('Chefe de vendas') && Auth::user()->stand_id == $stand->id)
                                                <option value="{{ $stand->id }}">{{ $stand->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ __('State') }}</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="state_id" name="state_id">
                                        <option selected value="" disabled>--</option>
                                        @foreach ($carData['states'] as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Production') }}</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="order_date" name="order_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('Observations') }}</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="observations" name="observations">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary" id="btn-save"
                                style="float: left;">{{ __('Save') }}</button>
                            <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal"
                                style="float: right;">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->
    </body>
@endsection
@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: false,
                ajax: "{{ url('new-car') }}",
                columns: [{
                        data: 'id',
                        "visible": false
                    },
                    {
                        data: 'makes',
                        name: 'makes.name',
                    },
                    {
                        data: 'models',
                        name: 'models.name'
                    },
                    {
                        data: 'color_exterior',
                        searchable: false
                    },
                    {
                        data: 'est',
                        searchable: false
                    },
                    {
                        data: 'komm',
                        searchable: false
                    },
                    {
                        data: 'stands',
                        name: 'stands.name',
                        searchable: false
                    },
                    {
                        data: 'states'
                    },
                    {
                        data: 'order_date',
                        name: 'order_date',
                        searchable: false
                    },
                    {
                        data: 'observations'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    },
                ],
                autoFill: true,
                retrieve: true,
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                "dom": '<"top" <"float-left w-200"f><"searchNames"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',

                buttons: [{
                        text: 'Todos',
                        className: 'active',
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
        });

        $('#order_date').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true
        });

        var translations = {
            change: "@lang('translation.change successfully')",
            delete: "@lang('translation.delete car')",
        };

        function add() {
            $('#CarForm').trigger("reset");
            $('#CarModal').html("Adicionar Carro");
            $('#car-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {

            $("#model_id").prop("disabled", false);

            $.ajax({
                type: "POST",
                url: "{{ url('edit-car') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#CarModal').html("Editar Carro");
                    $('#car-modal').modal('show');
                    $('#id').val(res.id);
                    $('#make_id').val(res.model.make.id);
                    $('#model_id').val(res.model_id);
                    $('#color_exterior').val(res.color_exterior);
                    $('#est').val(res.est);
                    $('#komm').val(res.komm);
                    $('#stand_id').val(res.stand_id);
                    $('#state_id').val(res.state_id);

                    var order_date = res.order_date;

                    if (order_date === null) {
                        $('#order_date').val('');
                    } else if (order_date !== null) {
                        $('#order_date').val(moment(res.order_date).format('DD/MM/YYYY'));
                    }

                    $('#observations').val(res.observations);
                }
            });
        }

        function deleteFunc(id) {
            if (confirm("Tem a certeza?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-car') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#ajax-crud-datatable').dataTable();
                        oTable.fnDraw(false);

                        $('#ajax-crud-datatable').DataTable().ajax.reload();

                        $("#successMsg").text(translations.delete).css('display', 'block');
                        setTimeout(function() {
                            $("#successMsg").css('display', 'none');
                        }, 5000);
                    }
                });
            }
        }

        $('#CarForm').submit(function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('store-car') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if ($.isEmptyObject(data.error)) {

                        $("#car-modal").modal('hide');
                        var oTable = $('#ajax-crud-datatable').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Guardar');
                        $("#btn-save").attr("disabled", false);

                        $('#ajax-crud-datatable').DataTable().ajax.reload();

                        $(".print-error-msg").css('display', 'none');

                        $("#successMsg").text(translations.change).css('display', 'block');
                        setTimeout(function() {
                            $("#successMsg").css('display', 'none');
                        }, 5000);

                    } else {
                        printErrorMsg(data.error);
                        $("#car-modal").modal('hide');
                    }
                }
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
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

</html>

<style>
    @media screen and (max-width: 1200px) {
        div.dataTables_wrapper div.dataTables_filter input {
            width: 100% !important;
        }
    }

    @media screen and (max-width: 800px) {
        .searchNames {
            float: left !important;
        }

        div.dataTables_wrapper div.dataTables_length label {
            margin-right: -25px !important;
            margin-top: 6px !important;
            padding-bottom: 0px !important;
        }

        .novoBtn {
            padding-top: 20px !important;
        }

        .adicionarBtn {
            float: left !important;
            margin-top: 30px !important;
        }
    }

    @media screen and (min-width: 800px) {
        .searchNames {
            float: right !important;
        }
    }

    #ajax-crud-datatable {
        width: auto !important;
    }

    .novoBtn {
        margin-left: 15px;
        padding-top: 50px;
    }

    .adicionarBtn {
        float: right;
    }

    .closeModal:hover {
        background-color: #5a6268 !important;
        border-color: #545b62 !important;
    }

</style>