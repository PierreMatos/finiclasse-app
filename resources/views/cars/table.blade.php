<ul class="nav nav-tabs bg-nav">
    <li class="nav-item">
        <a class="nav-link active tab_button" id="Todos" data-toggle="tab" href="#home">Todos</a>
    </li>

    @foreach ($carConditions as $carCondition)

        <li class="nav-item">
            <a class="nav-link tab_button" id="{{ $carCondition->name }}" data-toggle="tab"
                href="#menu1">{{ $carCondition->name }}</a>
        </li>

    @endforeach

</ul>

<!-- TABLE FOR PAGE INITIALIZATION WITH ALL CARS -->
<div class="table-responsive container" id="Todos-table-div">
    <table class="table" id="Todos-table">
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
            @foreach ($cars->sortByDesc('created_at') as $car)
                <tr>
                    @if (!$car->getFirstMediaUrl('cars', 'thumb'))
                        <td><img src="storage/images/noPhoto.jpg" class="imgCar" /></td>
                    @else
                        <td><img src="{{ $car->getFirstMediaUrl('cars', 'thumb') }}" class="imgCar" /></td>
                    @endif
                    <td>{{ isset($car->model->make->name) ? $car->model->make->name : '' }}</td>
                    <td>{{ isset($car->model->name) ? $car->model->name : '' }}</td>
                    <td>{{ isset($car->plate) ? $car->plate : '' }}</td>
                    <td>{{ isset($car->price) ? @money($car->price) : '' }} </td>
                    <td width="120">
                        {!! Form::open(['route' => ['cars.destroy', $car->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('cars.show', [$car->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('cars.edit', [$car->id]) }}" class='btn btn-default btn-xs'>
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

@foreach ($carConditions as $carCondition)

    <!-- FILTRED TABLES TO TOGGLE -->

    <div class="table-responsive container" id="{{ $carCondition->name }}-table-div">
        <table class="table" id="{{ $carCondition->name }}-table">
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
                @foreach ($cars->sortByDesc('created_at') as $car)

                    @if ($car->condition->name == $carCondition->name)
                        <tr style="background-color:{{ isset($car->state->color) ? $car->state->color : '' }}">
                            @if (!$car->getFirstMediaUrl('cars', 'thumb'))
                                <td><img src="storage/images/noPhoto.jpg" style="max-width: 100px;" /></td>
                            @else
                                <td><img src="{{ $car->getFirstMediaUrl('cars', 'thumb') }}"
                                        style="max-width: 100px;" /></td>
                            @endif
                            <td>{{ $car->model->make->name }}</td>
                            <td>{{ $car->model->name }}</td>
                            <td>{{ $car->plate }}</td>
                            <td>{{ $car->price . ' €' }}</td>
                            <td width="120">
                                {!! Form::open(['route' => ['cars.destroy', $car->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('cars.show', [$car->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('cars.edit', [$car->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
