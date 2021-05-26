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
        @foreach($proposalStates as $proposalStates)
            <tr>
                <td>{{ $proposalStates->name }}</td>
            <td>{{ $proposalStates->order }}</td>
            <td>{{ $proposalStates->color }}</td>
            <td>{{ $proposalStates->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['proposalStates.destroy', $proposalStates->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proposalStates.show', [$proposalStates->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('proposalStates.edit', [$proposalStates->id]) }}" class='btn btn-default btn-xs'>
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
