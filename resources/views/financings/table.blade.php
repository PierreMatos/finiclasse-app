<div class="table-responsive">
    <table class="table" id="financings-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Document</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($financings as $financing)
            <tr>
                <td>{{ $financing->name }}</td>
            <td>{{ $financing->description }}</td>
            <td>{{ $financing->document }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['financings.destroy', $financing->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('financings.show', [$financing->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('financings.edit', [$financing->id]) }}" class='btn btn-default btn-xs'>
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
