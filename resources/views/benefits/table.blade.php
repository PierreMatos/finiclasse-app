<div class="table-responsive">
    <table class="table" id="benefits-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Type</th>
        <th>Amount</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($benefits as $benefit)
            <tr>
                <td>{{ $benefit->name }}</td>
            <td>{{ $benefit->type }}</td>
            <td>{{ $benefit->amount }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['benefits.destroy', $benefit->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('benefits.show', [$benefit->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('benefits.edit', [$benefit->id]) }}" class='btn btn-default btn-xs'>
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
