<div class="table-responsive">
    <table class="table" id="campaignsProposals-table">
        <thead>
            <tr>
                <th>Campaign Id</th>
        <th>Proposal Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($campaignsProposals as $campaignsProposals)
            <tr>
                <td>{{ $campaignsProposals->campaign_id }}</td>
            <td>{{ $campaignsProposals->proposal_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['campaignsProposals.destroy', $campaignsProposals->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('campaignsProposals.show', [$campaignsProposals->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('campaignsProposals.edit', [$campaignsProposals->id]) }}" class='btn btn-default btn-xs'>
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
