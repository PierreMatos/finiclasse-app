<div class="table-responsive">
    <table class="table" id="stands-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Localization</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Order</th>
        <th>Color</th>
        <th>Visible</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stands as $stand)
            <tr>
                <td>{{ $stand->name }}</td>
            <td>{{ $stand->localization }}</td>
            <td>{{ $stand->phone }}</td>
            <td>{{ $stand->email }}</td>
            <td>{{ $stand->order }}</td>
            <td>{{ $stand->color }}</td>
            <td>{{ $stand->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['stands.destroy', $stand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stands.show', [$stand->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('stands.edit', [$stand->id]) }}" class='btn btn-default btn-xs'>
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
