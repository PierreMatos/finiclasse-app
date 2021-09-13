<div class="table-responsive">
    <table class="table" id="financingProposals-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Value</th>
                <th>Document</th>
                <th>Financing Id</th>
                <th>Proposal Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($financingProposals as $financingProposal)
                <tr>
                    <td>{{ $financingProposal->name }}</td>
                    <td>{{ $financingProposal->description }}</td>
                    <td>{{ $financingProposal->value }}</td>
                    <td>{{ $financingProposal->document }}</td>
                    <td>{{ $financingProposal->financing_id }}</td>
                    <td>{{ $financingProposal->proposal_id }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['financingProposals.destroy', $financingProposal->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('financingProposals.show', [$financingProposal->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('financingProposals.edit', [$financingProposal->id]) }}"
                                class='btn btn-default btn-xs'>
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
