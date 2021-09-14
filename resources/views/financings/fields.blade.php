<!-- Name Field -->
<div class="form-group col-sm-6">
    <label>{{__('Name')}}</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    <label>{{__('Description')}}</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Field -->
<div class="form-group col-sm-6">
    <label>{{__('Contract')}}</label>
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('document', ['class' => 'custom-file-input']) !!}
            {!! Form::label('document', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
