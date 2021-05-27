<div class="table-responsive">
    <table class="table" id="proposalStates-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Order</th>
        <th>Color</th>
        <th>Visible</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proposalStates as $proposalState)
            <tr>
                <td>{{ $proposalState->name }}</td>
            <td>{{ $proposalState->order }}</td>
            <td>{{ $proposalState->color }}</td>
            <td>{{ $proposalState->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['proposalStates.destroy', $proposalState->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proposalStates.show', [$proposalState->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('proposalStates.edit', [$proposalState->id]) }}" class='btn btn-default btn-xs'>
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
