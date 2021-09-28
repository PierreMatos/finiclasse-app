@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Cars') }} - Novos</h1>
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

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card box-none">
            <div class="card-body p-0">

                <!-- TABLE FOR PAGE INITIALIZATION WITH ALL CARS -->
                <div class="table-responsive container" id="Novos-table-div">
                    <table class="table" id="Novos-table">
                        <thead>
                            <tr>
                                <th>{{ __('Photo') }}</th>
                                <th>{{ __('Make') }}</th>
                                <th>{{ __('Model') }}</th>
                                <th>{{ __('Plate') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form>
                                    @csrf
                                    <td>Photo</td>
                                    <td>
                                        <select name="make_id" class="input-group form-control custom-select"
                                            id="make_id">
                                            <option selected value="">--</option>
                                            @foreach ($carData['makes'] as $make)
                                                <option value="{{ $make->id }}">{{ $make->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="model_id" class="input-group form-control custom-select"
                                            id="model_id">
                                            <option selected value="">--</option>
                                            @foreach ($carData['models'] as $model)
                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="plate" id="plate" placeholder="Matrícula"></td>
                                    <td><input type="number" name="price" id="price" placeholder="Preço"></td>
                                    <td><button class="btn btn-success btn-submit">Guardar</button></td>
                                </form>
                            </tr>
                            @foreach ($newCars->sortByDesc('created_at') as $car)
                                <tr>
                                    @if (!$car->getFirstMediaUrl('cars', 'thumb'))
                                        <td><img src="storage/images/noPhoto.jpg" class="imgCar" /></td>
                                    @else
                                        <td><img src="{{ $car->getFirstMediaUrl('cars', 'thumb') }}"
                                                class="imgCar" /></td>
                                    @endif
                                    <td>{{ $car->model->make->name }}</td>
                                    <td>{{ $car->model->name }}</td>
                                    <td>{{ $car->plate }}</td>
                                    <td> @money($car->price)</td>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-submit").click(function(e) {
            e.preventDefault();

            var plate = $("#plate").val();
            var price = $("#price").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('newCarsPost') }}",
                data: {
                    plate: plate,
                    price: price,
                },
                success: function(data) {
                    alert(data.success);
                }
            });

        });
    </script>
@endpush
