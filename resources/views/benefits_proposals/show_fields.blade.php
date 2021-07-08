<!-- Benefit Id Field -->
<div class="col-sm-12">
    {!! Form::label('benefit_id', 'Benefit Id:') !!}
    <p>{{ $benefitsProposals->benefit_id }}</p>
</div>

<!-- Proposal Id Field -->
<div class="col-sm-12">
    {!! Form::label('proposal_id', 'Proposal Id:') !!}
    <p>{{ $benefitsProposals->proposal_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $benefitsProposals->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $benefitsProposals->updated_at }}</p>
</div>

