<!-- Name Field -->
<div class="form-group col-sm-6">
    <label>{{ __('Name') }}</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Field -->
<div class="form-group col-sm-6">
    <label>{{ __('Contract') }}</label>
    @if (Route::is('financings.edit'))
        @foreach ($financing->getMedia('financing') as $media)
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

<!-- Description Field -->
<div class="form-group col-sm-12">
    <label>{{ __('Description') }}</label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
