<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $financingProposal->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $financingProposal->description }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $financingProposal->value }}</p>
</div>

<!-- Document Field -->
<div class="col-sm-12">
    {!! Form::label('document', 'Document:') !!}
    <p>{{ $financingProposal->document }}</p>
</div>

<!-- Financing Id Field -->
<div class="col-sm-12">
    {!! Form::label('financing_id', 'Financing Id:') !!}
    <p>{{ $financingProposal->financing_id }}</p>
</div>

<!-- Proposal Id Field -->
<div class="col-sm-12">
    {!! Form::label('proposal_id', 'Proposal Id:') !!}
    <p>{{ $financingProposal->proposal_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $financingProposal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $financingProposal->updated_at }}</p>
</div>

