<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', isset($campaign->name) ? $campaign->name : '', ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Document Field -->
<div class="col-sm-6">
    {!! Form::label('document', 'Contrato') !!}
    <div class="form-control disabledColor">
        @foreach ($campaign->getMedia('campaigns') as $media)
            <p>{{ $media->name }}</p>
        @endforeach
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Descrição') !!}
    {!! Form::textarea('description', isset($campaign->description) ? $campaign->description : '', ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Make Id Field
<div class="col-sm-12">
    {!! Form::label('make_id', 'Make Id:') !!}
    <p>{{ $campaign->make_id }}</p>
</div> -->

<!-- Model Id Field
<div class="col-sm-12">
    {!! Form::label('model_id', 'Model Id:') !!}
    <p>{{ $campaign->model_id }}</p>
</div> -->

<!-- Type Field
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $campaign->type }}</p>
</div> -->

<!-- Amount Field
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $campaign->amount }}</p>
</div> -->

<!-- Beginning Field
<div class="col-sm-12">
    {!! Form::label('beginning', 'Beginning:') !!}
    <p>{{ $campaign->beginning }}</p>
</div> -->

<!-- End Field
<div class="col-sm-12">
    {!! Form::label('end', 'End:') !!}
    <p>{{ $campaign->end }}</p>
</div> -->

<!-- Created At Field
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $campaign->created_at }}</p>
</div> -->

<!-- Updated At Field
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $campaign->updated_at }}</p>
</div> -->

