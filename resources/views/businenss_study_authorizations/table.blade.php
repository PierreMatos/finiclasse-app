<div class="table-responsive">
    <table class="table" id="BusinessStudyAuthorizations-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Min</th>
        <th>Max</th>
        <th>Responsible Id</th>
        <th>Color</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($BusinessStudyAuthorizations as $BusinessStudyAuthorization)
            <tr>
                <td>{{ $BusinessStudyAuthorization->name }}</td>
            <td>{{ $BusinessStudyAuthorization->min }}</td>
            <td>{{ $BusinessStudyAuthorization->max }}</td>
            <td>{{ $BusinessStudyAuthorization->responsible_id }}</td>
            <td>{{ $BusinessStudyAuthorization->color }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['BusinessStudyAuthorizations.destroy', $BusinessStudyAuthorization->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('BusinessStudyAuthorizations.show', [$BusinessStudyAuthorization->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('BusinessStudyAuthorizations.edit', [$BusinessStudyAuthorization->id]) }}" class='btn btn-default btn-xs'>
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
