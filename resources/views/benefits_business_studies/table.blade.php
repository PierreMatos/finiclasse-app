<div class="table-responsive">
    <table class="table" id="benefitsBusinessStudies-table">
        <thead>
            <tr>
                <th>Benefits Id</th>
        <th>Business Study Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($benefitsBusinessStudies as $benefitsBusinessStudy)
            <tr>
                <td>{{ $benefitsBusinessStudy->benefits_id }}</td>
            <td>{{ $benefitsBusinessStudy->business_study_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['benefitsBusinessStudies.destroy', $benefitsBusinessStudy->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('benefitsBusinessStudies.show', [$benefitsBusinessStudy->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('benefitsBusinessStudies.edit', [$benefitsBusinessStudy->id]) }}" class='btn btn-default btn-xs'>
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
