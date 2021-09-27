<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Field -->
<div class="form-group col-sm-6">
    <label>{{ __('Document') }}</label>
    @if (Route::is('benefits.edit'))
        @foreach ($benefit->getMedia('benefits') as $media)
            <span>({{ $media->name }})</span>
        @endforeach
    @endif
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('document', ['class' => 'custom-file-input']) !!}
            {!! Form::label('document', 'Escolher documento', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Type Field
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Amount Field
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div> -->