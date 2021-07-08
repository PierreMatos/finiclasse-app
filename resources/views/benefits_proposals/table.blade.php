<div class="table-responsive">
    <table class="table" id="benefitsProposals-table">
        <thead>
            <tr>
                <th>Benefit Id</th>
        <th>Proposal Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($benefitsProposals as $benefitsProposals)
            <tr>
                <td>{{ $benefitsProposals->benefit_id }}</td>
            <td>{{ $benefitsProposals->proposal_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['benefitsProposals.destroy', $benefitsProposals->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('benefitsProposals.show', [$benefitsProposals->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('benefitsProposals.edit', [$benefitsProposals->id]) }}" class='btn btn-default btn-xs'>
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
