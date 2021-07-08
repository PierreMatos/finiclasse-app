<!-- Campaign Id Field -->
<div class="col-sm-12">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    <p>{{ $campaignsProposals->campaign_id }}</p>
</div>

<!-- Proposal Id Field -->
<div class="col-sm-12">
    {!! Form::label('proposal_id', 'Proposal Id:') !!}
    <p>{{ $campaignsProposals->proposal_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $campaignsProposals->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $campaignsProposals->updated_at }}</p>
</div>

