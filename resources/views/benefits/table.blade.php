<div class="table-responsive">
    <table class="table" id="benefits-table2">
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

<div>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
</div>