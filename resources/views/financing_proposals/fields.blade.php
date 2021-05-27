<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document', 'Document:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('document', ['class' => 'custom-file-input']) !!}
            {!! Form::label('document', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Financing Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('financing_id', 'Financing Id:') !!}
    {!! Form::text('financing_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Proposal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proposal_id', 'Proposal Id:') !!}
    {!! Form::text('proposal_id', null, ['class' => 'form-control']) !!}
</div>