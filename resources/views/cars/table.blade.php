<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active tab_button" id="Todos" data-toggle="tab" href="#home">Todos</a>
      </li>
      
  @foreach ($carConditions as $carCondition )

    <li class="nav-item">
      <a class="nav-link tab_button" id="{{$carCondition->name}}" data-toggle="tab" href="#menu1">{{$carCondition->name}}</a>
    </li>

  @endforeach

  </ul>

<!-- TABLE FOR PAGE INITIALIZATION WITH ALL CARS -->
  <div class="table-responsive" id="Todos-table-div">
    <table class="table"  id="Todos-table" >
        <thead>
            <tr>
        <!-- <th>Avatar</th> -->
        <th>Make</th>
        <th>Model</th>
        <th>Variant</th>
        <th>Plate</th>
        <th>Stand</th>
        <th>Price</th>
        <!-- <th >Action</th>    -->
            </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)

            <tr>
            <td><img src="{{ $car->getFirstMediaUrl()}}" style="max-width: 100px;"/></td>
            <td>{{$car->model->make->name}}</td>
            <td>{{ $car->model->name }}</td>
            <td>{{ $car->variant }}</td>
            <td>{{ $car->plate }}</td>
            <td>{{ $car->price }}</td>  
            <!-- <td>{{ $car->price }}</td> -->
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
  @foreach ($carConditions as $carCondition )

<!-- FILTRED TABLES TO TOGGLE -->
  
  <div class="table-responsive" id="{{$carCondition->name}}-table-div">
    <table class="table"  id="{{$carCondition->name}}-table" >
        <thead>
            <tr>
        <!-- <th>Avatar</th> -->
        <th>Make</th>
        <th>Model</th>
        <th>Variant</th>
        <th>Condition</th>
        <th>State</th>
        <th>Komm</th>
        <th>Plate</th>
        <th>Stand</th>
        <th>Price</th>
        <th>Action</th>
        <!-- <th >Action</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)

          @if  ($car->condition->name == $carCondition->name)
            <tr>
            <td><img src="{{ $car->getFirstMediaUrl()}}" style="max-width: 100px;"/></td>
            <td>{{$car->model->make->name}}</td>
            <td>{{ $car->model->name }}</td>
            <td>{{ $car->variant }}</td>
            <td>{{ $car->condition->name }}</td>
            <td>{{ $car->state->name }}</td>
            <td>{{ $car->komm }}</td>
            <td>{{ $car->plate }}</td>
            <!-- <td>{{ $car->price }}</td> -->
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
