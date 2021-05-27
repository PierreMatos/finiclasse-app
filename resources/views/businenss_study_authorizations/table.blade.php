<div class="table-responsive">
    <table class="table" id="businenssStudyAuthorizations-table">
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
        @foreach($businenssStudyAuthorizations as $businenssStudyAuthorization)
            <tr>
                <td>{{ $businenssStudyAuthorization->name }}</td>
            <td>{{ $businenssStudyAuthorization->min }}</td>
            <td>{{ $businenssStudyAuthorization->max }}</td>
            <td>{{ $businenssStudyAuthorization->responsible_id }}</td>
            <td>{{ $businenssStudyAuthorization->color }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['businenssStudyAuthorizations.destroy', $businenssStudyAuthorization->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('businenssStudyAuthorizations.show', [$businenssStudyAuthorization->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('businenssStudyAuthorizations.edit', [$businenssStudyAuthorization->id]) }}" class='btn btn-default btn-xs'>
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
