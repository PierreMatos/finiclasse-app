@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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

        <div class="clearfix"></div>

        <form>
            @csrf
            <td>
                <select name="model_id" class="input-group form-control custom-select" id="model_id">
                    <option selected value="">--</option>
                    @foreach ($carData['models'] as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="komm" id="komm" placeholder="{{ __('Komm') }}" class="form-control"></td>
            <td>
                <select name="state_id" class="input-group form-control custom-select" id="state_id">
                    <option selected value="">--</option>
                    @foreach ($carData['states'] as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="order_date" id="order_date" placeholder="{{ __('Production') }}"
                    class="form-control"></td>
            <td><button class="btn btn-success btn-submit">Guardar</button></td>
        </form>

        <div class="card box-none">
            <div class="card-body p-0">

                <!-- TABLE FOR PAGE INITIALIZATION WITH ALL CARS -->
                <div class="table-responsive container" id="novos-div">
                    <table class="table" id="novos-table">
                        <thead>
                            <tr>
                                <th>{{ __('Model') }}</th>
                                <th>{{ __('Komm') }}</th>
                                <th>{{ __('State') }}</th>
                                <th>{{ __('Production') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newCars->sortByDesc('created_at') as $car)
                                <tr>
                                    <td>{{ $car->model->name }}</td>
                                    <td>{{ $car->komm }}</td>
                                    <td>{{ $car->state->name }}</td>
                                    <td>{{ $car->order_date }}</td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
        // Table

        var table = $('#novos-table').DataTable({
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

            buttons: []
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

                var model_id = $("#model_id").val();
                var komm = $("#komm").val();
                var state_id = $("#state_id").val();
                var order_date = $("#order_date").val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('newCarsPost') }}",
                    data: {
                        model_id: model_id,
                        komm: komm,
                        state_id: state_id,
                        order_date: order_date,
                        //
                        category_id: 1,
                        condition_id: 1,
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#novos-table').load(location.href + ' #novos-table>*');
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

                function printSuccessMsg(msg) {

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
            sideBySide: true
        });
    </script>
@endpush

<style>
    .print-error-msg ul {
        margin-bottom: 0px;
    }

</style>
