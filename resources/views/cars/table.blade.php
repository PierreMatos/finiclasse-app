<div class="table-responsive">
    <table class="table" id="cars-table">
        <thead>
            <tr>
                <th>Make Id</th>
        <th>Model Id</th>
        <th>Variant</th>
        <th>Motorization</th>
        <th>Category Id</th>
        <th>Registration</th>
        <th>Condition Id</th>
        <th>State Id</th>
        <th>Komm</th>
        <th>Warranty Stand</th>
        <th>Warranty Make</th>
        <th>Plate</th>
        <th>Stand Id</th>
        <th>Price</th>
        <th>Price Base</th>
        <th>Price New</th>
        <th>Price Campaign</th>
        <th>Tradein</th>
        <th>Tradein Purchase</th>
        <th>Tradein Sale</th>
        <th>Felxible</th>
        <th>Deductible</th>
        <th>Power</th>
        <th>Km</th>
        <th>Transmission Id</th>
        <th>Color Interior</th>
        <th>Color Exterior</th>
        <th>Metallic Color</th>
        <th>Drive Id</th>
        <th>Door</th>
        <th>Seats</th>
        <th>Class Id</th>
        <th>Autonomy</th>
        <th>Emissions</th>
        <th>Iuc</th>
        <th>Registration Count</th>
        <th>Order Date</th>
        <th>Arrival Date</th>
        <th>Delivery Date</th>
        <th>Chassi Number</th>
        <th>Iuc Expiration Date</th>
        <th>Inspection Expiration Date</th>
        <th>Tradein Observations</th>
        <th>Consumption</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->make_id }}</td>
            <td>{{ $car->model_id }}</td>
            <td>{{ $car->variant }}</td>
            <td>{{ $car->motorization }}</td>
            <td>{{ $car->category_id }}</td>
            <td>{{ $car->registration }}</td>
            <td>{{ $car->condition_id }}</td>
            <td>{{ $car->state_id }}</td>
            <td>{{ $car->komm }}</td>
            <td>{{ $car->warranty_stand }}</td>
            <td>{{ $car->warranty_make }}</td>
            <td>{{ $car->plate }}</td>
            <td>{{ $car->stand_id }}</td>
            <td>{{ $car->price }}</td>
            <td>{{ $car->price_base }}</td>
            <td>{{ $car->price_new }}</td>
            <td>{{ $car->price_campaign }}</td>
            <td>{{ $car->tradein }}</td>
            <td>{{ $car->tradein_purchase }}</td>
            <td>{{ $car->tradein_sale }}</td>
            <td>{{ $car->felxible }}</td>
            <td>{{ $car->deductible }}</td>
            <td>{{ $car->power }}</td>
            <td>{{ $car->km }}</td>
            <td>{{ $car->transmission_id }}</td>
            <td>{{ $car->color_interior }}</td>
            <td>{{ $car->color_exterior }}</td>
            <td>{{ $car->metallic_color }}</td>
            <td>{{ $car->drive_id }}</td>
            <td>{{ $car->door }}</td>
            <td>{{ $car->seats }}</td>
            <td>{{ $car->class_id }}</td>
            <td>{{ $car->autonomy }}</td>
            <td>{{ $car->emissions }}</td>
            <td>{{ $car->iuc }}</td>
            <td>{{ $car->registration_count }}</td>
            <td>{{ $car->order_date }}</td>
            <td>{{ $car->arrival_date }}</td>
            <td>{{ $car->delivery_date }}</td>
            <td>{{ $car->chassi_number }}</td>
            <td>{{ $car->iuc_expiration_date }}</td>
            <td>{{ $car->inspection_expiration_date }}</td>
            <td>{{ $car->tradein_observations }}</td>
            <td>{{ $car->consumption }}</td>
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
        @endforeach
        </tbody>
    </table>
</div>
