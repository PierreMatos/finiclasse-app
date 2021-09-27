<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', isset($benefit->name) ? $benefit->name : '', ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Document Field -->
<div class="col-sm-6">
    {!! Form::label('document', 'Documento') !!}
    <div class="form-control disabledColor">
        @foreach ($benefit->getMedia('benefits') as $media)
            <p>{{ $media->name }}</p>
        @endforeach
    </div>
</div>

<!-- Type Field
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', isset($benefit->type) ? $benefit->type : '', ['class' => 'form-control', 'disabled']) !!}
</div> -->

<!-- Amount Field
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', isset($benefit->amount) ? $benefit->amount : '', ['class' => 'form-control', 'disabled']) !!}
</div> -->

<!-- Created At Field
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $benefit->created_at }}</p>
</div> -->

<!-- Updated At Field
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $benefit->updated_at }}</p>
</div> -->

<!-- Deleted At Field
<div class="col-sm-12">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $benefit->deleted_at }}</p>
</div> -->

